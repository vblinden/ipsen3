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
	{{ Form::model($input, array('action' => 'ReservationController@postIndex')) }}
	<div class='col-lg-12'>
		<div class='row'>
			<div class='col-lg-6'>
				<div class='form-group'>
				{{ Form::label('startdate', 'Begin datum'); }}
				{{ Form::text('startdate', null, array('class' => 'form-control', 'id' => 'dpd1')); }}
				</div>
			</div>
			<div class='col-lg-6'>
				<div class='form-group'>
				{{ Form::label('enddate', 'Eind datum'); }}
				{{ Form::text('enddate', null, array('class' => 'form-control', 'id' => 'dpd2')); }}
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-lg-12'>
				<div class='form-group'>
					{{ Form::label('vehiclecategoryid', 'Voertuig categorie'); }}
					{{ Form::select('vehiclecategoryid', VehicleCategory::lists('name', 'id'), null, array('class' => 'form-control')); }}
				</div>
			</div>
		</div>
	</div>
</div>

<div class='row'>
	<div class='col-lg-12'>
		<p>
			{{ Form::submit('Laat beschikbare voertuigen zien', array('class' => 'btn btn-success btn-full')); }}
		</p>
		<hr/>
	</div>
</div>

<div class='row'>
	<div class='col-lg-12'>
		@if (isset($child))
		{{ $child }}
		@endif
	</div>
</div>

{{ Form::close() }}
@stop

@section('scripts')
<script type="text/javascript" src='/js/datepicker.js'></script>
<script type="text/javascript">
	$(document).ready(function() {

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