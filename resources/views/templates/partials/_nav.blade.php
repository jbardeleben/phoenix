
  <nav class="nav navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/home">
        <!-- org: 83x38. Trying new at height = 90px on homepage only
        <img src="/images/pri_banner_thin.png" -->
        @if (Request::is('/'))
        <img src="/images/phoenix-logo-home.png"class="header-logo" id="" alt="Wavlite Logo">
        @else
        <img src="/images/phoenix-logo.png"class="header-logo" id="" alt="Wavlite Logo">
        @endif
        </a>
      </div><!-- navbar-header -->
	  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/" class="">Home</a></li>
          <!--
          <li class="{{ Request::is('blog') ? 'active' : '' }}">
            <a href="/blog">Company</a>
          </li>
          -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" 
                        data-toggle="dropdown" role="button" 
                        aria-haspopup="true" aria-expanded="false">
              Company <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/company">Company Overview</a></li>
              <li><a href="/opws-f">OPWS F-Series</a></li>
              <li><a href="/opws-s">OPWS S-Series</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/blog">News &amp; Information</a></li>
              <!-- add a link for Media and Press -->
              <li><a href="/blog">Media &amp; Press Releases</a></li>
            </ul>
          </li>
          <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
          <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
          <li>&nbsp;&nbsp;&nbsp;</li>
          @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" 
                        data-toggle="dropdown" role="button" 
                        aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('posts.create') }}">Create New Article</a></li>
              <li><a href="{{ route('posts.index') }}">View My Articles</a></li>
              <li><a href="{{ route('categories.index') }}">View All Categories</a></li>
              <li><a href="{{ route('tags.index') }}">View All Current Tags</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('tasks.index') }}">View All Tasks (Admin)</a></li>
              <li><a href="{{ route('users.index') }}">View All Users (Admin)</a></li>
              <li><a href="/settings">Profile Settings</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('admin.index') }}">New Admin Page</a></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
          @else
          <li><a href="{{ route('login') }}"><b>Login</b></a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>