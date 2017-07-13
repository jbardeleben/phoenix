@include('templates.partials._functions')
<!DOCTYPE html>
<html lang="en">
<head>
@include('templates.partials._head')
</head>

<body>
@include('templates.partials._nav')
  <!-- ======== BEGIN MAIN PAGE CONTENT ======== -->
  
  <!-- main page [parent] container -->
  <div class="container">
    <div class="row">
      <section id="" class="col-md-12">
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