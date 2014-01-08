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
			<h1>Account <small>van {{ Auth::user()->firstname; }} {{ Auth::user()->lastname; }}</small></h1>
		</div>
		<p>Hier onder vind u de gegevens die bekend zijn bij LeenMeij, u kunt op deze pagina uw gegevens bijwerken of er voor kiezen om uw wachtwoord te wijzigen.</p>
	</div>
</div>
<div class='row'>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">Uw gegevens</div>
			<div class="panel-body">
				{{ Form::model($user, array('action' => 'UserController@postEdit')) }}

				{{ $errors->first('email') }}
				{{ $errors->first('password') }}

				{{ Form::hidden('id', $user->id); }}

				{{-- Email field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('email', 'E-mail'); }}
					{{ Form::text('email', null, array('class' => 'form-control')); }}
				</div>

				{{-- First name field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('firstname', 'Voornaam'); }}
					{{ Form::text('firstname', null, array('class' => 'form-control')); }}
				</div>

				{{-- Last name field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('lastname', 'Achternaam'); }}
					{{ Form::text('lastname', null, array('class' => 'form-control')); }}
				</div>
				{{-- Zipcode field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('zipcode', 'Postcode'); }}
					{{ Form::text('zipcode', null, array('class' => 'form-control')); }}
				</div>
				{{-- Address field ---------------------------------------------------}}
				<div class='form-group required'>
					<div class='row'>
						<div class='col-lg-8'>
							{{ Form::label('addresslineone', 'Straat'); }}
							{{ Form::text('addresslineone', null, array('class' => 'form-control postcode')); }}
						</div>
						<div class='col-lg-4'>
							{{ Form::label('addresslinetwo', 'Huisnummer'); }}
							{{ Form::text('addresslinetwo', null, array('class' => 'form-control streetnumber')); }}
						</div>
					</div>
				</div>

				{{-- City field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('city', 'Woonplaats'); }}
					{{ Form::text('city', null, array('class' => 'form-control')); }}
				</div>

				{{-- Country field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('country', 'Land'); }}
					{{ Form::text('country', null, array('class' => 'form-control')); }}
				</div>

				{{-- Phone number field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('phonenumber', 'Telefoonnummer'); }}
					{{ Form::text('phonenumber', null, array('class' => 'form-control')); }}
				</div>

				{{-- License field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('licensenumber', 'Rijbewijsnummer'); }}
					{{ Form::text('licensenumber', null, array('class' => 'form-control')); }}
				</div>

				{{-- Passport field ---------------------------------------------------}}
				<div class='form-group required'>
					{{ Form::label('passportnumber', 'Passpoortnummer'); }}
					{{ Form::text('passportnumber', null, array('class' => 'form-control')); }}
				</div>

				{{-- KVK number field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('kvknumber', 'KVK nummer'); }}
					{{ Form::text('kvknumber', null, array('class' => 'form-control', 'placeholder' => 'Niet verplicht')); }}
				</div>

				{{-- VAT number field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('vatnumber', 'BTW nummer'); }}
					{{ Form::text('vatnumber', null, array('class' => 'form-control', 'placeholder' => 'Niet verplicht')); }}
				</div>

				<div class='row'>
					<div class='col-lg-12'>
						{{ Form::submit('Bijwerken', array('class' => 'btn btn-primary btn-full')); }}
					</div>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">Wachtwoord wijzigen</div>
			<div class="panel-body">
				{{ Form::model($user, array('action' => 'UserController@postChangePassword')) }}

				{{ $errors->first('email') }}
				{{ $errors->first('password') }}

				{{ Form::hidden('id', $user->id); }}

				{{-- Password field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('password', 'Wachtwoord'); }}
					{{ Form::password('password', array('class' => 'form-control')); }}
				</div>

				{{-- Confirm password field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('passwordconfirm', 'Wachtwoord bevestigen'); }}
					{{ Form::password('passwordconfirm', array('class' => 'form-control')); }}
				</div>

				<div class='row'>
					<div class='col-lg-12'>
						{{ Form::submit('Wachtwoord wijzigen', array('class' => 'btn btn-primary btn-full')); }}
					</div>
				</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div> 


@stop