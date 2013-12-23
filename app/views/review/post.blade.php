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