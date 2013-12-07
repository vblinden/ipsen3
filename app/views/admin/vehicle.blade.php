@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-3'>
    	<div class="list-group">
			<a class='list-group-item' href="">Administrator</a>
			<a class="list-group-item active" href=""><span class="badge pull-right">{{ $vehicles->count() }}</span>Voertuigen</a>
			<a class="list-group-item" href=""><span class="badge pull-right">0</span>Reserveringen</a>
			<a class="list-group-item" href=""><span class="badge pull-right">0</span>Facturen</a>
			<a class="list-group-item" href=""><span class="badge pull-right">{{ $users->count() }}</span>Klanten</a>
		</div>
	</div>

	<div class='col-lg-9'>
		<div class="page-header">
			<h1>Administrator <small></small></h1>
		</div>
		<p>In het administrator gedeelte van de website heeft u een overzicht van meerdere gedeeltes.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Voertuigen <a href="/vehicle/add" class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></a> <button class="btn btn-success btn-sm pull-right btn-right" style="margin-right: 5px;">Alle voertuigen</button> </div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Merk</th>
						<th>Model</th>
						<th>Kenteken</th>
						<th>Categorie</th>
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vehicles as $vehicle)
					    <tr>
						<td>{{ $vehicle->id }}</td>
						<td>{{ $vehicle->brand }}</td>
						<td>{{ $vehicle->model }}</td>
						<td>{{ $vehicle->licenseplate }}</td>
						<td>{{ $vehicle->category }}</td>
						<td><a href='/vehicle/edit/{{ $vehicle->id }}' class="btn btn-primary btn-sm">Bewerken</a> <button class="btn btn-danger btn-sm">Verwijderen</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop