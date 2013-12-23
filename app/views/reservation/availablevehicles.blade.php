<div class="row">
<?php $count = 0; ?>
@foreach ($vehicles as $vehicle)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="/uploaded/vehicles/{{ $vehicle->image }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
			<div class="caption">
				<h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
				<p>{{ $vehicle->comment }}</p>
				<p>
					<a href="/reservation/make/{{$vehicle->id}}" class="btn btn-success" role="button">Reserveren</a> 
					<a href="/vehicle/detail/{{$vehicle->id}}" class="btn btn-primary pull-right" role="button">Bekijken</a> 
				</p>
			</div>
		</div>
	</div>
	<?php $count++; ?>
	@if ($count == 3)
		</div>
		<div class='row'>
	<?php $count = 0; ?>
	@endif
	@endforeach
</div>