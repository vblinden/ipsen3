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
					<a href='/reservation/make/{{ $vehicle->id }}' class='btn btn-success'>Reserveren</a>
					@if(Auth::check()) 
					@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary'>Bewerken</a>
					<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a>
					@endif
					@endif
				</small>
			</h1>
		</div>
		<div class='col-lg-6'>
			<a class="thumbnail">
				<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			</a>
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

@stop