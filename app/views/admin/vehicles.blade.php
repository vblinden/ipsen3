@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht voertuigen <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle voertuigen in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Voertuigen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Merk</th>
						<th>Model</th>
						<th>Kenteken</th>
						<th>Categorie</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vehicles as $vehicle)
					    <tr>
						<td>{{ $vehicle->id }}</td>
						<td>{{ $vehicle->brand }}</td>
						<td>{{ $vehicle->model }}</td>
						<td>{{ $vehicle->licenseplate }}</td>
						<td>{{ $vehicle->category['name'] }}</td>
						<td><a href='/vehicle/edit/{{ $vehicle->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
						<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop