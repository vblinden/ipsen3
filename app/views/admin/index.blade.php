@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<h1>
			Administrator 
			<button class="btn btn-primary pull-right" style="margin-right: 5px;">Voertuigen</button> 
			<button class="btn btn-primary pull-right" style="margin-right: 5px;">Reserveringen</button> 
			<button class="btn btn-primary pull-right" style="margin-right: 5px;">Facturen</button> 
			<button class="btn btn-primary pull-right" style="margin-right: 5px;">Klanten</button>
		</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<div class="panel panel-default">
			<div class="panel-heading">Voertuigen <a href="/vehicle/add" class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></a> <button class="btn btn-success btn-sm pull-right btn-right" style="margin-right: 5px;">Alle voertuigen</button> </div>
			<div class="panel-body">
				<p>Hieronder vind u een overzicht de laatste vijf toegevoegde voertuigen.</p>
			</div>

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

		<div class="panel panel-default">
			<div class="panel-heading">Reserveringen <button class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></button> <button class="btn btn-success btn-sm pull-right btn-right" style="margin-right: 5px;">Alle reserveringen</button> </div>
			<div class="panel-body">
				<p>Hieronder vind u een overzicht de laatste vijf toegevoegde reserveringen.</p>
			</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Voornaam</th>
						<th>Achternaam</th>
						<th>Voertuig</th>
						<th>Kenteken</th>
						<th>Uitgifte datum</th>
						<th>Retour datum</th>
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 5; $i++)
					<tr>
						<td>{{ $i + 1 }}</td>
						<td>Vincent</td>
						<td>van der Linden</td>
						<td>Audi A6</td>
						<td>12-2A-NC</td>
						<td>26-02-1991</td>
						<td>26-02-1992</td>
						<td><button class="btn btn-primary btn-sm">Bewerken</button> <button class="btn btn-danger btn-sm">Verwijderen</button></td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Facturen <button class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></button> <button class="btn btn-success btn-sm pull-right btn-right" style="margin-right: 5px;">Alle facturen</button> </div>
			<div class="panel-body">
				<p>Hieronder vind u een overzicht de laatste vijf toegevoegde facturen.</p>
			</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Voertuig</th>
						<th>Kenteken</th>
						<th>Openstaand</th>
						<th>Bedrag</th>
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 5; $i++)
					<tr>
						<td>{{ $i + 1 }}</td>
						<td>Vincent van der Linden</td>
						<td>Audi A6</td>
						<td>12-2A-NC</td>
						<td>Nee</td>
						<td>€ 469,12</td>
						<td><button class="btn btn-primary btn-sm">Bewerken</button> <button class="btn btn-danger btn-sm">Verwijderen</button></td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Klanten <button class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></button> <button class="btn btn-success btn-sm pull-right btn-right" style="margin-right: 5px;">Alle klanten</button> </div>
			<div class="panel-body">
				<p>Hieronder vind u een overzicht de laatste vijf geregistreerde klanten.</p>
			</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Voornaam</th>
						<th>Achternaam</th>
						<th>E-mail</th>
						<th>Zakelijk</th>
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 5; $i++)
					<tr>
						<td>{{ $i + 1 }}</td>
						<td>Vincent</td>
						<td>van der Linden</td>
						<td>vbvanderlinden@gmail.com</td>
						<td>Nee</td>
						<td><button class="btn btn-primary btn-sm">Bewerken</button> <button class="btn btn-danger btn-sm">Verwijderen</button></td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop