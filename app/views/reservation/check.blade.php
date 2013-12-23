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

		<p>{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }} € {{ $reservation->vehicle->hourlyrate * 24 }}</p>

		<p>
		@foreach ($reservation->vehicleoptions as $vehicleoption)
			{{ $vehicleoption->name }} € {{ $vehicleoption->price * 24 }} <br/>
		@endforeach
		</p>

		<b>Totaal: </b> € {{ $totalPrice }}<br/>
		<b>BTW ({{ General::find(1)->vat }}%) : </b> € {{ $vat }}<br/>
		<b>Totaal prijs: </b>  € {{ $totalPrice + $vat }}
	</div>
</div>

@stop