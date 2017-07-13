@include('templates.partials._functions')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<!-- style sheets local -->
  {!! Html::style('css/admin-styles.css') !!}
  {!! Html::style('css/admin-flexmenu.css') !!}
  {!! Html::style('css/admin-leftnav.css') !!}
  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('css/select2-custom.css') !!}
  {!! Html::style('css/bs-custom/css/bootstrap.min.css') !!}

<?php
/*
 * NOTICE: DO NOT RENDER THIS COMMENT SECTION INSIDE THE HTML! Internal use only
 * -----------------------------------------------------------------------------
 * as this is not on a server, the protocol is required to work. Also note that
 * the new TinyMCE cloud service should always throw the newest version, which
 * is 4.5.7 (04-25-2017), so use that. If there are complications, revert back
 * to the originial version 4, but that CDN link may be discontinued anytime, so
 * just use this with caution for the time being. Probably wouldn't hurt to get
 * the source code and serve it locally and not on the CDN in production. Also a
 * reminder that the editor is only available to the admin section and not the
 * general users or open sections of the application. 
 * UPDATE: Localhost domain is not accepted by the API key. Ignore the message
 * for now and we can register new domains that will need this functionality. 
 */
?>
  <!--<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>-->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=v66ns1mucahvx57bs2ap8msmmshnblflb96ons7ogiic00qe"></script>
@yield('editor')
</head>

<body>
  <!-- ======== BEGIN MAIN PAGE CONTENT ======== -->
  <div class="wrapper">
    <header class="header"><h1 class="header-h1">Admin Dashboard</h1></header>
		<nav role="navigation" id="nav">
			<input class="trigger" type="checkbox" id="mainNavButton">
			<label for="mainNavButton" onclick>{{ Auth::user()->name }}</label>
			<ul>
				<li><a href="/">Main Site</a></li>
			</ul>
		</nav>
    
    <!-- BEGIN template section(s) -->
@include('templates.partials._messages')
@yield('content')

    <aside class="aside aside-1">
      <nav role="navigation" id="left-nav">
        <ul>
          <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
          <li><a href="{{ route('admin.create') }}">New Article</a></li>
          <!-- add a route admin.articles for this link. In fact, create an admin.* for each link here! -->
          <li><a href="{{ route('admin.all') }}">My Articles</a></li>
          <li><a href="{{ route('admin.all') }}">My Drafts (*)</a></li>
          <li><a href="{{ route('categories.index') }}">Categories</a></li>
          <li><a href="{{ route('tags.index') }}">Tags</a></li>
          <li><a href="{{ route('tasks.index') }}">Tasks</a></li>
          <li><a href="{{ route('users.index') }}">Users</a></li>
          @yield('extralinks')
        </ul>
      </nav>
    </aside>
    <aside class="aside aside-2">
      <h2>Page Notice</h2>
      <p>
        Note: If you navigate from this page, you will be leaving this page completely, meaning any unsaved work <em>will be lost</em>.
      </p>
      <hr>
      <h2>Notice about <em>slugs</em></h2>
      <p>
        When working with slugs, our suggestion is to remove any punctuation characters and replace any spaces with a dash. If the title has a space-dash-space in it - for example:
      </p>
      <p><code>asdf - asdf</code></p>
      <p>just use a single dash:</p>
      <p><code>asdf-asdf</code></p>
      <p>This will help keep the slugs as unique as possible as no two posts can share a URL slug.</p>
    </aside>
    
    <!-- END template section(s) -->
  </div><!-- wrapper -->
    
  <footer class="page-footer">
    <p class="footer-grad-30"></p>
    <div class="page-footer-logo"><a href="/"><img src="{{ Request::is('/admin') ? '' : '../' }}images/phoenix-logo-lg.png" alt="Phoenix Logo"></a></div>
    <p class="footer-p">
      &copy; 2016 <a href="/">Phoenix Revolution, Inc.</a>&nbsp;&nbsp;|&nbsp;&nbsp;Powered by 
      <a href="https://www.laravel.com/" title="Laravel - The PHP Framework For Web Artisans">Laravel</a>
      &nbsp;&nbsp;|&nbsp;&nbsp;
      @if (Auth::check())
      <a href="{{ route('logout') }}">Logout</a>
      @else
      <a href="{{ route('login') }}">Login</a>
      &nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="{{ route('register') }}">Sign Up</a>
      @endif
    </p>
  </footer>

  <!-- ======== END MAIN PAGE CONTENT ======== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
  $(".select2-multi").select2();
  </script>

</body>
</html>
