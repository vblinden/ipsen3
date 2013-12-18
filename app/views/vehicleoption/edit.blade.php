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
			<h1>Voertuig optie toevoegen <small>Een voertuig optie toevoegen</small></h1>
		</div>
		<p>Hieronder kunt u een nieuwe optie aanmaken.</p>
	</div>
</div>
<div class="row">
	<div class='col-lg-12'>
		{{ Form::model($vehicleoption, array('action' => 'VehicleOptionController@postEdit')) }}
		<div class="panel panel-default">
			<div class="panel-heading">Optie gegevens</div>
			<div class="panel-body">
				{{ Form::hidden('id', $vehicleoption->id); }}
				<div class='form-group'>
					{{ Form::label('name', 'Naam'); }}
					{{ Form::text('name', null, array('class' => 'form-control')); }}
				</div>
				<div class='form-group'>
					{{ Form::label('price', 'Bedrag per uur'); }}
					{{ Form::text('price', null, array('class' => 'form-control')); }}
				</div>

				{{ Form::submit('Bewerken', array('class' => 'btn btn-primary btn-full')); }}


			</div>
		</div>
	</div>
</div>

{{ Form::close() }}

@stop