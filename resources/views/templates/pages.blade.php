@include('templates.partials._functions')
<!DOCTYPE html>
<html lang="en">
<head>
@include('templates.partials._head')
</head>

<body class="grey">
@include('templates.partials._nav')
<!-- ======== BEGIN MAIN PAGE CONTENT ======== -->
	
<?php
/**
 * FOR THE JUMBOTRON BANNERS, I want to set it up to dynamically change based on
 * what page is being shown allowing multiple banner images to be utilized. As I
 * currently have it set up, it's only one image and is hard-coded into the CSS.
 *
 * ALSO NOTE WITH THIS TEMPLATE - as I am testing this service, I am finding out
 * that I will need to create a second template for form pages - specifically on
 * the password reset forms and the login/registration forms, The page banner is
 * not mobile web browser friendly as these pages are account control and do not
 * require page/company branding (users just want to get it done no questions).
 */
?>
	
	<!-- BEGIN PAGE BANNER SECTION -->
@if (Request::is('auth/login'))
@elseif(Request::is('auth/register'))
@elseif(Request::is('password/reset'))
@elseif(Request::is('/'))
@include('templates.partials._banner')
@elseif(Request::is('/home'))
@include('templates.partials._banner')
@else
@include('templates.partials._banner-sm')
@endif
  <!-- END PAGE BANNER SECTION -->
	
  <!-- main page [parent] container -->
  <div class="container">
    <div class="row">
      <section id="" class="col-md-12 tmpl-top-margin">
      <!-- BEGIN template section(s) -->

@include('templates.partials._messages')
@yield('content')
@yield('sidebar')

      <!-- END template section(s) -->
      </section><!-- parent section -->
    </div><!-- parent row -->
  </div><!-- parent container -->	
	
  <!-- BEGIN FOOTER SECTION -->
  <p class="helper-br-8"></p>
  <p class="helper-hr-0-b"></p>
  <div class="container footer">
@include('templates.partials._footer')
  </div><!-- footer container footer -->
  <!-- END FOOTER SECTION -->
	
  <!-- ======== END MAIN PAGE CONTENT ======== -->
@include('templates.partials._scripts')

</body>
</html>
