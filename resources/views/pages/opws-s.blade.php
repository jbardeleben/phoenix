@extends('templates.pages')


@section('pagetitle', ' - OPWS-S')

@section('bannertitle')
			Phoenix Revolution, Inc
@stop
@section('leader')
			<hr>
			"Ocean Pure Water System - Salt Water Series (S-Series)"
@stop

@section('content')
		<div class="row">
			<div class="col-md-8">
				<h1>OPWS S-SERIES</h1>
				<p>
					Ocean desalination removes salt and other dissolved solids from the water. The resulting water is purified ideal water quality, that is also free of dangerous bacteria and other micro-organisms.
				</p>
				<p>
					S-Series Ocean Pure Water Systems are used for ocean desalination and high contaminate water. Each Unit can produce between 10,000-100,000 gpd and can work with most industry standard power sources. Water is purified by 0.5-micron filtration shield, UV-C decontamination, sw-reverse osmosis.
				</p>

				<p class="helper-hr-4"></p>
				<p class="text-center">
					<img src="/images/opws_01.png" style="width: 720px;">
					<br>
					<small>
						<em>Each Unit can produce between 10,000-100,000 gpd and can work with most industry standard power sources.</em>
					</small>
				</p>
					
				<div class="col-md-12">
					<p class="helper-hr-2"></p>
				</div><!-- col-md-12 -->
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>S-Series Specifications</h3>
						</div><!-- panel-heading -->
						<div class="panel-body">
							<dt>Gpd</dt>
							<dd>10,000-100,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Concentration</dt>
							<dd>5,000-32,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Power source</dt>
							<dd>Electric, Gasoline, Natural Gas, Hydraulic, and</dd>
							
							<p class="helper-br-2"></p>
							<dt>Honeycombs</dt>
							<dd>5</dd>
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
							<dd>10,000 (Rural) / 100,000 (Urban)</dd>
							
							<p class="helper-br-2"></p>
							<dt>Concentration</dt>
							<dd>32,000</dd>
							
							<p class="helper-br-2"></p>
							<dt>Power source</dt>
							<dd>Hydraulic or Solar</dd>
							
							<p class="helper-br-2"></p>
							<dt>Honeycombs</dt>
							<dd>5</dd>
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