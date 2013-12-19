@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht reserveringen <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle reserveringen in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Reserveringen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Voertuig</th>
						<th>Begin datum</th>
						<th>Eind datum</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($reservations as $reservation)
					<tr>
						<td>{{ $reservation->id }}</td>
						<td>{{ $reservation->user->firstname }} {{ $reservation->user->lastname }}</td>
						<td>{{ $reservation->vehicle->brand }} {{ $reservation->vehicle->model }}</td>
						<td>{{ $reservation->startdate }}</td>
						<td>{{ $reservation->enddate }}</td>
						<td>
							<a href='/reservation/edit/{{ $reservation->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
							<a href='/reservation/delete/{{ $reservation->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze reservering wilt verwijderen?')">Verwijderen</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop