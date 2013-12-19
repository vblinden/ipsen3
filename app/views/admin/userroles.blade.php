@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht gebruikers rollen <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle gebruikers rollen in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Gebruikers rollen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($userroles as $userrole)
					    <tr>
						<td>{{ $userrole->id }}</td>
						<td>{{ $userrole->name }}</td>
						<td><a href='/userrole/edit/{{ $userrole->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
						<a href='/userrole/delete/{{ $userrole->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze gebruikers rol wilt verwijderen?')">Verwijderen</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop