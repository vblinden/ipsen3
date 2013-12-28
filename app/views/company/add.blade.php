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
			<h1>Bedrijf toevoegen <small>Een bedrijf toevoegen</small></h1>
		</div>
		<p>Hieronder kunt u een nieuw bedrijf aanmaken.</p>
	</div>
</div>
<div class="row">
	<div class='col-lg-12'>
		{{ Form::open(array('action' => 'CompanyController@postAdd')) }}
		<div class="panel panel-default">
			<div class="panel-heading">Bedrijf gegevens</div>
			<div class="panel-body">
				<div class='form-group'>
					{{ Form::label('name', 'Naam'); }}
					{{ Form::text('name', null, array('class' => 'form-control')); }}
				</div>
				<div class='form-group'>
					{{ Form::label('admin_user_id', 'Administrator (Gebruikers ID)'); }}
					{{ Form::text('admin_user_id', null, array('class' => 'form-control')); }}
				</div>

				{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary btn-full')); }}
			</div>
		</div>
	</div>
</div>

{{ Form::close() }}

@stop
