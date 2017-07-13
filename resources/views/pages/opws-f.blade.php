@extends('templates.pages')


@section('pagetitle', ' - OPWS-F')

@section('bannertitle')
			Phoenix Revolution, Inc
@stop
@section('leader')
			<hr>
			"Ocean Pure Water System - Fresh Water Series (F-Series)"
@stop

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>OPWS F-SERIES</h1>
				<p>
					F-Series Ocean Pure Water Systems are used for ocean desalination and high contaminate water. Each Unit can produce between 5,000-50,000 gpd and can work with most industry standard power sources.  Water is purified by 0.5-micron filtration shield,  UV-C decontamination, bw-reverse osmosis.
				</p>

				<p class="helper-br-4"></p>
				<p>
					<iframe width="720" height="352" src="https://www.youtube.com/embed/9Uol37aycXg" frameborder="0" allowfullscreen></iframe>
				</p>

				<p class="helper-br-4"></p>
				<p>
					Water decontamination cleans fresh water sources that are contaminated from various sources. The OPWS unit produces distilled quality water with 99% of microorganisms removed.
				</p>
				<p>
					In applications where the OPWS is doing environmental cleaning, the distilled water acts like a sponge adsorbing all of the compounds it can. Contaminates in the soil transfer to the water via osmosis, and the water is cleaned once again.
				</p>

				<p class="helper-br-4"></p>
				<p>
					<img src="/images/opwsf_01.png" style="width: 720px;">
				</p>

				<p class="helper-hr-4"></p>
				<p class="text-center">
					<img src="/images/opws_01.png" style="height: 300px;">
					<br>
					<small>
						<em>Each Unit can produce between 5,000-50,000 gpd and can work with most industry standard power sources.</em>
					</small>
				</p>
					
				<div class="col-md-12">
					<p class="helper-hr-2"></p>
				</div><!-- col-md-12 -->
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>F-Series Specifications</h3>
						</div><!-- panel-heading -->
						<div class="panel-body">
							<dt>Gpd</dt>
							<dd>5,000-50,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Concentration</dt>
							<dd>1,000-5,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Power source</dt>
							<dd>Electric, Gasoline, Natural Gas, Hydraulic, and</dd>
							
							<p class="helper-br-2"></p>
							<dt>Honeycombs</dt>
							<dd>1</dd>
						</div><!-- panel-body -->
					</div><!-- panel panel-default -->
				</div><!-- col-md-6 -->
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Recommendations</h3>
						</div><!-- panel-heading -->
						<div class="panel-body">
							<dt>Gpd</dt>
							<dd>5,000 (Rural) / 50,000 (Urban)</dd>
							
							<p class="helper-br-2"></p>
							<dt>Concentration</dt>
							<dd>2,000-5,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Power source</dt>
							<dd>Hydraulic or Solar</dd>
							
							<p class="helper-br-2"></p>
							<dt>Honeycombs</dt>
							<dd>1</dd>
						</div><!-- panel-body -->
					</div><!-- panel panel-default -->
				</div><!-- col-md-6 -->
				
				<div class="col-md-12">
					<p class="helper-br-4"></p>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Possible Projects</h3>
						</div><!-- panel-heading -->
						<div class="panel-body">
							<dt>Change How We Use the Ocean</dt>
							<dd>
								Change ocean water to drinking water, industrial feed-stock, non-potable water.
							</dd>
						</div><!-- panel-body -->
					</div><!-- panel panel-default -->
				</div><!-- col-md-12 -->

			</div><!-- col-md-8 -->

			<!-- SIDEBAR CONTENT -->
			<p class="helper-br-3"></p>
			<div class="col-md-3 col-md-offset-1 well sidebar">
					@include('templates.partials._news-sidebar')
			</div><!-- col-md-3 -->
		</div><!-- row -->
@stop