@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
		@if (Request::is('vehicle/person'))
			<h1>{{ Lang::get('passengervehicles.passengerVehiclesTitle') }} <small>{{ Lang::get('passengervehicles.passengerVehiclesSubtitle') }}</small></h1>
		@elseif (Request::is('vehicle/company'))
			<h1>{{ Lang::get('commercialvehicles.commercialVehiclesTitle') }} <small>{{ Lang::get('commercialvehicles.commercialVehiclesSubtitle') }}</small></h1>
		@elseif (Request::is('vehicle/motor'))
			<h1>{{ Lang::get('motorcycles.motorcyclesTitle') }} <small>{{ Lang::get('motorcycles.motorcyclesSubtitle') }}</small></h1>
		@elseif (Request::is('vehicle/scooter'))
			<h1>{{ Lang::get('scooters.scootersTitle') }} <small>{{ Lang::get('scooters.scootersSubtitle') }}</small></h1>
		@endif
		</div>
	</div>
</div>
<div class="row">
@foreach ($vehicles as $vehicle)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			<div class="caption">
				<h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
				<p>{{ $vehicle->comment }}</p>
				<p>
					<a href="/vehicle/detail/{{$vehicle->id}}" class="btn btn-success" role="button">{{ Lang::get('passengervehicles.btnShow') }}</a> 
					@if(Auth::check()) 
					@if (Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary pull-right' style='margin-left: 5px'>Bewerken</a>
					<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger pull-right" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a>
					@endif
					@endif
				</p>
			</div>
		</div>
	</div>
	@endforeach
</div>


		{{ $vehicles->links() }}
@stop