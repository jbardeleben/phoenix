@extends('templates.pages')


@section('pagetitle', '- About Us')
@section('bannertitle', 'Who and What is Phoenix Revolution?')
@section('leader', '')


@section('content')
		<div class="row">
			<div class="col-md-7 col-md-offset-1">
				<section id="" class="">
					<h2>Mission Statement</h2>
					<p style="font-size: 1.3em">
						<a href="/" title="Phoenix Revolution"><strong>Phoenix Revolution</strong></a>’s mission is to overcome the most challenging problems that face our world today, through engineering economic and environmental solutions. Our company strives for the betterment of the worldwide community through innovative products that increase the quality of the earth’s finite resources. To that end, our goal is to expand our ever-increasing range of products to benefit consumers and grow our place in the market, while producing dynamic solutions to problems, on a global scale.
					</p>
					<p>
						We at Phoenix Revolution plan to accomplish amazing things with this goal in mind. We plan to positively contribute to our communities domestically and around the world. For our first product, we chose to focus on the global water crisis as this will be a defining crisis of our generation for the future prosperity of humanity
					</p>

					<p class="helper-hr-4"></p>

					<h3>Ocean Desalination</h3>
					<p>
						Ocean desalination allows the OPWS to remove salt and other dissolved solids from the sea water. Using our system anyone around the world can take ocean water and produce fresh water just by flipping a switch.
					</p>
					
					<p class="helper-br-3"></p>
					<h3>Water Decontamination</h3>
					<p>
						The OPWS can also clean polluted rivers and lakes making the water drinkable for everyone. The system can also provide industries with highly purified water to be used in almost any application.
					</p>
					
					<p class="helper-br-3"></p>
					<h3>Environmental Cleanup</h3>
					<p>
						The OPWS can remove pesticides from the water as well as the soil. These compounds cause large algae blooms that cause environmental damage and produce a green slug on the surface of the water.
					</p>
				</section>
			</div><!-- col-md-7 col-md-offset-1 -->
			
			<!-- SIDEBAR CONTENT (maybe use <aside> instead of <div>. Set in snippets) -->
			<div class="col-md-3 col-md-offset-1 well sidebar">
				@if (Auth::check())
					<!-- Nothing needs to be here... -->
				@else
					<section style="margin-top: 10px; 
					                margin-bottom: 20px; 
									border-bottom: 3px solid #CCCCCC;
									height: 50px;">
						<div class="col-xs-6">
							<a href="{{ route('login') }}" class="btn btn-primary btn-block">
								Login &raquo;</a>
						</div><!-- col-xs-6 -->
						<div class="col-xs-6">
							<a href="{{ route('register') }}" class="btn btn-success btn-block">
								Sign Up Now!</a>
						</div><!-- col-xs-6 -->
					</section>
				@endif
				
				@include('templates.partials._address')
			</div><!-- col-md-3 col-md-offset-1 -->
		</div><!-- row -->
@stop