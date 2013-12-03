@extends('layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="/img/slide2.png" alt="De allergekste AUDI!">
					<div class="carousel-caption">
						Nieuwe Suzuki GSX-R 1000 is vanaf nu te huur!
					</div>
				</div>
				<div class="item">
					<img src="/img/slide1.png" alt="De allergekste AUDI!">
					<div class="carousel-caption">
						Reseveer nu de nieuwe Audi A6 2013! Voor maar €299,00 per dag! 
					</div>
				</div>
				<div class="item">
					<img src="/img/slide3.png" alt="De allergekste AUDI!">
					<div class="carousel-caption">
						Bedrijfswagens nodig? LeenMeij heeft een uitgebreid aanbod van bedrijfswagens.
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>
</div>


<!-- style="background-color: #4f83c4;" -->
<div class="row" style="margin-top: 20px;">
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-heading">Laatste nieuws</div>
			<div class="panel-body">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Waarom LeenMeij</div>
			<div class="panel-body">
				<div class="col-lg-8" style="padding: 0px;">
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
				<div class="col-lg-4">
					<ul class="bulletless">
						<li><span style="color: green;">✔</span> Kwaliteit</li>
						<li><span style="color: green;">✔</span> Actueel aanbod</li>
						<li><span style="color: green;">✔</span> Scherpe prijzen</li>
						<li><span style="color: green;">✔</span> Bovag 6 sterren kwalificatie</li>
						<li><span style="color: green;">✔</span> Gratis inleveren bij elke vestiging</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<a class="twitter-timeline" href="https://twitter.com/twitterapi" data-widget-id="407876171682959360">Tweets door LeenMeij</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel2.png" /></div>
			<div class="panel-body">
				Tijdens deze winter maanden is veiligheid op de weg de hoogste prioriteit. Huur daarom nu alle voertuigen voorzien van een set winterbanden.
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel3.png" /></div>
			<div class="panel-body">
				Wij bieden vanaf nu meer opties bij het verhuren van voertuigen onder andere: navigatiesystemen, portable dvd speler, dakdrager, skibox enzovoort.
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel1.png" /></div>
			<div class="panel-body">
				Als je twee maanden van te voren een voertuig reseveert bij LeenMeij ontvang je automatisch 5% korting op je resevering.
			</div>
		</div>
	</div>
</div>


@stop