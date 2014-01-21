@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
		<h1>{{ Lang::get('accessories.accessoriesTitle') }} <small>{{ Lang::get('accessories.accessoriesSubtitle') }}</small></h1>
		</div>
	</div>
</div>
<p>
	{{ Lang::get('accessories.accessoriesInfo') }}
</p>
<div class="row">
@foreach ($vehicleoptions as $vehicleoption)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<div class="caption">
				<h3>
					{{ $vehicleoption->name }}
				</h3>
				<p>
					De prijs per dag: {{ PriceConverter::convert($vehicleoption->price * 24 + $vehicleoption->price * 24 / 100 * General::vat()); }} incl {{ General::vat() }}% btw ( {{ PriceConverter::convert($vehicleoption->price * 24 / 100 * General::vat()); }})
					@if(Auth::check()) 
					@if (Role::find(Auth::user()->role['role_id'])['name'] == 'admin')
					<a href='/vehicleoption/delete/{{ $vehicleoption->id }}' class="btn btn-danger btn-xs pull-right" style='margin-left: 5px;' onclick="return confirm('Weet u zeker dat u deze voertuig optie wilt verwijderen?')">Verwijderen</a>
					<a href='/vehicleoption/edit/{{ $vehicleoption->id }}' class='btn btn-primary btn-xs pull-right'>Bewerken</a>
					@endif
					@endif
				</p>
			</div>
		</div>
	</div>
	@endforeach
</div>

@stop