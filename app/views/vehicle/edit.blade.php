@extends('layout')

@section('content')
<div class="row">
	<div class='col-lg-12'>
		<h1>Voertuig bewerken</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>


		{{ Form::model($vehicle, array('action' => 'VehicleController@postAdd', 'files' => true)) }}

		{{ $errors->first('email') }}
		{{ $errors->first('password') }}

		<div class="page-header">
			<h1>Voertuig gegevens </h1>
		</div>
		<div class='col-lg-6'>
			{{-- Category field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('category', 'Categorie'); }}
				{{ Form::text('category', null, array('class' => 'form-control')); }}
			</div>

			{{-- Brand field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('brand', 'Merk'); }}
				{{ Form::text('brand', null, array('class' => 'form-control')); }}
			</div>

			{{-- Model field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('model', 'Model'); }}
				{{ Form::text('model', null, array('class' => 'form-control')); }}
			</div>

			{{-- License plate field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('license', 'Kenteken'); }}
				{{ Form::text('license', null, array('class' => 'form-control')); }}
			</div>

			{{-- Milage field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('milage', 'Kilometerstand'); }}
				{{ Form::text('milage', null, array('class' => 'form-control')); }}
			</div>

		</div>
		<div class='col-lg-6'>
			{{-- Usage field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('usage', 'Verbruik'); }}
				{{ Form::text('usage', null, array('class' => 'form-control')); }}
			</div>

			{{-- Color field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('color', 'Kleur'); }}
				{{ Form::text('color', null, array('class' => 'form-control')); }}
			</div>

			{{-- Hourly rate field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('hourlyrate', 'Per uur kosten'); }}
				{{ Form::text('hourlyrate', null, array('class' => 'form-control')); }}
			</div>

			{{-- Comment field ---------------------------------------------------}}
			<div class='form-group'>
				{{ Form::label('comment', 'Opmerkingen'); }}
				{{ Form::textarea('comment', null, array('class' => 'form-control', 'style' => 'height: 110px;')); }}
			</div>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Voertuig afbeelding </h1>
		</div>

		<img src='{{ $vehicle['image'] }}' alt='Afbeelding van de geslecteerde auto.' />

		<p>Selecteer hieronder de afbeelding die u wilt toevoegen.</p>
		<p>{{ Form::file('image'); }} </p>
		{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary')); }}
	</div>
</div>

{{ Form::close() }}
</div>
</div>
@stop