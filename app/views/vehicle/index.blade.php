@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
		@if (Request::is('vehicle/person'))
			<h1>Personenauto <small>Alle beschikbare personenauto's</small></h1>
		@elseif (Request::is('vehicle/company'))
			<h1>Bedrijfswagen <small>Alle beschikbare bedrijfswagens</small></h1>
		@elseif (Request::is('vehicle/motor'))
			<h1>Motor <small>Alle beschikbare motoren</small></h1>
		@elseif (Request::is('vehicle/scooter'))
			<h1>Scooter <small>Alle beschikbare scooters</small></h1>
		@endif
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		@foreach ($vehicles as $vehicle)
		<div class="panel panel-default">
			<div class="panel-heading">{{ $vehicle->brand }} {{ $vehicle->model }} <strong class='pull-right'>€ {{ $vehicle->hourlyrate * 24 }} per dag</strong></div>
			<div class="panel-body">
				<div class='col-lg-3'>
					<a class="thumbnail">
						<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
				    </a>
				</div>
				<div class='col-lg-9'>
					<p>
						{{ $vehicle->comment }}
					</p>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Merk</th>
								<th>Model</th>
								<th>Kenteken</th>
								<th>Verbruik</th>
								<th>Kleur</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $vehicle->brand }}</td>
								<td>{{ $vehicle->model }}</td>
								<td>{{ $vehicle->licenseplate }}</td>
								<td>{{ $vehicle->milage }}</td>
								<td>{{ $vehicle->color }}</td>
							</tr>
						</tbody>
					</table>
					<a href='' class='btn btn-success'>Reserveren</a>
					@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary'>Bewerken</a>
					@endif
				</div>
			</div>
		</div>
		@endforeach

		{{ $vehicles->links() }}
	</div>
</div>
@stop