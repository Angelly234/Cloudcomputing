<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

{{-- company name --}}
<a href="/" class="logo d-flex align-items-center">
  <h1>Share2YorGate</h1>
</a>

{{-- nav bar for home, log in and Join for free --}}
<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
@guest
<nav id="navbar" class="navbar">
<ul>
  <li><a href="/index">Home</a></li>
  <li><a href="/login-option">Log in</a></li>
  <li><a href="/signup-option">Join for free</a></li>
</ul>
</nav><!-- .navbar -->
@endguest
</div>
