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
			<h1>Reservering <small> bewerken voor {{ $reservation->user->firstname }} {{ $reservation->user->lastname }} </small></h1>
		</div>
		<p>Hieronder kunt u een al bestaande reservering aanpassen.</p>
	</div>
</div>
<div class="row">
	<div class='col-lg-12'>
		{{ Form::model($reservation, array('action' => 'ReservationController@postEdit')) }}
		<div class="panel panel-default">
			<div class="panel-heading">Reservering</div>
			<div class="panel-body">
				<div class='col-lg-12'>
					{{ Form::hidden('id', $reservation->id); }}

					<div class='form-group'>
						{{ Form::label('user', 'Persoon'); }}
						{{ Form::text('user', $reservation->user->firstname . ' ' . $reservation->user->lastname, array('class' => 'form-control', 'disabled')); }}
					</div>

					<div class='form-group'>
						{{ Form::label('vehicle', 'Vehicle'); }}
						{{ Form::text('vehicle', $reservation->vehicle->brand . ' ' . $reservation->vehicle->model . ' (' . $reservation->vehicle->licenseplate . ')', array('class' => 'form-control', 'disabled')); }}
					</div>

					<div class='row'>
						<div class='col-lg-6'>
							{{ Form::label('startdate', 'Begin datum'); }}
							{{ Form::text('startdate', null, array('class' => 'form-control', 'id' => 'dpd1')); }}
						</div>
						<div class='col-lg-6'>
							{{ Form::label('enddate', 'Eind datum'); }}
							{{ Form::text('enddate', null, array('class' => 'form-control', 'id' => 'dpd2')); }}
						</div>
					</div>

					<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Naam</th>
								<th>Prijs per dag</th>
							</tr>
						</thead>
						<tbody>
							@foreach (VehicleOption::all() as $vehicleoption)
							<tr>
								<td><input tabindex="1" type="checkbox" name="vehicleoption[]" id="{{$vehicleoption->name}}" value="{{$vehicleoption->id}}"
									@foreach ($reservation->vehicleoptions as $vo)
										@if ($vehicleoption->id == $vo->id)
											checked
										@endif
									@endforeach
								></td>
								<td>{{ $vehicleoption->name }}</td>
								<td>€ {{ $vehicleoption->price * 24 }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>			
			</div>
		</div>
		</div>
	</div>
</div>

<div class='row'>
	<div class='col-lg-12'>
		<p>{{ Form::submit('Bijwerken', array('class' => 'btn btn-primary btn-full')); }}</p>
	</div>
</div>

{{ Form::close() }}

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