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
	</div>
</div>
<div class='row'>
	<div class='col-lg-3'>
		<ul class="nav nav-pills nav-stacked" style="border: 1px solid #ddd; background-color: white;">
			<li class='active'><a href="#general" data-toggle="pill">Algemeen</a></li>
			<li class="nav-divider"></li>
			<li><a href="#vehicles" data-toggle="pill"><span class="badge pull-right">{{ $vehicles->count() }}</span>Voertuigen</a></li>
			<li><a href="#vehiclesoptions" data-toggle='pill'><span class="badge pull-right">{{ $vehicleoptions->count() }}</span>Voertuigen opties</a></li>
			<li class="nav-divider"></li>
			<li><a href="#reservations" data-toggle="pill"><span class="badge pull-right">{{ $reservations->count() }}</span>Reserveringen</a></li>
			<li><a href="#invoices" data-toggle="pill"><span class="badge pull-right">{{ $invoices->count() }}</span>Facturen</a></li>
			<li class="nav-divider"></li>
			<li><a href="#users" data-toggle="pill"><span class="badge pull-right">{{ $users->count() }}</span>Gebruikers</a></li>
			<li><a href="#userroles" data-toggle="pill"><span class="badge pull-right">{{ $userroles->count() }}</span>Gebruikers rollen</a></li>
			<li><a href="#companies" data-toggle="pill"><span class="badge pull-right">{{ $companies->count() }}</span>Bedrijven</a></li>
			<li class="nav-divider"></li>
			<li><a href="#reviews" data-toggle="pill"><span class="badge pull-right">{{ $reviews->count() }}</span>Reviews</a></li>
		</ul>
	</div>
	<div class='col-lg-9'>
		<div class="tab-content">
			<div class="tab-pane active" id="general">
				<div class="page-header">
					<h1>Algemeen <small></small></h1>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Belasting Toegevoegde Waarde (BTW)</div>
					<div class="panel-body">
						{{ Form::open(array('action' => 'AdminController@postVat')) }}

						{{-- VAT field ---------------------------------------------------}}
						<div class='form-group'>
							{{ Form::label('vat', 'Belasting Toegevoegde Waarde (BTW) in procenten'); }}
							{{ Form::text('vat', $general->vat, array('class' => 'form-control')); }}
						</div>

						{{ Form::submit('Belasting Toegevoegde Waarde (BTW) wijzigen', array('class' => 'btn btn-primary btn-full')); }}
						{{ Form::close() }}
					</div>
					
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Skins</div>
					<div class="panel-body">
						{{ Form::open(array('action' => 'AdminController@postSkin')) }}

						{{-- Skin field ---------------------------------------------------}}
						<div class='form-group'>
							{{ Form::label('skin', 'Skin'); }}
							{{ Form::select('skin', array('Standaard' => 'Standaard', 'Zomer' => 'Zomer', 'Kerst' => 'Kerst'), $general->skin, array('class' => 'form-control')); }}
						</div>

						{{ Form::submit('Skin aanpassen', array('class' => 'btn btn-primary btn-full')); }}
						{{ Form::close() }}
					</div>
					
				</div>
			</div>
			<div class="tab-pane" id="vehicles">
				<div class="page-header">
					<h1>Voertuigen <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde voertuigen. U kunt de voertuigen bewerken, verwijderen of een nieuwe voertuig aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle voertuigen.</p>
				<div class="panel panel-default">
					<div class="panel-heading">
						Voertuigen 
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
								<th width="185px"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($vehicles->take(5) as $vehicle)
							<tr>
								<td>{{ $vehicle->id }}</td>
								<td>{{ $vehicle->brand }}</td>
								<td>{{ $vehicle->model }}</td>
								<td>{{ $vehicle->licenseplate }}</td>
								<td>{{ $vehicle->category['name'] }}</td>
								<td>
									<a href='/vehicle/edit/{{ $vehicle->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class='panel-body'>
						<div class='col-lg-6'>
							<a href="/admin/vehicles" class="btn btn-primary btn-full">Alle voertuigen</a>
						</div>
						<div class='col-lg-6'>
							<a href="/vehicle/add" class="btn btn-success btn-full">Nieuw voertuig</a> 
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="vehiclesoptions">
				<div class="page-header">
					<h1>Voertuigen opties <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde voertuig opties. U kunt de voertuig opties bewerken, verwijderen of een nieuwe voertuig aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle voertuig opties.</p>
				<div class="panel panel-default">
					<div class="panel-heading">
						Voertuig opties 
					</div>

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
							@foreach ($vehicleoptions->take(5) as $vehicleoption)
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
					<div class='panel-body'>
						<div class='col-lg-6'>
							<a href="/admin/vehicleoptions" class="btn btn-primary btn-full">Alle voertuig opties</a>
						</div>
						<div class='col-lg-6'>
							<a href="/vehicleoption/add" class="btn btn-success btn-full">Nieuwe voertuig optie</a> 
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="reservations">
				<div class="page-header">
					<h1>Reserveringen <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde reserveringen. U kunt de reserveringen bewerken of verwijderen. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle reserveringen.</p>
				<div class="panel panel-default">
					<div class="panel-heading">
						Reserveringen
					</div>

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
							@foreach ($reservations->take(5) as $reservation)
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
					<div class='panel-body'>
						<div class='col-lg-12'>
							<a href="/admin/reservations" class="btn btn-primary btn-full">Alle reserveringen</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="invoices">
				<div class="page-header">
					<h1>Facturen <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde facturen. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle facturen.</p>
				<p>Facturen worden automatisch bijgewerkt als een reservering wordt bewerkt. Facturen kunnen niet worden verwijderd.</p>
				<div class="panel panel-default">
					<div class="panel-heading">
							Facturen
					</div>

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
							@foreach ($invoices->take(5) as $invoice)
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
					<div class='panel-body'>
						<div class='col-lg-12'>
							<a href="/admin/invoices" class="btn btn-primary btn-full">Alle facturen</a>
						</div>
					</div>
				</div>
			</div>				
			
			<div class="tab-pane" id="users">
				<div class="page-header">
					<h1>Gebruikers <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde gebruikers. U kunt de gebruikers bewerken, verwijderen of een nieuwe gebruiker aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle gebruikers.</p>
				<div class="panel panel-default">
					<div class="panel-heading">Gebruikers </div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Voornaam</th>
								<th>Achternaam</th>
								<th>E-mail</th>
								<th>Zakelijk</th>
								<th width="185px"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users->take(5) as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->firstname }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->email }}</td>
								<td>
									@if ($user->business == 1)
										Ja
									@else
										Nee
									@endif
								</td>
								<td>
									<a href='/user/edit/{{ $user->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/user/delete/{{ $user->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class='panel-body'>
						<div class='col-lg-12'>
							<a href="/admin/users" class="btn btn-primary btn-full">Alle gebruikers</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="userroles">
				<div class="page-header">
					<h1>Gebruikers rollen<small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde gebruikers rollen. U kunt de gebruikers rollen bewerken, verwijderen of een nieuwe gebruikers rol aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle gebruikers rollen.</p>
				<div class="panel panel-default">
					<div class="panel-heading">Gebruikers rollen</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Naam</th>
								<th width="185px"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($userroles->take(5) as $userrole)
							<tr>
								<td>{{ $userrole->id }}</td>
								<td>{{ $userrole->name }}</td>
								<td>
									<a href='/userrole/edit/{{ $userrole->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/userrole/delete/{{ $userrole->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze gebruikers rol wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class='panel-body'>
						<div class='col-lg-6'>
							<a href="/admin/userroles" class="btn btn-primary btn-full">Alle gebruikers rollen</a>
						</div>
						<div class='col-lg-6'>
							<a href="/userrole/add" class="btn btn-success btn-full">Nieuwe gebruikers rol</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="companies">
				<div class="page-header">
					<h1>Bedrijven<small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde bedrijven. U kunt de bedrijven bewerken, verwijderen of een nieuw bedrijf aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle bedrijven.</p>
				<div class="panel panel-default">
					<div class="panel-heading">Bedrijven</div>
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
							@foreach ($companies->take(5) as $company)
							<tr>
								<td>{{ $company->id }}</td>
								<td>{{ $company->name }}</td>
								<td>{{ $company->users()->count() }}</td>
								<td>
									<a href='/company/edit/{{ $company->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/company/delete/{{ $company->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u dit bedrijf wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class='panel-body'>
						<div class='col-lg-6'>
							<a href="/admin/companies" class="btn btn-primary btn-full">Alle bedrijven</a>
						</div>
						<div class='col-lg-6'>
							<a href="/company/add" class="btn btn-success btn-full">Nieuw bedrijf</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="reviews">
				<div class="page-header">
					<h1>Reviews<small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde reviews. U kunt de reviews bewerken of verwijderen. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle reviews.</p>
				<div class="panel panel-default">
					<div class="panel-heading">Gebruikers rollen</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Beschrijving</th>
								<th>Beoordeling</th>
								<th>Voertuig</th>
								<th>Gebruiker</th>
								<th width="185px"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($reviews->take(5) as $review)
							<tr>
								<td>{{ $review->id }}</td>
								<td>{{ Str::words($review->comment, $words = 3, $end = '...')}}</td>
								<td>
									@for ($i=1; $i <= 5 ; $i++)
									    <span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
									@endfor
								</td>
								<td>
									@if ($review->vehicle_id != 0)
									{{ $review->vehicle->brand }} {{ $review->vehicle->model }}
									@else 
									Bedrijf
									@endif
								</td>
								<td>{{ $review->user->firstname }} {{ $review->user->lastname }}</td>
								<td>
									<a href='/review/edit/{{ $review->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/review/delete/{{ $review->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze review wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class='panel-body'>
						<div class='col-lg-12'>
							<a href="/admin/reviews" class="btn btn-primary btn-full">Alle reviews</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts')
<script type='text/javascript'>
	$(document).ready(function() {
		var url = document.location.toString();
		if (url.match('#')) {
			$('.nav-pills a[href=#'+url.split('#')[1]+']').tab('show') ;
		} 

		// Change hash for page-reload
		$('.nav-pills a').on('shown.bs.tab', function (e) {
			window.location.hash = e.target.hash;
		})
	});
</script>
@stop