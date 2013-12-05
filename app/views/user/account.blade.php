@extends('layout')

@section('content')
<div class='row'>
    <div class='col-lg-12'>
        <h1>Account van {{ Auth::user()->firstname; }} </h1>
        <p>Hier kunt u alles instellen.</p>

        {{ Form::model(Auth::user(), array('action' => 'UserController@postAccount')) }}

        {{ $errors->first('email') }}
        {{ $errors->first('password') }}

        <div class='col-lg-6'>
            {{-- Email field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('email', 'E-mail'); }}
                {{ Form::text('email', null, array('class' => 'form-control')); }}
            </div>

            {{-- Password field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('password', 'Wachtwoord'); }}
                {{ Form::password('password', array('class' => 'form-control')); }}
            </div>

            {{-- Confirm password field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('password', 'Wachtwoord bevestigen'); }}
                {{ Form::password('password', array('class' => 'form-control')); }}
            </div>

            {{-- First name field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('firstname', 'Voornaam'); }}
                {{ Form::text('firstname', null, array('class' => 'form-control')); }}
            </div>

            {{-- Last name field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('lastname', 'Achternaam'); }}
                {{ Form::text('lastname', null, array('class' => 'form-control')); }}
            </div>
            {{-- Zipcode field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('zipcode', 'Postcode'); }}
                {{ Form::text('zipcode', null, array('class' => 'form-control')); }}
            </div>
            {{-- Address field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('addresslineone', 'Adres 1'); }}
                {{ Form::text('addresslineone', null, array('class' => 'form-control')); }}
            </div>
        </div>
        <div class='col-lg-6'>
            {{-- City field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('city', 'Woonplaats'); }}
                {{ Form::text('city', null, array('class' => 'form-control')); }}
            </div>

            {{-- Country field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('country', 'Land'); }}
                {{ Form::text('country', null, array('class' => 'form-control')); }}
            </div>

            {{-- Phone number field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('phonenumber', 'Telefoonnummer'); }}
                {{ Form::text('phonenumber', null, array('class' => 'form-control')); }}
            </div>

            {{-- License field ---------------------------------------------------}}
            <div class='form-group'>
                {{ Form::label('licensenumber', 'Rijbewijsnummer'); }}
                {{ Form::text('licensenumber', null, array('class' => 'form-control')); }}
            </div>

            {{-- Passport field ---------------------------------------------------}}
            <div class='form-group'>
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
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-lg-12'>
        <div class='col-lg-12'>
        {{ Form::submit('Bijwerken', array('class' => 'btn btn-primary')); }}
        </div>
    </div>
</div>

{{ Form::close() }}
@stop