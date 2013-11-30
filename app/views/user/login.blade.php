@extends('layout')

@section('content')
    <div class='col-lg-12'>
        <h1>{{ Lang::get('users.login') }}</h1>
        <p>{{ Lang::get('users.loginMessage') }}</p>

        {{ Form::open(array('action' => 'UserController@postLogin')) }}

        	{{ $errors->first('email') }}
        	{{ $errors->first('password') }}

        	{{-- Username field ---------------------------------------------------}}
        	<div class='form-group'>
	        	{{ Form::label('email', 'Email'); }}
	        	{{ Form::text('email', null, array('class' => 'form-control')); }}
        	</div>

        	{{-- Password field ---------------------------------------------------}}
        	<div class='form-group'>
	        	{{ Form::label('password', 'Password'); }}
	        	{{ Form::password('password', array('class' => 'form-control')); }}
        	</div>

        	{{ Form::submit(Lang::get('users.loginButton'), array('class' => 'btn btn-primary')); }}
        {{ Form::close() }}
    </div>
@stop