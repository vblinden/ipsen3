@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht facturen <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle facturen in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Facturen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Voertuig</th>
						<th>Begin datum</th>
						<th>Eind datum</th>
						<th>Totaalbedrag</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($invoices as $invoice)
					<tr>
						<td>{{ $invoice->id }}</td>
						<td>{{ $invoice->user->firstname }} {{ $invoice->user->lastname }}</td>
						<td>{{ $invoice->vehicle->brand }} {{ $invoice->vehicle->model }}</td>
						<td>{{ $invoice->startdate }}</td>
						<td>{{ $invoice->enddate }}</td>
						<td>€ {{ $invoice->total }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop