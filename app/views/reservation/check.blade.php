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
			<h1>Reservering controleren<small></small></h1>
		</div>
		<div class='col-lg-6'>
			<a class="thumbnail">
				<img src="/uploaded/vehicles/{{ $reservation->vehicle->image }}" alt="{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}">
			</a>
		</div>

		<div class="col-lg-6">
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}</td>
						<td><strong>€ {{ $reservation->vehicle->hourlyrate * 24 }}</strong></td>
					</tr>
					@foreach ($reservation->vehicleoptions as $vehicleoption)
					<tr>
						<td>{{ $vehicleoption->name }}</td>
						<td><strong>€ {{ $vehicleoption->price * 24 }}</strong></td>
					</tr>
					@endforeach
					<tr>
						<td>Aantal dagen</td>
						<td><strong>{{ Carbon::parse($reservation->startdate)->diffInDays(Carbon::parse($reservation->enddate)); }} dagen</strong></td>
					</tr>
					<!-- Intentionally left blank -->
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Totaal: </td>
						<td><strong>€ {{ $totalPrice }}</strong></td>
					</tr>
					<!-- Intentionally left blank -->
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>BTW ({{ General::find(1)->vat }}%)</td>
						<td><strong>€ {{ $vat }}</strong></td>
					</tr>
					<tr>
						<td><strong>Totaal prijs:</strong></td>
						<td><strong>€ {{ $totalPrice + $vat }}</strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

{{ Form::open(array('action' => 'ReservationController@postSucces')) }}
<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1>Betaling<small> kies hieronder uw bank</small></h1>
		</div>
		<div class="col-lg-4">
			<img src="/img/ideal.jpg" alt="iDeal logo"/>
		</div>
		<div class="col-lg-8 form-group">
			<h4>iDeal</h4>
			<p>Met iDeal kunt u gemakkelijk betalen via uw online bank omgeving. Nadat u uw bank gekozen heeft, zullen wij u doorsturen naar uw eigen bank.</p>

			{{ Form::select('bank', array('ING', 'ABN Amro', 'Vinniebankie'), null, array('class' => 'form-control', 'id' => 'bank')); }}
			<br>
			<!-- Button trigger modal -->
			<button class="btn btn-primary btn-full" data-toggle="modal" data-target="#myModal">
			  Open betalingscherm
			</button>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">iDeal betaling</h4>
			      </div>
			      <div class="modal-body">
			      	@if('selectedValue' === 'IGN')
			        	@include('reservation.partials.ing')
			        @endif
			      </div>
			      <div class="modal-footer">
			      	{{ Form::submit('Betaling voltooien', array('class' => 'btn btn-primary', 'style' => 'background-color: #f86b02')); }}
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')

<script type="text/javascript">

$(document).ready(function () {

	$('#bank').on('change', function (e) {
		var selectedValue = $("#bank").find(":selected").text();

  		console.log(selectedValue);
	});
});



</script>
@stop