@extends('templates.pages')


@section('pagetitle', ' - Home')

@section('bannertitle')
			Phoenix Revolution, Inc
@stop
@section('leader')
      <hr>
      "If we could ever competitively, at a cheap rate, get fresh water from salt water, that it would be in the long-range interests of humanity which would really dwarf any other scientific accomplishments."
      <br>
      -- <em>John F. Kennedy, 1962</em>
@stop
@section('bannerbutton')
      <br>
      <p>
        <a href="/blog/press-release-11-13-2015" class="bem-button button--state-success bem-btn-lg" role="button">
          November 13, 2015 Press Release &raquo;
        </a>
      </p>
      @if(Auth::check())
      <p>Welcome {{ Auth::user()->name }}!</p>
      @endif
@stop


@section('content')
  <div class="row">
    <!--<div class="col-md-8">-->
    <div class="col-md-9">
			
    <!-- Section 1 (left) -->
    <section class="phoenix-background">
      <!-- 
      Set a class of .h1-main-img - This should mock the h1 tag here 
      (3.0em/1.1lh on top of reset). This should set the image right
      before the h1 text. The one trick to try is to use a .*:before
      psuedo tag on h1 and set the 'content' to the image url, but I
      will definitely need to figure this out - this will have a far 
      better feel to it and will be much more readable for the users
      -->
      <h1 class="h1-main">Mission Statement</h1>
      <p class="helper-hr-4"></p>
      <div><img src="/images/globe_homepage.jpg" class="pull-left mission-img"></div>
      <div>
        <p class="copy">
          Phoenix Revolution’s mission is to overcome the most challenging problems that face our world today, through engineering economic and environmental solutions. Our company strives for the betterment of the worldwide community through innovative products that increase the quality of the earth’s finite resources. To that end, our goal is to expand our ever-increasing range of products to benefit consumers and grow our place in the market, while producing dynamic solutions to problems, on a global scale.
          <br><br>
          <a href="/company" class="bem-button button--state-primary">Learn More &raquo;</a>
        </p>
      </div>
    </section>
				
    <p class="helper-hr-4"></p>
    <p class="helper-br-4"></p>

    <!-- Section 2 (left) -->
    <section class="phoenix-background">
      <h1 class="h1-main">Ocean Pure Water System</h1>
      <p class="helper-hr-4"></p>
      <p class="copy"><strong>Why we care about water, climate change, and a sustainable Earth</strong></p>
      <p class="copy">
        We at Phoenix Revolution propose an innovative solution. We propose that business goals should support and coincide with community aims. Our goal is to provide simple solutions to chronic problems; to provide clean water in the wake of shortages, improve the quality of the air we breathe, along with reaching out to communities to answer the age-old question, “What can we do to help?” We plan to catalyze the environmental movement and bring new innovative products to market that focus on helping to improve life worldwide. We want the future to be filled with global opportunities, the way we always dreamed it would be. Today, the problems we must face are daunting, but together we can shape a future where we are able to look back and say we left the planet better than we found it.
        <br><br>
        <a href="/company" class="bem-button button--state-primary">Learn More &raquo;</a>&nbsp;&nbsp;
        <a href="/opws-f" class="bem-button button--state-primary">OPWS F-Series &raquo;</a>&nbsp;&nbsp;
        <a href="/opws-s" class="bem-button button--state-primary">OPWS S-Series &raquo;</a>
      </p>
    </section>
				
    <p class="helper-hr-4"></p>
    <p class="helper-br-4"></p>
			
    <!-- Section 3 (left) -->
    <section class="phoenix-background">
      <h1 class="h1-main">California is running out of water!</h1>
      <p class="helper-hr-4"></p>
      <p class="copy">Check out this video from calwater</p>
      <p><iframe width="638" height="359" src="https://www.youtube.com/embed/jJhRNWvEIis" frameborder="0" allowfullscreen></iframe></p>
      <p><a href="/company" class="bem-button button--state-primary">Learn More &raquo;</a></p>
    </section>
				
    <p class="helper-hr-4"></p>
    <p class="helper-br-4"></p>
				
    <!-- Section 4 (left) -->
    <section class="phoenix-background">
      <h1 class="h1-main">News &amp; Information</h1>
      <p class="helper-hr-4"></p>
      <p class="helper-br-3"></p>
					
      @foreach($posts as $post)
      <div class="post">
        <h3 class="h3-main">
          <a href="{{ route('blog.single', $post->slug) }}">{!! $post->title !!}</a>
          <br>
          <small>
            {!! date('F j, Y', strtotime($post->created_at)) !!}&nbsp;&nbsp;|&nbsp;&nbsp;
            {!! $post->category->name !!}
          </small>
        </h3>
        <br>
        <p class="copy">
          {{ str_limit(strip_tags($post->body, 250)) }}
          {{ strlen(strip_tags($post->body)) > 250 ? ' [...]' : '' }}
        </p>
        <a href="{{ route('blog.single', $post->slug) }}" class="bem-button button--state-primary">Read More &raquo;</a>
      </div><!-- post -->
      <p class="helper-br-3"></p><br>
      @endforeach
    </section>
	
    <!-- Section 5 (left) -->
  </div><!-- col-md-8 -->

  <!-- SIDEBAR CONTENT -->
  <!--<div class="col-md-3 col-md-offset-1 sidebar">-->
    <div class="col-md-3 sidebar">
@include('templates.sections.news-sidebar')
    </div><!-- col-md-3 -->
  </div><!-- row -->
@stop