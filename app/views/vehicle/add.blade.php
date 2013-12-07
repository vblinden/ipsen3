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
			<h1>Voertuig toevoegen <small>Een nieuw voertuig aanmaken in de database</small></h1>
		</div>
		<p>Hieronder kunt u een nieuw voertuig aanmaken.</p>
	</div>
</div>
<div class="row">
	<div class='col-lg-12'>
		{{ Form::open(array('action' => 'VehicleController@postAdd', 'files' => true)) }}
		<div class="panel panel-default">
			<div class="panel-heading">Voertuig gegevens</div>
			<div class="panel-body">
				<div class='col-lg-6'>
					{{-- Category field ---------------------------------------------------}}
					<div class='form-group'>
						{{ Form::label('vehiclecategoryid', 'Categorie'); }}
						{{ Form::select('vehiclecategoryid', VehicleCategory::lists('name', 'id'), null, array('class' => 'form-control')); }}
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
						{{ Form::label('licenseplate', 'Kenteken'); }}
						{{ Form::text('licenseplate', null, array('class' => 'form-control')); }}
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
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class="panel panel-default">
			<div class="panel-heading">Voertuig afbeelding</div>
			<div class="panel-body">
				<div class='col-lg-6'>
					<p>Selecteer hieronder de afbeelding die u wilt toevoegen.</p>

					<p>{{ Form::file('image', array('id' => 'vehicleImageUpload')); }} </p>
				</div>
				<div class='col-lg-6'>
					<a class="thumbnail">
						<img id='vehicleImage' src="http://placehold.it/550x250&text=Voertuig" alt="Voertuig afbeelding">
					</a>
				</div>
			</div>
		</div>
		<p>
		{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary btn-full')); }}
		</p>
	</div>
</div>

{{ Form::close() }}

@stop

@section('scripts')
<script>

	$("#vehicleImageUpload").change(function(){
		if (this.files && this.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#vehicleImage').attr('src', e.target.result);
			}

			reader.readAsDataURL(this.files[0]);
		}
	});
</script>
@stop