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
		<ul class="nav nav-pills nav-stacked" style="border: 1px solid #ddd;">
			<li class='active'><a href="#general" data-toggle="pill">Algemeen</a></li>
			<li><a href="#vehicles" data-toggle="pill"><span class="badge pull-right">{{ $vehicles->count() }}</span>Voertuigen</a></li>
			<li><a href="#vehiclesoptions" data-toggle='pill'>Voertuigen opties</a></li>
			<li><a href="#reservations" data-toggle="pill">Reserveringen</a></li>
			<li><a href="#invoices" data-toggle="pill">Facturen</a></li>
			<li><a href="#users" data-toggle="pill"><span class="badge pull-right">{{ $users->count() }}</span>Klanten</a></li>
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

						{{-- Username field ---------------------------------------------------}}
						<div class='form-group'>
							{{ Form::label('vat', 'Belasting Toegevoegde Waarde (BTW) in procenten'); }}
							{{ Form::text('vat', $general->vat, array('class' => 'form-control')); }}
						</div>

						{{ Form::submit('Belasting Toegevoegde Waarde (BTW) wijzigen', array('class' => 'btn btn-primary btn-full')); }}
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
							<a href="#" class="btn btn-primary btn-full">Alle voertuigen</a>
						</div>
						<div class='col-lg-6'>
							<a href="/vehicle/add" class="btn btn-success btn-full">Nieuw voertuig</a> 
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="vehiclesoptions">
				
			</div>
			<div class="tab-pane" id="reservations">
				
			</div>
			<div class="tab-pane" id="invoices">
				
			</div>
			<div class="tab-pane" id="users">
				<div class="page-header">
					<h1>Klanten <small></small></h1>
				</div>
				<p>Hieronder vind u de laatste vijf toegevoegde klanten. U kunt de klanten bewerken, verwijderen of een nieuwe klant aanmaken. U kunt er ook voor kiezen om naar een overzicht te gaan voor alle klanten.</p>
				<div class="panel panel-default">
					<div class="panel-heading">Voertuigen <a href="/user/add" class="btn btn-success btn-sm pull-right btn-right"><span class="glyphicon glyphicon-plus"></span></a> <button class="btn btn-primary btn-sm pull-right btn-right" style="margin-right: 5px;">Alle klanten</button> </div>

					<!-- Vehicle table -->
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
								<td>{{ $user->business }}</td>
								<td>
									<a href='/user/edit/{{ $user->id }}' class="btn btn-primary btn-sm">Bewerken</a> 
									<a href='/user/delete/{{ $user->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze klant wilt verwijderen?')">Verwijderen</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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