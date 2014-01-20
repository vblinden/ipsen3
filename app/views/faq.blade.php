@extends('layout')

@section('content')
<div class='row'>
	<div class='col-lg-12'>
		<div class="page-header">
			<h1>{{ Lang::get('faq.faqTitle') }} <small>{{ Lang::get('faq.faqSubtitle') }}</small></h1>
		</div>
		<p>{{ Lang::get('faq.faqInfo') }}</p>
	</div>
</div>

<div class='row' style="margin-bottom: 20px;">
	<div class='col-lg-12'>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							{{ Lang::get('faq.whyLeenMeijTitle') }}
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						{{ Lang::get('faq.whyLeenMeij1') }}
						<br><br>
						{{ Lang::get('faq.whyLeenMeij2') }}
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							{{ Lang::get('faq.paymentMethodTitle') }}
						</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
						<p>{{ Lang::get('faq.paymentMethod1') }}</p> <br>

						<strong>{{ Lang::get('faq.paymentiDealTitle') }}</strong>
						<p>{{ Lang::get('faq.paymentiDealContent') }}</p>
						<strong>{{ Lang::get('faq.paymentPayPalTitle') }}</strong>
						<p>{{ Lang::get('faq.paymentPayPalContent') }}</p>
						<strong>{{ Lang::get('faq.paymentAdvancePaymentTitle') }}</strong>
						<p>{{ Lang::get('faq.paymentAdvancePaymentContent') }}</p>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							{{ Lang::get('faq.whatHappensDamageTitle') }}
						</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
						{{ Lang::get('faq.whatHappensDamageContent1') }}
						<br>
						{{ Lang::get('faq.whatHappensDamageContent2') }}
						<br>

						{{ Lang::get('faq.whatHappensDamageList1') }}<br>
						{{ Lang::get('faq.whatHappensDamageList2') }}<br>
						{{ Lang::get('faq.whatHappensDamageList3') }}<br>
						{{ Lang::get('faq.whatHappensDamageList4') }}<br>
						{{ Lang::get('faq.whatHappensDamageList5') }}<br>
						{{ Lang::get('faq.whatHappensDamageList6') }}<br>
						{{ Lang::get('faq.whatHappensDamageList7') }}
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
							{{ Lang::get('faq.qualityVehicleParkTitle') }}
						</a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse">
					<div class="panel-body">
						{{ Lang::get('faq.qualityVehicleParkContent1') }}
						<br> 
						{{ Lang::get('faq.qualityVehicleParkContent2') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop