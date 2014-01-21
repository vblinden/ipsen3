<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="LeenMeij">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/favicon.png">

	<title>LeenMeij Voertuigverhuur Bedrijf</title>

	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">

	@if (General::skin() == 'Kerst') <link href="/css/theme-christmas.css" rel="stylesheet"> @endif
	@if (General::skin() == 'Zomer') <link href="/css/theme-summer.css" rel="stylesheet"> @endif
</head>

<body>
	<div class="wrapper">
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">LeenMeij</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="/">{{ Lang::get('navbar.navHome'); }} </a></li>
						<li><a href="/reservation">{{ Lang::get('navbar.navRent'); }}</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::get('navbar.navVehicles'); }}<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/vehicle/person">{{ Lang::get('navbar.navPassengerCar'); }}</a></li>
								<li><a href="/vehicle/company">{{ Lang::get('navbar.navCommercialVehicle'); }}</a></li>
								<li><a href="/vehicle/motor">{{ Lang::get('navbar.navMotorcycle'); }}</a></li>
								<li><a href="/vehicle/scooter">{{ Lang::get('navbar.navScooter'); }}</a></li>
							</ul>
						</li>
						<li><a href="/vehicleoption">{{ Lang::get('navbar.navAccessories'); }}</a></li>
						<li><a href="/review">{{ Lang::get('navbar.navRatings'); }}</a></li>
						<li><a href="/home/faq">{{ Lang::get('navbar.navFAQ'); }}</a></li>
						<li><a href="/home/contact">{{ Lang::get('navbar.navContact'); }}</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								@if(date("H") < "12") {{ Lang::get('navbar.loggedInMorning'); }},
								@elseif(date("H") < "18") {{ Lang::get('navbar.loggedInAfternoon'); }},
								@else {{ Lang::get('navbar.loggedInEvening'); }},
								@endif
								{{ Auth::user()->firstname; }}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									@if(Auth::user()->business == 1)
										<li><a href='/company/view/{{ Auth::user()->company->id }}'>{{ Auth::user()->company->name }}</a></li>
									@endif
									<!-- <li><a href="/user/account">Mijn account</a></li> -->
									@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
									<li><a href='/admin/'>Administrator</a></li>
									<li class="divider"></li>
									@endif
									<li><a href="/user/logout">{{ Lang::get('navbar.loggedInLogOut'); }}</a></li>
								</ul>
							</li>
							@else
							<li><a href="/user/login">{{ Lang::get('navbar.navLogin'); }}</a></li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::get('navbar.navRegister'); }} <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/user/register/personal">{{ Lang::get('navbar.navPrivate'); }}</a></li>
									<li><a href="/user/register/company">{{ Lang::get('navbar.navCommercial'); }}</a></li>
								</ul>
							</li>
							@endif
							<li><a href="/lang/nl" style="padding-right: 0px;"><img src='/img/nl.jpg' /></a></li>
							<li><a href="/lang/en"><img src='/img/en.gif' /></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
				@yield('content')
			</div>
			<div class="push"></div>
		</div>

		<div id="footer" style="padding-top: 20px; margin-top: 20px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">{{ Lang::get('footer.customerRatingHeader'); }}</div>
							@foreach(Review::getHighReviews() as $review)
								@if($review->rating >= 4)
								<div class="panel-body">
									<div>
										<a href="/review"><p> {{ Str::words($review->comment, $words = 4, $end = '...')}}
										<span class="pull-right">
										    @for ($i=1; $i <= 5 ; $i++)
										      <span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
										    @endfor
										</span>
										</p></a>
										<small class="pull-right">{{ $review->timeago }}</small>
									</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">{{ Lang::get('footer.servicesHeader'); }}</div>
							<div class="panel-body">
								<ul class="bulletless">
									<li><a href="/vehicle/person">{{ Lang::get('footer.servicesPassengerCars'); }}</a></li>
									<li><a href="/vehicle/company">{{ Lang::get('footer.servicesCommercialVehicles'); }}</a></li>
									<li><a href="/vehicle/motor">{{ Lang::get('footer.servicesMotorcycles'); }}</a></li>
									<li><a href="/vehicle/scooter">{{ Lang::get('footer.servicesScooters'); }}</a></li>
									<li><a href="/vehicleoption">{{ Lang::get('footer.servicesAccessories'); }}</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">{{ Lang::get('footer.contactHeader'); }}</div>
							<div class="panel-body" style="padding: 0px;">
								<div id="footer-maps" style="height: 200px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p class='text-muted'>{{ Lang::get('footer.footer'); }}  <span class='pull-right'>KVK: 987654321</span></p>
					</div>
				</div>
			</div>
		</div>

		@if (General::skin() == 'Kerst') <script src="/js/theme-christmas.js"></script> @endif
		@if (General::skin() == 'Kerst') <script src="/js/theme-summer.js"></script> @endif
		
		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="/js/gmaps.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				var map = new GMaps({
					div: '#footer-maps',
					lat: 52.16662,
					lng: 4.47184
				});

				var mapOptions = {
					draggable: false,
					scrollwheel: false,
					panControl: false,
					zoomControl: false,
					scaleControl: false,
					mapTypeControl: false,
					streetViewControl: false,
					overviewMapControl: false
				};

				map.setOptions(mapOptions);

				map.addMarker({
					lat: 52.16662,
					lng: 4.47184,
					infoWindow: {
						content: '<p>Zijlldijk 130<br/>2352 AB Leiderdorp<br/>071-7503299<br/>info@leenmeij.com</br></p>'
					}
				});
			});
		</script>

		@yield('scripts')
	</body>
	</html>
