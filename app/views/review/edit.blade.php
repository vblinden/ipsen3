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
			<h1>Review 
			<small>
				voor 
				@if ($review->vehicle_id != 0)
				{{ $review->vehicle->brand }} {{ $review->vehicle->model }} met het kenteken {{ $review->vehicle->licenseplate }}
				@else 
				LeenMeij
				@endif
			</small></h1>
		</div>
		<p>Hier onder vind u de gegevens die bekend zijn bij deze review, u kunt op deze pagina de review bewerken.</p>
	</div>
</div>
<div class='row'>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">De gegeven review</div>
			<div class="panel-body">
				{{ Form::model($review, array('action' => 'ReviewController@postEdit')) }}
				{{ Form::hidden('id', $review->id); }}
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-6">
							<div class='form-group'>
								{{ Form::label('rating', 'Gegeven beoordeling: '); }}
								<div>
									@for ($i=1; $i <= 5 ; $i++)
										<span class="glyphicon stars glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
									 @endfor
								 </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div>
								<span><strong>Nieuwe beoordeling: </strong></span>
					            <input id="ratings-hidden" name="rating" type="hidden" /> 
					            <div class="stars starrr" data-rating="0"></div>
							</div>
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='col-lg-12'>
						<div class='form-group'>
							{{ Form::label('comment', 'Commentaar'); }}
							{{ Form::textarea('comment', null, array('class' => 'form-control', 'style' => 'height: 110px;')); }}
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='col-lg-12'>
						{{ Form::submit('Bijwerken', array('class' => 'btn btn-primary btn-full')); }}
					</div>
				</div>

				{{ Form::close() }}
			</div>
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
