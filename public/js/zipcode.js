// Create closure to keep namespace clean and hide implementation.
(function($) {
    // Trigger on '5408xb' and on '5408 XB'
    NL_SIXPP_REGEX = /[0-9]{4,4}\s?[a-zA-Z]{2,2}/;
    NL_STREETNUMBER_REGEX = /[0-9]+/;

    $.fn.applyAutocomplete = function(options) {
        var default_args = {
            // Wait for 10 seconds before giving up on communication with
            // Pro6PP.
            'timeout' : 10000,
            // When set to 'true', the script will required a valid address
            // present in the Pro6PP database.
            // Set to 'false' to allow entering a custom address.
            'enforce_validation' : true,
            // When set to 'true', the script will never block the process in
            // case of
            // trouble communicating with Pro6PP.
            // Set to 'false' to prevent users from entering a custom address.
            'gracefully_degrade' : true,
            // Enable the use of the feedback call to improve the postcode
            // database by
            // switching this setting to true. For more information:
            // http://d-centralize.nl/pro6pp/examples/feedback
            'provide_feedback' : false
        }

        var instance = this;

        for ( var index in default_args) {
            if (typeof options === 'undefined' || typeof options[index] === "undefined") {
                instance[index] = default_args[index];
            }
        }

        function getConfig(field) {
            if (typeof options === 'undefined' || typeof options[field] === 'undefined') {
                // Use default field class name
                return instance.find('.' + field);
            } else {
                // Developer chose to specify form field manually.
                return $(options[field]);
            }
        }

        instance.postcode = getConfig('postcode');
        instance.streetnumber = getConfig('streetnumber');
        instance.street = getConfig('street');
        instance.streets = getConfig('streets');
        instance.city = getConfig('city');
        instance.municipality = getConfig('municipality');
        instance.province = getConfig('province');
        instance.lat = getConfig('lat');
        instance.lng = getConfig('lng');
        instance.areacode = getConfig('areacode');
        instance.streetnumbers = getConfig('streetnumbers');
        instance.message = getConfig('message');
        instance.spinner = getConfig('spinner');

        // Turn off browser autocompletion for the postcode field.
        // Because javascript is unable to catch an event when a user clicks a
        // previously filled-in value that the browser may suggest.
        // The autocomplete attribute became official in HTML5, but used to work
        // long before that.
        instance.postcode.attr('autocomplete', 'off');
        instance.postcode.keyup(function() {
            autocomplete(instance);
        });
        instance.streetnumber.attr('autocomplete', 'off');
        instance.streetnumber.blur(function() {
            autocomplete(instance);
        });
        // Gather new data through the feedback API call
        instance.street.blur(function() {
            feedback(instance);
        });
        // Bind event handler to street selectbox.
        if (typeof instance.streets !== 'undefined') {
            // When pressing tab, make a selection.
            instance.streets.blur(function() {
                show_street(instance);
            });
        }
    };

    var pro6pp_cache = {};
    function pro6pp_cached_get(obj, url, params, callback) {
        var key = url + $.param(params);
        if (pro6pp_cache.hasOwnProperty(key)) {
            if (typeof callback !== 'undefined') {
                callback(obj, pro6pp_cache[key]);
            }
        } else {
            obj.spinner.show();
            $.ajax({
                crossDomain : true,
                dataType : 'jsonp',
                timeout : obj.timeout,
                url : url,
                data : params,
                success : function(data, textStatus, jqXHR) {
                    pro6pp_cache[key] = data;
                    if (typeof callback !== 'undefined') {
                        callback(obj, data);
                    }
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    var message = "Unable to contact Pro6PP validation service";
                    showErrorMessage(obj, message);
                },
                complete : function(jqXHR, textStatus) {
                    obj.spinner.hide();
                }
            });
        }
    }

    function getApiBaseUrl() {
        // Use HTTPS API if website itself is also secure.
        // Otherwise, some browsers might complain about insecure content.
        if ("https:" === document.location.protocol) {
            return 'https://pro6pp.appspot.com/v1';
        } else {
            return 'http://api.pro6pp.nl/v1';
        }
    }

    // Request geo-data from nl_sixpp
    function autocomplete(obj) {
        obj.message.hide().empty();
        var postcode = obj.postcode.val();
        var streetnumber = obj.streetnumber.val();
        // Streetnumber is only required when there's an input field defined for
        // it.
        // There may be use-cases where the streetnumber is not required.
        if (NL_SIXPP_REGEX.test(postcode)
                && (typeof streetnumber === 'undefined' || NL_STREETNUMBER_REGEX.test(streetnumber))) {
            show_street(obj);
            var url = getApiBaseUrl() + "/autocomplete";
            var params = new Object();
            params.auth_key = pro6pp_auth_key;
            params.nl_sixpp = postcode;
            // Streetnumber field is not required
            if (typeof obj.streetnumber !== 'undefined') {
                params.streetnumber = obj.streetnumber.val();
            }
            pro6pp_cached_get(obj, url, params, fillin);
        } else {
            obj.street.empty();
            obj.street.empty();
        }
    }

    function show_street(obj) {
        obj.street.show();
        obj.streets.hide();
        // Copy over the selected value (if any) and remember the choice of
        // streets.
        var streetname = obj.streets.val();
        if (typeof streetname !== "undefined" && streetname !== "") {
            obj.street.val(streetname);
            obj.street.data('old_streetname', streetname);
        }
    }
    function show_streets(obj) {
        obj.street.hide();
        obj.streets.show();
    }

    function escapeHtml(unsafe) {
        // Some characters that are received from the webservice should be
        // escaped when used in HTML
        return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
    }

    function fillin(obj, json) {
        if (json.status === 'ok') {
            if (json.results.length === 1) {
                obj.street.val(json.results[0].street);
            } else {
                var streets = obj.streets;
                streets.empty();
                $.each(json.results, function(i, street) {
                    // Some characters like the quote in "'s-Gravenweg" need to
                    // be escaped before it can be
                    // put in the value field.
                    var escapedStreet = escapeHtml(street.street);

                    // If a street was selected, a new streetnumber was filled
                    // in, the street selector will be filled again,
                    // therefore the old street selection has been remembered
                    // and set a preferred street here.
                    var selected = "";
                    if (obj.street.data('old_streetname') === escapedStreet) {
                        selected = " selected='selected'";
                    }

                    var newOption = $("<option value='" + escapedStreet + "'" + selected + ">" + street.street
                            + "</option>");
                    streets.append(newOption);
                    // IE doesn't react well on having the click handler
                    // attached to the
                    // selectbox itself. It needs to be attached to the
                    // individual options.
                    newOption.click(function() {
                        show_street(obj);
                    });
                });
                show_streets(obj);
            }
            obj.city.val(json.results[0].city);
            // You might also want to add these extra fields
            obj.municipality.val(json.results[0].municipality);
            obj.province.val(json.results[0].province);
            obj.lat.val(json.results[0].lat);
            obj.lng.val(json.results[0].lng);
            obj.areacode.val(json.results[0].areacode);
            obj.streetnumbers.val(json.results[0].streetnumbers);
        } else {
            showErrorMessage(obj, json.error.message);
        }
    }

    function showErrorMessage(obj, message) {
        var translated_message = message;
        // See if we've got a translation available
        if (message === 'nl_sixpp not found') {
            translated_message = 'Onbekende postcode';
            releaseReadOnlyFields(obj, true, false);
        } else if (message === 'Streetnumber not found') {
            translated_message = 'Onbekend huisnummer';
            releaseReadOnlyFields(obj, true, false);
        } else if (message === 'streetnumber is missing a number') {
            translated_message = 'Vul een geldig huisnummer in';
        } else if (message === 'invalid postcode format') {
            translated_message = 'Ongeldig postcode formaat';
        } else if (message === "Unable to contact Pro6PP validation service") {
            translated_message = 'Geen verbinding met validatieserver';
            releaseReadOnlyFields(obj, false, true);
        }
        // Show message to user
        obj.message.html(translated_message).show();
    }

    function releaseReadOnlyFields(obj, not_found, comm_error) {
        if (comm_error === true && obj.gracefully_degrade === false) {
            return;
        }
        if (not_found === true && obj.enforce_validation === true) {
            return;
        }
        // Make input fields writable.
        obj.street.removeAttr('readonly');
        obj.city.removeAttr('readonly');
    }
    // Feed new data into the system.
    function feedback(obj) {
        var postcode = obj.postcode.val();
        var street = obj.street.val();
        var streetnumber = obj.streetnumber.val();

        // Only provide feedback when developer explicitly opts-in.
        if (!obj.provide_feedback) {
            return;
        }

        // Provide feedback when user enters at least a valid postcode and
        // custom street.
        if (NL_SIXPP_REGEX.test(postcode) && !obj.street.attr('readonly') && street) {
            var url = getApiBaseUrl() + "/feedback";
            var params = new Object();
            params.auth_key = pro6pp_auth_key;
            params.nl_sixpp = postcode;
            params.street = street;
            params.streetnumber = streetnumber;
            pro6pp_cached_get(obj, url, params, null);
        }
    }
    //
    // end of closure
    //
})(jQuery);
