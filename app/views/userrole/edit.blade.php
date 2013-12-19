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
			<h1>Gebruikers rol aanpassen <small>Een gebruikers rol aanpassen</small></h1>
		</div>
		<p>Hieronder kunt u een al bestaand gebruikers rol aanpassen.</p>
	</div>
</div>
<div class="row">
	<div class='col-lg-12'>
		{{ Form::model($userrole, array('action' => 'UserRoleController@postEdit')) }}
		<div class="panel panel-default">
			<div class="panel-heading">Gebruikers rol gegevens</div>
			<div class="panel-body">
				{{ Form::hidden('id', $userrole->id); }}
				<div class='form-group'>
					{{ Form::label('name', 'Naam'); }}
					{{ Form::text('name', null, array('class' => 'form-control')); }}
				</div>

				{{ Form::submit('Bewerken', array('class' => 'btn btn-primary btn-full')); }}


			</div>
		</div>
	</div>
</div>

{{ Form::close() }}

@stop