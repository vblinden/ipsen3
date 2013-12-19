<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="LeenMeij">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/favicon.png">

	<title>LeenMeij Voertuigverhuur Bedrijf</title>

	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">LeenMeij</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="/">Startpagina</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Voertuigen<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/vehicle/person">Personenauto</a></li>
								<li><a href="/vehicle/company">Bedrijfswagen</a></li>
								<li><a href="/vehicle/motor">Motor</a></li>
								<li><a href="/vehicle/scooter">Scooter</a></li>
							</ul>
						</li>
						<li><a href="/vehicleoption">Voertuigen opties</a></li>
						<li><a href="/home/faq">FAQ</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								@if(date("H") < "12") Goedemorgen,
								@elseif(date("H") < "18") Goedemiddag,
								@else Goedenavond,
								@endif
								{{ Auth::user()->firstname; }}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<!-- <li><a href="/user/account">Mijn account</a></li> -->
									@if(Role::find(Auth::user()->role['role_id'])['name'] == 'admin') 
									<li><a href='/admin/'>Administrator</a></li>
									<li class="divider"></li>
									@endif
									<li><a href="/user/logout">Uitloggen</a></li>
								</ul>
							</li>
							@else
							<li><a href="/user/login">Inloggen</a></li>
							<li><a href="/user/register">Registreren</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
				@yield('content')
			</div>
			<div class="push"></div>
		</div>

		<div id="footer" style="padding-top: 20px; margin-top: 20px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">LeenMeij</div>
							<div class="panel-body">
								<ul class="bulletless">
									<li><a href="#">Reseveer nu</a></li>
									<li><a href="#">Langer huren</a></li>
									<li><a href="#">Extra services</a></li>
									<li><a href="#">Vestigingen</a></li>
									<li><a href="#">Wagenpark</a></li>
									<li><a href="#">Over LeenMeij</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Diensten</div>
							<div class="panel-body">
								<ul class="bulletless">
									<li><a href="#">Personenauto</a></li>
									<li><a href="#">Bedrijfswagens</a></li>
									<li><a href="#">Motoren</a></li>
									<li><a href="#">Scooters</a></li>
									<li><a href="#">Accessoires</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">Contact</div>
							<div class="panel-body" style="padding: 0px;">
								<div id="footer-maps" style="height: 200px;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p class='text-muted'>Copyright &copy; <?php echo date("Y"); ?> Leenmeij Autoverhuur BV. Alle rechten voorbehouden. <span class='pull-right'>KVK: 987654321</span></p>
					</div>
				</div>
			</div>
		</div>

		<script src="/js/jquery.js"></script>
		<script src="/js/bootstrap.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="/js/gmaps.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				var map = new GMaps({
					div: '#footer-maps',
					lat: 52.16662,
					lng: 4.47184
				});

				var mapOptions = {
					draggable: false,
					scrollwheel: false,
					panControl: false,
					zoomControl: false,
					scaleControl: false,
					mapTypeControl: false,
					streetViewControl: false,
					overviewMapControl: false
				};

				map.setOptions(mapOptions);

				map.addMarker({
					lat: 52.16662,
					lng: 4.47184,
					infoWindow: {
						content: '<p>Zijlldijk 130<br/>2352 AB Leiderdorp<br/>071-7503299<br/>info@leenmeij.com</br></p>'
					}
				});
			});
		</script>

		@yield('scripts')
	</body>
	</html>
