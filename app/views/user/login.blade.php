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
			<h1>{{ Lang::get('login.loginTitle'); }} <small>{{ Lang::get('login.loginSubtitle'); }}</small></h1>
		</div>
		<p>{{ Lang::get('login.loginMessage'); }}</p>
	</div>
</div>
<div class='row'>
	<div class='col-lg-8'>
		<div class="panel panel-default">
			<div class="panel-heading">{{ Lang::get('login.loginBoxTitle'); }}</div>
			<div class="panel-body">
				{{ Form::open(array('action' => 'UserController@postLogin')) }}

				{{-- Username field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('email', Lang::get('login.txtEmail')); }}
					{{ Form::text('email', null, array('class' => 'form-control')); }}
				</div>

				{{-- Password field ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::label('password', Lang::get('login.txtPassword')); }}
					{{ Form::password('password', array('class' => 'form-control')); }}
				</div>

				{{ Form::submit(Lang::get('login.btnLogin'), array('class' => 'btn btn-primary btn-full')); }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class='col-lg-4'>
		<div class="panel panel-info">
			<div class="panel-heading">{{ Lang::get('login.panelRegisterTitle'); }}</div>
			<div class="panel-body">
				<p>{{ Lang::get('login.panelRegisterContent1'); }} <strong><a href="/user/register/personal">{{ Lang::get('login.panelRegisterContent2'); }}</a></strong> {{ Lang::get('login.panelRegisterContent3'); }}</p>
				<a href="/user/register/personal" class="btn btn-primary btn-full">{{ Lang::get('login.btnRegister'); }}</a>
			</div>
		</div>
	</div>
</div>
@stop