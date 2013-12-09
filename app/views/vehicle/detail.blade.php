@extends('layout')

@section('content')
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
			<h1>{{ $vehicle->brand }} {{ $vehicle->model }}
				<small class="pull-right">
					<a href='/vehicle/detail/{{ $vehicle->id }}' class='btn btn-success'>Reserveren</a>
					@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary'>Bewerken</a>
					@endif
				</small>
			</h1>
		</div>
		<div class="panel-body">
			<div class='col-lg-6'>
				<a class="thumbnail">
					<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			    </a>
			</div>
			<div class="col-lg-2">
				<p>Merk: </p>
				<p>Model: </p>
				<p>Kilometerstand: </p>
				<p>Kenteken: </p>
				<p>Voertuigkleur: </p>
				<p>Verkruik per kilometer: </p>
				<p>Prijs per uur: </p>
				<p>Opmerkingen: </p>
			</div>
			<div class="col-lg-4">
				<p> {{ $vehicle->brand }} </p>
				<p> {{ $vehicle->model }} </p>
				<p> {{ $vehicle->milage }} kilometer</p>
				<p> {{ $vehicle->licenseplate }} </p>
				<p> {{ $vehicle->color }} </p>
				<p> {{ $vehicle->usage }} </p>
				<p> € {{ $vehicle->hourlyrate }} per uur</p>
				<p> {{ $vehicle->comment }} </p>
			</div>
		</div>
		
	</div>
</div>

{{ Form::close() }}

@stop

@section('scripts')

@stop