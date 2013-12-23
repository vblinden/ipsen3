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
			<h1>{{ $vehicle->brand }} {{ $vehicle->model }}
				<small class="pull-right">
					@if(Auth::check()) 
					@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
					<a href='/vehicle/edit/{{ $vehicle->id }}' class='btn btn-primary'>Bewerken</a>
					<a href='/vehicle/delete/{{ $vehicle->id }}' class="btn btn-danger" onclick="return confirm('Weet u zeker dat u dit voertuig wilt verwijderen?')">Verwijderen</a>
					@endif
					@endif
				</small>
			</h1>
		</div>
		<div class='col-lg-6'>
			<a class="thumbnail">
				<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			</a>
		</div>
		<div class='col-lg-6'>
			<div class="panel panel-default">
				<div class="panel-heading">
					Voertuig gegevens
				</div>
				<div class='panel-body'>
				<div class="col-lg-5">
						<p><strong>Merk</strong> </p>
						<p><strong>Model </strong></p>
						<p><strong>Kilometerstand</strong> </p>
						<p><strong>Kenteken </strong></p>
						<p><strong>Voertuigkleur </strong></p>
						<p><strong>Verbruik per kilometer </strong></p>
						<p><strong>Prijs per uur </strong></p>
						<p><strong>Prijs per dag </strong></p>
						<p><strong>Opmerkingen </strong></p>
					</div>
					<div class="col-lg-7">
						<p> {{ $vehicle->brand }} </p>
						<p> {{ $vehicle->model }} </p>
						<p> {{ $vehicle->milage }} kilometer</p>
						<p> {{ $vehicle->licenseplate }} </p>
						<p> {{ $vehicle->color }} </p>
						<p> {{ $vehicle->usage }} </p>
						<p> € {{ $vehicle->hourlyrate }}</p>
						<p> € {{ $vehicle->hourlyrate * 24 }}</p>
						<p> {{ $vehicle->comment }} </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@if($reviews->isEmpty())
<div class='row'>
	<div class='col-lg-12'>
		<p>Er zijn nog geen reviews geschreven voor dit voertuig aanwezig.</p>
	</div>
</div>

@else
<div class='row' style="margin-bottom: 20px;">
	<div class='col-lg-12'>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							Bekijk reviews
						</a>

						<span class="badge pull-right">{{ $reviews->count() }}</span>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						@foreach($reviews as $review)
							<div class="panel panel-default">
								<div class="panel-heading">
									<span>Voertuig review van: {{ $review->user->firstname }}
									 </span>
								  	<span class="pull-right">
									    @for ($i=1; $i <= 5 ; $i++)
									      <span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
									    @endfor
									</span>
								</div>
								<div class='panel-body'>
									<p>{{ $review->comment }} </p>
									<hr>
									<small class="pull-right">Geschreven op: {{ $review->timeago }}</small>
								</div>
							</div>
						@endforeach
						{{ $reviews->links() }}
					</div>
				</div>
			</div>
			@endif
			@if(Auth::check())
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ Form::open(array('action' => 'ReviewController@postAdd')) }}
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseMakeReview">
							<span>Review schrijven</span>
							<small class="pull-right">Ingelogd als: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</small>
						</a>
					</h4>
				</div>
				<div id="collapseMakeReview" class="panel-collapse collapse">
					<div class="panel-body">
						<div>
							{{ Form::hidden('vehicleid', $vehicle->id); }}

							<p>Hallo {{ Auth::user()->firstname }}, je hebt vijf dagen geleden de  {{ $vehicle->brand }} {{ $vehicle->model }} gehuurd, vertel ons wat je ervaring was!</p>
							<hr>
						</div>
						<div>
							<span><strong>Uw beoordeling</strong></span>
		                    <input id="ratings-hidden" name="rating" type="hidden"> 
		                    <div class="stars starrr" data-rating="0"></div>
						</div>
						<div class='form-group'>
							{{ Form::label('comment', 'Beschrijf hier uw ervaring'); }}
							{{ Form::textarea('comment', null, array('class' => 'form-control', 'style' => 'height: 110px;')); }}
						</div>
						{{ Form::submit('Toevoegen', array('class' => 'btn btn-primary btn-full')); }}
					</div>
				</div>
				{{ Form::close() }}
			</div>
			@endif
		</div>
	</div>
</div>

@stop

@section('scripts')

<script type="text/javascript" src='/js/starsystem.js'></script>
<script type="text/javascript">

$(function(){

  var ratingsField = $('#ratings-hidden');

  $('.starrr').on('starrr:change', function(e, value){
  	ratingsField.val(value);
  });
});

</script>
@stop
