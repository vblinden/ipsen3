@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Totaal overzicht van alle reviews <small></small></h1>
		</div>
		<p>Hieronder vind u een overzicht van alle reviews in de database.</p>

		<div class="panel panel-default">
			<div class="panel-heading">Voertuigen</div>

			<!-- Vehicle table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Voertuig</th>
						<th>Gebruiker</th>
						<th>Waardering</th>
						<th>Beschrijving</th>
						<th width="185px"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($reviews as $review)
					<tr>
						<td>{{ $review->id }}</td>
						<td>
							@if ($review->vehicle_id != 0)
								{{ $review->vehicle->brand }} {{ $review->vehicle->model }}
							@else 
								Bedrijf
							@endif
							</td>
						<td>{{ $review->user->firstname }} {{ $review->user->lastname }} </td>
						<td> 
							@for ($i=1; $i <= 5 ; $i++)
							    <span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
							@endfor
						</td>
						<td>{{ $review->comment }}</td>
						<td>
							<a href='/review/edit/{{ $review->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
							<a href='/review/delete/{{ $review->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze voertuig optie wilt verwijderen?')">Verwijderen</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop