@extends('templates.pages')

<?php
/*
 * THIS SECTION IS FOR NON-AUTHENTICATED USERS (www.wavlite.com/welcome). This will
 * be the home page for both authenticated and non-authenticated users. All pages
 * will be available to non-autheticated users, such as the legal pages, the about
 * and contact pages, so they can learn more about us.
 */
?>

@section('pagetitle', ' - Welcome to Wavlite')
@section('leader', 'Find all your audio and video content in one place!')
@section('bannerbutton')
  <p><a href="/blog" class="btn btn-primary btn-lg" role="button">Company News &amp; Articles &raquo;</a></p>
@stop


@section('content')
    <div class="row">
      <div class="col-md-8">
        <!-- Section 1 (left) -->
        <section>
          <h1 class="h1-main">Join Wavlite Today!</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
          </p>
        </section><!-- /section 1 (left) -->
        
        <p class="helper-hr-4"></p>
        <!-- Section 2 (left) -->
        <!-- Section 3 (left) -->
        <!-- Section 4 (left) -->
        <section>
          <h1 class="h1-main">Company News &amp; Articles</h1>
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
          <p class="helper-hr-4"></p><!-- .post spacer after each loop for posts -->
          @endforeach
        </section><!-- /section 4 (left) -->
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
        </section>
      </div><!-- col-md-3 (sidebar parent column) -->
    </div><!-- row (parent row) -->
@stop