@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht gebruikers <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle gebruikers in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Gebruikers</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Voornaam</th>
						<th>Achternaam</th>
						<th>Adres</th>
						<th>Woonplaats</th>
						<th>E-mail</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->addresslineone }} {{ $user->addresslinetwo }}</td>
						<td>{{ $user->city }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href='/user/edit/{{ $user->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
							<a href='/user/delete/{{ $user->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')">Verwijderen</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop