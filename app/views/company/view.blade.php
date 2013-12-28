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
			<h1>Overzicht pagina <small>van {{ $company->name }}</small></h1>
		</div>
		<p>Hieronder kunt u een nieuwe gebruikers rol aanmaken.</p>
	</div>
</div>

<div class='row'>
	<div class='col-lg-12'>
		<div class="panel panel-default">
			<div class="panel-heading">Gebruikers overzicht</div>
			<div class="panel-body">
				<p>
					Hier onder ziet u alle gebruikers die bij uw bedrijf zijn aangemeld.
				</p>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Naam</th>
						<th>Aantal reserveringen</th>
						@if ($company->admin_user_id == Auth::user()->id)<th></th>@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($company->users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->firstname }} {{ $user->lastname }}</td>
						<td></td>
						@if ($company->admin_user_id == Auth::user()->id)
						<td>
							@if ($user->id != $company->admin_user_id)
							<a href='/company/userdelete/{{ $company->id }}/{{ $user->id }}' class="btn btn-danger btn-sm" onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen uit uw bedrijf?')">Verwijderen</a>
							@endif
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@if ($company->admin_user_id == Auth::user()->id)
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Gebruiker toevoegen <small>aan {{ $company->name }}</small></h1>
		</div>
		{{ Form::open(array('action' => 'CompanyController@postAdd')) }}
		<div class="panel panel-default">
			<div class="panel-heading">Gebruiker gegevens</div>
			<div class="panel-body">
				<div class="alert alert-info">
					<strong>Gebruiker id?</strong> Deze kunt u vragen aan de desbetreffende gebruiker, deze is te vinden in de e-mail die de gebruiker heeft ontvangen na het registratie proces
				</div>
				<div class='form-group'>
					{{ Form::hidden('company_id', $company->id); }}
					{{ Form::label('user_id', 'Gebruikers ID'); }}
					{{ Form::text('user_id', null, array('class' => 'form-control')); }}
				</div>

				{{ Form::submit('Gebruiker toevoegen aan bedrijf', array('class' => 'btn btn-primary btn-full')); }}
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endif
@stop