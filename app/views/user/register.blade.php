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
			<h1>Registreren <small>Een nieuwe LeenMeij account aanmaken</small></h1>
		</div>
		<p>Hier onder kunt u een nieuwe LeenMeij account aanmaken. Alle rode gemarkeerde velden zijn verplicht.</p>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class="panel panel-default">
			<div class="panel-heading">Uw gegevens</div>
			<div class="panel-body">
				{{ Form::open(array('action' => 'UserController@postRegister', 'class' => 'address')) }}
				<div class='row'>
					<div class='col-lg-6'>
						{{-- Email field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('email', 'E-mail'); }}
							{{ Form::text('email', null, array('class' => 'form-control')); }}
						</div>

						{{-- Password field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('password', 'Wachtwoord'); }}
							{{ Form::password('password', array('class' => 'form-control')); }}
						</div>

						{{-- Confirm password field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('passwordconfirm', 'Wachtwoord bevestigen'); }}
							{{ Form::password('passwordconfirm', array('class' => 'form-control')); }}
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
							<div class='row'>
								<div class='col-lg-8'>
									{{ Form::label('zipcode', 'Postcode'); }}
									{{ Form::text('zipcode', null, array('class' => 'form-control postcode')); }}
								</div>
								<div class='col-lg-4'>
									{{ Form::label('addresslinetwo', 'Huisnummer'); }}
									{{ Form::text('addresslinetwo', null, array('class' => 'form-control streetnumber')); }}
								</div>
							</div>
						</div>
						{{-- Address field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('addresslineone', 'Adres 1'); }}
							{{ Form::text('addresslineone', null, array('class' => 'form-control street')); }}
						</div>
					</div>

					<div class='col-lg-6'>
						{{-- City field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('city', 'Woonplaats'); }}
							{{ Form::text('city', null, array('class' => 'form-control city')); }}
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

						{{ Form::captcha(array('theme' => 'clean')); }}
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-12'>
						{{ Form::submit('Registeren', array('class' => 'btn btn-primary btn-full')); }}
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')
<script type="text/javascript" src="/js/zipcode.js"></script>
<script type="text/javascript">
  var pro6pp_auth_key = "UWYghPakHXTzpvFM";
  $(document).ready(function() {
      $(".address").applyAutocomplete();
  });
</script>
@stop