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
	</div>
</div>

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
				<a href="/vehicle/detail/13">
						<img src="/img/slide2.png" alt="De allergekste AUDI!">
						<div class="carousel-caption">
							Nieuwe Suzuki GSX-R 1000 is vanaf nu te huur!
						</div>
					</a>
				</div>
				<div class="item">
					<a href="/vehicle/detail/17">
						<img src="/img/slide1.png" alt="De allergekste AUDI!">
						<div class="carousel-caption">
							Reseveer nu de nieuwe Audi A6 2013! Voor maar €299,00 per dag! 
						</div>
					</a>
				</div>
				<div class="item">
				<a href="/vehicle/detail/23">
					<img src="/img/slide3.png" alt="De allergekste AUDI!">
					<div class="carousel-caption">
						Bedrijfswagens nodig? LeenMeij heeft een uitgebreid aanbod van bedrijfswagens.
					</div>
				</a>
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
			<div class="panel-heading">{{ Lang::get('index.latestNewsHeader'); }}</div>
			<div class="panel-body">
				@if (Session::get('leenmeij.locale') == 'nl')
				{{ General::latestnews(); }}
				@else
				{{ General::latestnewsenglish(); }}
				@endif
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">{{ Lang::get('index.whyLeenMeijHeader'); }}</div>
			<div class="panel-body">
				<div class="col-lg-8" style="padding: 0px;">
				{{ Lang::get('index.whyLeenMeijContent1'); }}
				 <br><br>
				{{ Lang::get('index.whyLeenMeijContent2'); }}
				</div>
				<div class="col-lg-4">
					<ul class="bulletless">
						<li><span style="color: green;">✔</span> {{ Lang::get('index.whyLeenMeijCheck1'); }}</li>
						<li><span style="color: green;">✔</span> {{ Lang::get('index.whyLeenMeijCheck2'); }}</li>
						<li><span style="color: green;">✔</span> {{ Lang::get('index.whyLeenMeijCheck3'); }}</li>
						<li><span style="color: green;">✔</span> {{ Lang::get('index.whyLeenMeijCheck4'); }}</li>
						<li><span style="color: green;">✔</span> {{ Lang::get('index.whyLeenMeijCheck5'); }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 visible-lg">
		<a class="twitter-timeline" href="https://twitter.com/twitterapi" data-widget-id="407876171682959360">Tweets door LeenMeij</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>

<div class="row visible-lg">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel2.png" /></div>
			<div class="panel-body">
				{{ Lang::get('index.bottomInfo1'); }}
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel3.png" /></div>
			<div class="panel-body">
				{{ Lang::get('index.bottomInfo2'); }}
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding: 0px;"><img src="/img/panel1.png" /></div>
			<div class="panel-body">
				{{ Lang::get('index.bottomInfo3'); }}
			</div>
		</div>
	</div>
</div>


@stop