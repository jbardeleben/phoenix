
    <div class="row">
      <p class="footer-grad-30"></p>
      <p class="helper-br-4"></p>
      <footer class="col-md-12">
        <!-- page specific footer stuff -->
@yield('pagefooter')
        <div class="row">
		  <!-- COLUMN 1 SECTION -->
          <section id="section-1" class="col-md-4"></section><!-- section-1 -->
		  <!-- COLUMN 2 SECTION -->
          <section id="section-2" class="col-md-4">
            <div class="page-footer-logo">
              <a href="/"><img src="/images/phoenix-logo-lg.png" alt="Phoenix Logo"></a>
			</div>
          </section><!-- section-2 -->
		  <!-- COLUMN 3 SECTION -->
          <section id="section-3" class="col-md-4"></section><!-- section-3 -->
        </div><!-- row (TOP ROW) -->

        <div class="row">
          <div class="col-md-12">
            <p class="helper-br-5"></p>
            <p class="text-center">
              <!--
              <a href="/copyright">Copyright</a> | 
              <a href="/privacy">Privacy</a> | 
              <a href="/terms">Terms &amp; Conditions</a> | 
              -->
              &copy; 2016 <a href="/">Phoenix Revolution, Inc.</a> 
              &nbsp;|&nbsp; Powered by  
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
            <p class="helper-br-5"></p>
          </div><!-- col-md-12 -->
        </div><!-- row (BOTTOM ROW) -->
      </footer><!-- col-md-12 -->
    </div><!-- row (parent row) -->