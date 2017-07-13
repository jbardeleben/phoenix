@extends('templates.pages')

<?php
/*
 * THIS SECTION IS FOR AUTHENTICATED USERS (www.wavlite.com/welcome). The service
 * URL once a user is logged in will be just www.wavlite.com. If a user is logged
 * out or does not have an account, the service will automatically forward to the
 * welcome page - www.wavlite.com/welcome so they can sign-in or sign-up
 */
?>

@section('pagetitle', ' - Welcome to Wavlite')
@section('bannertitle', 'Welcome to Wavlite!')
@section('bannerbutton')
      <p><a href="/" class="btn btn-success btn-lg" role="button">SEARCH WAVLITE NOW! &nbsp;&nbsp;<b>&raquo;</b></a></p>
@stop

@section('content')
    <div class="row">
      <div class="col-md-8">
        <!-- Section 1 (left) -->
        <section>
          <h1 class="h1-main">Welcome {{ Auth::user()->name }}!</h1>
          <p>
            This would be a good place to let people know about changing account settings and shit like that. OR - just remove this paragraph.
          </p>
        </section>
        <p class="helper-hr-4"></p>
        <!-- Section 2 (left) -->
        <section>
          <h1 class="h1-main">Wavlite's Rich Media Search: Overview</h1>
          <p>
            This section will be a brief overview of what the Wavlite Rich Media Search Service is and a brief section of what <i>IT'S</i> all about (NOT as an "about us" section! There is a whole page dedicated to that already!). For example - You can search shit and save it, play while searching, etc etc.
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
          </p>
        </section>
        <p class="helper-hr-4"></p>
        <!-- Section 3 (left) -->
        <section>
          <h1 class="h1-main">Wavlite Concerts &amp; Events</h1>
          <p>
            This section will be set up just like the news articles below. The way this will work is any event that is in the database that is ahead of the current date will be shown as a list, just like the News section. They will get the summary of the event with a button that says "Full Details Here", which will take them to a generated page, just as the News section works.
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
          </p>
        </section>
        <p class="helper-hr-4"></p>
        <!-- Section 4 (left) -->
        <section>
          <h1 class="h1-main">Company News &amp; Articles</h1>
          <h4><a href="{{ route('blog.index') }}">(View All Articles)</a></h4>
          <p class="helper-br-3"></p>
          
          @foreach($posts as $post)
          <div class="post">
            <h3 class="h3-main">
              <a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a> | 
              <small>{{ date('F j, Y', strtotime($post->created_at)) }}</small>
            </h3>
            <p></p>
            <p>
              {{ substr($post->body, 0, 200) }}
              {{ strlen($post->body) > 200 ? ' [...]' : '' }}
            </p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More &raquo;</a>
          </div><!-- post -->
          <p class="helper-hr-4"></p><!-- post spacer -->
          @endforeach
        </section>
        <!-- Section 5 (left) -->
        </div><!-- col-md-8 (parent column) -->
        
        <!-- SIDEBAR CONTENT -->
        <p class="helper-br-3"></p>
        <div class="col-md-3 col-md-offset-1 well">
          <section style="margin-top: -20px;">
          <h1 class="h1-side">Sidebar</h1>
          <p class="helper-hr-2"></p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
          </p>
          <a href="/" class="btn btn-default">Lorem Ipsum &raquo;</a>
          
          <p class="helper-hr-2"></p>
          <h1 class="h1-side">Sidebar</h1>
          <p class="helper-hr-2"></p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
          </p>
          <a href="/" class="btn btn-default">Lorem Ipsum &raquo;</a>
          <p class="helper-hr-2"></p>
          <address>
            <h3><strong>Wavlite, Inc.</strong></h3>
            <h4>Financial District Address</h4>
            <h4>Boston, Ma, 02001</h4>
            <hr>
            <h4>(617) WAVLITE (928-5483)</h4>
            <h4><a href="mailto:info@wavlite.com">info@wavlite.com</a></h4>
            <h4><a href="http://www.twitter.com/wavlite">Twitter (@Wavlite)</a></h4>
            <h4><a href="http://www.facebook.com/wavlite">Facebook (/wavlite)</a></h4>
            <hr>
            <h4><a href="http://www.wavlite.com">www.wavlite.com</a></h4>
          </address>
        </section><!-- Sidebar Section -->
      </div><!-- col-md-3 col-md-offset-1 well -->
    </div><!-- row (parent row) -->
@stop