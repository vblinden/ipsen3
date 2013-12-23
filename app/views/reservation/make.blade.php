@extends('layout')

@section('content')
<link href="/css/datepicker.css" rel="stylesheet">
<div class='row'>
	<div class='col-lg-12'>
		@if(Session::has('success'))
		<div class="alert alert-success">
			<p><strong>Succes!</strong> {{ Session::get('success') }}</p>
		</div>
		@endif
		@if(Session::has('failed'))
		<div class="alert alert-danger">
			<p><strong>Fout!</strong> {{ Session::get('failed') }}</p>
		</div>
		@endif
		<div class="page-header">
			<h1>Reserveren <small></small></h1>
		</div>
	</div>
</div>
<div class='row'>
	{{ Form::open(array('action' => 'ReservationController@postMake')) }}
	<div class='col-lg-12'>
		<div id="rootwizard">
			<div class="navbar navbar-default" role="navigation" style='margin-bottom: 0px;'>
				<div class="navbar-header">
					<div class="container">
						<ul class="nav navbar-nav">
							<li><a href="#tab1" data-toggle="tab">Persoonsgegevens</a></li>
							<li><a href="#tab2" data-toggle="tab">Voertuiggegevens</a></li>
							<li><a href="#tab3" data-toggle="tab">Voertuigopties</a></li>
							<li><a href="#tab4" data-toggle="tab">Verhuur periode</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="progress" style="height: 3px">
				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
					<span class="sr-only"></span>
				</div>
			</div>
					<ul class="pager wizard">
					<li class="previous"><a href="#">Vorige</a></li>
					<li class="next"><a href="#">Volgende</a></li>
					<li class="next finish" style="display:none;" onclick="return confirm('Weet u zeker dat alle gegevens correct zijn? U kunt uw reservering na deze stap niet meer aanpassen!')">{{ Form::submit('Afronden', array('class' => 'btn btn-success pull-right')); }}</li>
				</ul>
			<div class="tab-content">
				<div class="tab-pane" id="tab1">
					<div class="panel panel-default">
						<div class="panel-heading">Uw gegevens</div>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td><strong>Naam</strong></td>
									<td>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</td>
								</tr>
								<tr>
									<td><strong>Adres</strong></td>
									<td>{{ Auth::user()->addresslineone }} {{ Auth::user()->addresslinetwo }}</td>
								</tr>
								<tr>
									<td><strong>Postcode</strong></td>
									<td>{{ Auth::user()->zipcode }}</td>
								</tr>
								<tr>
									<td><strong>Stad</strong></td>
									<td>{{ Auth::user()->city }}</td>
								</tr>
								<tr>
									<td><strong>Land</strong></td>
									<td>{{ Auth::user()->country }} </td>
								</tr>
								<tr>
									<td><strong>Telefoonnummer</strong></td>
									<td>{{ Auth::user()->phonenumber }}</td>
								</tr>
								<tr>
									<td><strong>Rijbewijsnummer</strong></td>
									<td>{{ Auth::user()->licensenumber }}</td>
								</tr>
								<tr>
									<td><strong>Passpoortnummer</strong></td>
									<td>{{ Auth::user()->passportnumber }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane" id="tab2">
					<div class='row'>
						<div class='col-lg-6'>
							<div class="panel panel-default">
								<div class="panel-heading">Afbeelding van {{ $vehicle->brand }} {{ $vehicle->model }} </div>
								<div class='panel-body'>
									<a class="thumbnail">
										<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
									</a>
								</div>
							</div>
						</div>

						<div class='col-lg-6'>
							<div class="panel panel-default">
								<div class="panel-heading">
									Voertuig gegevens
								</div>
								<div class='panel-body'>
									<div class="col-lg-5">
										<p><strong>Merk</strong> </p>
										<p><strong>Model </strong></p>
										<p><strong>Kilometerstand</strong> </p>
										<p><strong>Kenteken </strong></p>
										<p><strong>Voertuigkleur </strong></p>
										<p><strong>Verbruik per kilometer </strong></p>
										<p><strong>Prijs per uur </strong></p>
										<p><strong>Prijs per dag </strong></p>
										<p><strong>Opmerkingen </strong></p>
									</div>
									<div class="col-lg-7">
										{{ Form::hidden('vehicleid', $vehicle->id); }}
										<p> {{ $vehicle->brand }} </p>
										<p> {{ $vehicle->model }} </p>
										<p> {{ $vehicle->milage }} kilometer</p>
										<p> {{ $vehicle->licenseplate }} </p>
										<p> {{ $vehicle->color }} </p>
										<p> {{ $vehicle->usage }} </p>
										<p> € {{ $vehicle->hourlyrate }}</p>
										<p> € {{ $vehicle->hourlyrate * 24 }}</p>
										<p> {{ $vehicle->comment }} </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab3">
					<div class="panel panel-default">
						<div class="panel-heading">Voertuig opties </div>
							<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Naam</th>
								<th>Prijs per dag</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($vehicleoptions as $vehicleoption)
							<tr>
								<td><input tabindex="1" type="checkbox" name="vehicleoption[]" id="{{$vehicleoption->name}}" value="{{$vehicleoption->id}}"></td>
								<td>{{ $vehicleoption->name }}</td>
								<td>€ {{ $vehicleoption->price * 24 }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					
						</div>
				</div>
				<div class="tab-pane" id="tab4">
					<div class="panel panel-default">
						<div class="panel-heading">Datums </div>
						<div class='panel-body'>
							<div class='row'>
								<div class='col-lg-6'>
									{{ Form::label('startdate', 'Begin datum'); }}
									{{ Form::text('startdate1', Cookie::get('dates')['startdate'], array('class' => 'form-control', 'id' => 'dpd1', 'disabled')); }}
								</div>
								<div class='col-lg-6'>
									{{ Form::label('enddate', 'Eind datum'); }}
									{{ Form::text('enddate1', Cookie::get('dates')['enddate'], array('class' => 'form-control', 'id' => 'dpd2', 'disabled')); }}
									{{ Form::hidden('startdate', Cookie::get('dates')['startdate']); }}
									{{ Form::hidden('enddate', Cookie::get('dates')['enddate']); }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	{{ Form::close() }}
</div>
@stop

@section('scripts')
<script type="text/javascript" src='/js/datepicker.js'></script>
<script type="text/javascript" src='/js/wizard.js'></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.progress-bar').css({width: $percent+'%'});

			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else {
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}});

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

		var checkin = $('#dpd1').datepicker({
			onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.setValue(newDate);
			}
			checkin.hide();
			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').datepicker({
			onRender: function(date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev) {
			checkout.hide();
		}).data('datepicker');
	});
</script>
@stop