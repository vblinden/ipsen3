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
						<td>{{ Carbon::parse($reservation->startdate)->diffInDays(Carbon::parse($reservation->enddate)); }} dagen</td>
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
<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<h1>Betaling<small> kies hieronder uw betalingsmethode</small></h1>
		</div>
	</div>
</div>

@stop