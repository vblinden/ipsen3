@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht bedrijven <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle bedrijven in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Bedrijven</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Aantal leden</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($companies as $company)
					<tr>
						<td>{{ $company->id }}</td>
						<td>{{ $company->name }} </td>
						<td>{{ $company->users()->count() }} </td>
						<td>
							<a href='/company/edit/{{ $company->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
							<a href='/company/delete/{{ $company->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u dit bedrijf wilt verwijderen?')">Verwijderen</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop