@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht voertuig opties <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle voertuig opties in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Voertuigen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Prijs per dag</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vehicleoptions as $vehicleoption)
					<tr>
						<td>{{ $vehicleoption->id }}</td>
						<td>{{ $vehicleoption->name }}</td>
						<td>€ {{ $vehicleoption->price * 24}}</td>
						<td>
							<a href='/vehicleoption/edit/{{ $vehicleoption->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
							<a href='/vehicleoption/delete/{{ $vehicleoption->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze voertuig optie wilt verwijderen?')">Verwijderen</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop