@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>Oeps! <small>er is iets misgegaan.</small></h1>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-8'>
		<p>
			De pagina die u zoekt bestaat niet, of is verplaatst of verwijderd. 
		</p>
	</div>
	<div class='col-lg-4'>
		<div class="panel panel-info">
			<div class="panel-heading">En nu?</div>
			<div class="panel-body">
				<p>U heeft verschillende opties.</p>

				<ul>
					<li><a href="javascript:history.go(-1)">Terug waar u vandaan kwam</a></li>
					<li><a href='/'>Terug keren naar de startpagina</a></li>
					<li><a href='mailto:info@leenmeij.com'>Contact opnemen met klantenservice</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop