@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		@if(Session::has('success'))
		<div class="alert alert-success">
			<p><strong>Succes!</strong> {{ Session::get('success') }}</p>
		</div>
		@endif
		@if(Session::has('failed'))
		<div class="alert alert-danger">
			<p><strong>Fout!</strong> {{ Session::get('failed') }}</p>
		</div>
		@endif
		<div class="page-header">
			<h1>{{ $vehicle->brand }} {{ $vehicle->model }}
				<small class="pull-right">
					@if(Auth::check()) 
					@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary'>Bewerken</a>
					<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a>
					@endif
					@endif
				</small>
			</h1>
		</div>
		<div class='col-lg-6'>
			<a class="thumbnail">
				<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			</a>
		</div>
		<div class='col-lg-6'>
			<div class="panel panel-default">
				<div class="panel-heading">
					Voertuig gegevens
				</div>
				<table class="table table-striped">
					<tbody>
						<tr>
							<td><strong>Merk</strong></td>
							<td> {{ $vehicle->brand }} </td>
						</tr>
						<tr>
							<td><strong>Model</strong></td>
							<td> {{ $vehicle->model }} </td>
						</tr>
						<tr>
							<td><strong>Kilometerstand</strong></td>
							<td> {{ $vehicle->milage }} kilometer</td>
						</tr>
						<tr>
							<td><strong>Kenteken</strong></td>
							<td> {{ $vehicle->licenseplate }} </td>
						</tr>
						<tr>
							<td><strong>Voertuigkleur</strong></td>
							<td> {{ $vehicle->color }} </td>
						</tr>
						<tr>
							<td><strong>Verbruik per kilometer</strong></td>
							<td> {{ $vehicle->vehicleusage }} </td>
						</tr>
						<tr>
							<td><strong>Prijs per uur</strong></td>
							<!-- determine if currency session isset and adapt price from another sessionvariable -->
							<td>{{ PriceConverter::convert($vehicle->hourlyrate + $vehicle->hourlyrate / 100 * General::vat()); }} 
								incl {{ General::vat() }}% btw ({{ PriceConverter::convert( $vehicle->hourlyrate / 100 * General::vat() ); }}) </td>
							
							

						</tr>
						<tr>
							<td><strong>Prijs per dag</strong></td>

							@if(Session::get('leenmeij.currency'))
								<td>{{ PriceConverter::convert($vehicle->hourlyrate * 24 + $vehicle->hourlyrate * 24 / 100 * General::vat()) ; }} 
									incl {{ General::vat() }}% btw ({{ PriceConverter::convert($vehicle->hourlyrate * 24 / 100 * General::vat()); }}) </td>

							@else
								<td>€ {{ $vehicle->hourlyrate * 24 + $vehicle->hourlyrate * 24 / 100 * General::vat() ; }} incl {{ General::vat() }}% btw (€ {{ $vehicle->hourlyrate * 24 / 100 * General::vat(); }}) </td>
							@endif

						</tr>
						<tr>
							<td><strong>Opmerkingen</strong></td>
							<td> {{ $vehicle->comment }} </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@if($reviews->isEmpty())
<div class='row'>
	<div class='col-lg-12'>
		<p>Er zijn nog geen reviews geschreven voor dit voertuig aanwezig.</p>
	</div>
</div>

@else
<div class='row'>
	<div class='col-lg-12'>
		<div class="panel-body">
			<div class="page-header">
				<h1>Beoordelingen<small> dit is wat onze klanten ervan vonden</small></h1>
			</div>
			@foreach($reviews as $review)
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>Voertuig review van: {{ $review->user->firstname }}
					</span>
					<span class="pull-right">
						@for ($i=1; $i <= 5 ; $i++)
						<span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
						@endfor
					</span>
				</div>
				<div class='panel-body'>
					<p>{{ $review->comment }} </p>
					<hr>
					<small class="pull-right">Geschreven op: {{ $review->timeago }}</small>
				</div>
			</div>
			@endforeach
			{{ $reviews->links() }}
		</div>
	</div>
</div>
@endif

@stop
