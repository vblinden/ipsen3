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
			<h1>Account <small>De persoonlijke LeenMeij account van {{ Auth::user()->firstname; }} {{ Auth::user()->lastname; }}</small></h1>
		</div>
		<p>Hier onder vind u de gegevens die bekend zijn bij LeenMeij, u kunt op deze pagina uw gegevens bijwerken of er voor kiezen om uw wachtwoord te wijzigen.</p>
	</div>
</div>
<div class='row'>
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">Uw gegevens</div>
			<div class="panel-body">
				{{ Form::model(Auth::user(), array('action' => 'UserController@postAccount')) }}

				{{ $errors->first('email') }}
				{{ $errors->first('password') }}

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
					{{ Form::label('addresslineone', 'Adres 1'); }}
					{{ Form::text('addresslineone', null, array('class' => 'form-control')); }}
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
				{{ Form::model(Auth::user(), array('action' => 'UserController@postChangePassword')) }}

				{{ $errors->first('email') }}
				{{ $errors->first('password') }}

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
		<div class="panel panel-info">
			<div class="panel-heading">Zijn mijn gegevens veilig?</div>
			<div class="panel-body">
				<p>
					LeenMeij doet er alles aan om uw gegevens veilig op te slaan. Wij hebben daarom een aantal
					maatregelen genomen waarmee wij uw gegevens veiliger opslaan. Het wordt dus moeilijker voor inbrekers
					om in te breken en bij uw gegevens te komen. 
				</p>
				<ul>
					<li>
						Uw gegevens worden opgeslagen in een centrale database die goed is beveiligd en vaak wordt gecontroleerd
						op beveiligingslekken. 
					</li>
					<li>
						Uw wachtwoord wordt <strong><a href="http://nl.wikipedia.org/wiki/Encryptie" target="_blank">geëncrypt</a></strong> opgeslagen. 
					</li>
					<li>
						Uw betaling gegevens worden niet opgeslagen.
					</li>
					<li>
						Als er daadwerkelijk een inbraak is wordt u meteen ingelicht.
					</li>
				</ul>
				<p>
					Als u meer vragen heeft kunt u altijd e-mailen naar <strong>info@leenmeij.tk</strong>.
				</p>
			</div>
		</div>
	</div>
</div> 


@stop