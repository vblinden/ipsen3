@extends('layout')

@section('content')
<div class="row">
	<div class='col-lg-12'>
		<h1>Voertuig toevoegen</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>


		{{ Form::open(array('action' => 'UserController@postRegister')) }}

		{{ $errors->first('email') }}
		{{ $errors->first('password') }}

		<div class="page-header">
			<h1>Voertuig gegevens </h1>
		</div>
		<div class='col-lg-6'>
			{{-- Email field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('email', 'Categorie'); }}
				{{ Form::text('email', null, array('class' => 'form-control')); }}
			</div>

			{{-- Password field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('password', 'Merk'); }}
				{{ Form::password('password', array('class' => 'form-control')); }}
			</div>

			{{-- Confirm password field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('password', 'Model'); }}
				{{ Form::password('password', array('class' => 'form-control')); }}
			</div>

			{{-- First name field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('firstname', 'Kenteken'); }}
				{{ Form::text('firstname', null, array('class' => 'form-control')); }}
			</div>

			{{-- Last name field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('lastname', 'Kilometerstand'); }}
				{{ Form::text('lastname', null, array('class' => 'form-control')); }}
			</div>

		</div>
		<div class='col-lg-6'>
			{{-- Zipcode field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('zipcode', 'Verbruik'); }}
				{{ Form::text('zipcode', null, array('class' => 'form-control')); }}
			</div>
			{{-- Address field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('addresslineone', 'Kleur'); }}
				{{ Form::text('addresslineone', null, array('class' => 'form-control')); }}
			</div>

			{{-- City field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('city', 'Per uur kosten'); }}
				{{ Form::text('city', null, array('class' => 'form-control')); }}
			</div>

			{{-- Country field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('country', 'Opmerkingen'); }}
				{{ Form::textarea('country', null, array('class' => 'form-control', 'style' => 'height: 110px;')); }}
			</div>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Voertuig afbeelding </h1>
		</div>
		<div class='col-lg-12'>
			{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary')); }}
		</div>
	</div>
</div>

{{ Form::close() }}

</div>
</div>
@stop