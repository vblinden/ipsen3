@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>{{ Lang::get('contact.contactTitle') }} <small>{{ Lang::get('contact.contactSubtitle') }}</small></h1>
		</div>
		<p>{{ Lang::get('contact.contactInfo') }}</p>
	</div>
</div>

<div class='row' style="margin-bottom: 20px;">
	<div class='col-lg-12'>
		Zijldijk 130<br/>
		2352 AB Leiderdorp<br/>
		071-7503299<br/>
		info@leenmeij.com<br/>
	</div>
</div>
@stop