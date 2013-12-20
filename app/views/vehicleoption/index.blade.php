@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
		<h1>Voertuigopties <small>overzicht pagina</small></h1>
		</div>
	</div>
</div>
<p>
	Hieronder kunt u een overzicht vinden van alle voertuigopties die LeenMeij u aan kan bieden. De voertuigopties kunt u kiezen bij het maken van de reservering, de kosten zullen verwerkt worden tijdens het maken van de reservering.
</p>
<div class="row">
@foreach ($vehicleoption as $option)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<div class="row">
					<div class="col-md-8">
						<h3>{{ $option->name }}</h3>
						<p>De prijs per dag: € {{ $option->price*24 }}</p>
					</div>
					<div class="col-md-4">
						<h3>
							@if(Auth::check()) 
							@if (Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
							<a href='/vehicleoption/edit/{{ $option->id }}' class='btn btn-primary pull-right'>Bewerken</a>
							<a href='/vehicleoption/delete/{{ $option->id }}' class="btn btn-danger pull-right" onclick="return confirm('Weet u zeker dat u deze voertuigoptie wilt verwijderen?')">Verwijderen</a>
							@endif
							@endif
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

@stop