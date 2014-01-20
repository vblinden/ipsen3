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
			<h1>{{ Lang::get('register.registerTitle'); }} <small>{{ Lang::get('register.registerSubtitle'); }}</small></h1>
		</div>
		<p>{{ Lang::get('register.registerMessage'); }}</p>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class="panel panel-default">
			<div class="panel-heading">{{ Lang::get('register.registerBoxTitle'); }}</div>
			<div class="panel-body">
				{{ Form::open(array('action' => 'UserController@postRegister', 'class' => 'address')) }}
				<div class='row'>
					<div class='col-lg-6'>
						{{-- Email field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('email', Lang::get('register.txtEmail')); }}
							{{ Form::text('email', null, array('class' => 'form-control')); }}
						</div>

						{{-- Password field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('password', Lang::get('register.txtPassword')); }}
							{{ Form::password('password', array('class' => 'form-control')); }}
						</div>

						{{-- Confirm password field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('passwordconfirm', Lang::get('register.txtPassConfirm')); }}
							{{ Form::password('passwordconfirm', array('class' => 'form-control')); }}
						</div>

						{{-- First name field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('firstname', Lang::get('register.txtName')); }}
							{{ Form::text('firstname', null, array('class' => 'form-control')); }}
						</div>

						{{-- Last name field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('lastname', Lang::get('register.txtLastName')); }}
							{{ Form::text('lastname', null, array('class' => 'form-control')); }}
						</div>
						{{-- Zipcode field ---------------------------------------------------}}
						<div class='form-group required'>
							<div class='row'>
								<div class='col-lg-8'>
									{{ Form::label('zipcode', Lang::get('register.txtZipcode')); }}
									{{ Form::text('zipcode', null, array('class' => 'form-control postcode')); }}
								</div>
								<div class='col-lg-4'>
									{{ Form::label('addresslinetwo', Lang::get('register.txtHousenumber')); }}
									{{ Form::text('addresslinetwo', null, array('class' => 'form-control streetnumber')); }}
								</div>
							</div>
						</div>
						{{-- Address field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('addresslineone', Lang::get('register.txtAddress')); }}
							{{ Form::text('addresslineone', null, array('class' => 'form-control street')); }}
						</div>
					</div>

					<div class='col-lg-6'>
						{{-- City field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('city', Lang::get('register.txtCity')); }}
							{{ Form::text('city', null, array('class' => 'form-control city')); }}
						</div>

						{{-- Country field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('country', Lang::get('register.txtCountry')); }}
							{{ Form::text('country', null, array('class' => 'form-control')); }}
						</div>

						{{-- Phone number field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('phonenumber', Lang::get('register.txtPhone')); }}
							{{ Form::text('phonenumber', null, array('class' => 'form-control')); }}
						</div>

						{{-- License field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('licensenumber', Lang::get('register.txtDriverLicense')); }}
							{{ Form::text('licensenumber', null, array('class' => 'form-control')); }}
						</div>

						{{-- Passport field ---------------------------------------------------}}
						<div class='form-group required'>
							{{ Form::label('passportnumber', Lang::get('register.txtPasspoort')); }}
							{{ Form::text('passportnumber', null, array('class' => 'form-control')); }}
						</div>

						{{ Form::captcha(array('theme' => 'clean')); }}
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-12'>
						{{ Form::submit(Lang::get('register.btnRegister'), array('class' => 'btn btn-primary btn-full')); }}
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