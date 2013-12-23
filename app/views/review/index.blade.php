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
			<h1>LeenMeij beoordelingen <small>door de klanten</small></h1>
		</div>
		<p>LeenMeij vind het belangrijk om feedback te krijgen van haar klanten, hierdoor kunnen we de kwaliteit en klantvriendelijkheid optimaliseren.</p>
	</div>
</div>

<div class='row' style="margin-bottom: 20px;">
	<div class='col-lg-12'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
							Bekijk reviews
					</h4>
				</div>
					<div class="panel-body">
						@foreach($reviews as $review)
						@if($review->vehicle_id == 0)
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
						@endif
						@endforeach
						{{ $reviews->links() }}
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