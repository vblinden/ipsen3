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
			<h1>Inloggen <small>Met uw LeenMeij account</small></h1>
		</div>
		<p>Hier onder kunt u inloggen met uw LeenMeij account.</p>
	</div>
</div>
<div class='row'>
	<div class='col-lg-8'>
		<div class="panel panel-default">
			<div class="panel-heading">Uw gegevens</div>
			<div class="panel-body">
				{{ Form::open(array('action' => 'UserController@postLogin')) }}

				{{-- Username field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('email', 'E-mail'); }}
					{{ Form::text('email', null, array('class' => 'form-control')); }}
				</div>

				{{-- Password field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('password', 'Wachtwoord'); }}
					{{ Form::password('password', array('class' => 'form-control')); }}
				</div>

				{{ Form::submit(Lang::get('users.loginButton'), array('class' => 'btn btn-primary btn-full')); }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class='col-lg-4'>
		<div class="panel panel-info">
			<div class="panel-heading">Nog geen LeenMeij account?</div>
			<div class="panel-body">
				<p>Als u nog geen LeenMeij account heeft kunt boven aan de pagina op <strong><a href="/user/register">Registreren</a></strong> klikken om een LeenMeij account aan te maken. U kunt ook op de onderstaande knop klikken.</p>
				<a href="/user/register" class="btn btn-primary btn-full">Een LeenMeij account maken</a>
			</div>
		</div>
	</div>
</div>
@stop