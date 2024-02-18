<nav class="navbar navbar-expand-lg navbar-light bg-light">
  @if (Auth::guard('web')->user())
  <div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::guard('web')->user()->name }}
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ route('user.home') }}" style="color: black">Dashboard</a>
      <a class="dropdown-item" href="{{ route('user.logout') }}" style="color: black" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
    </div>
  </div>
  @elseif (Auth::guard('scholar')->user())
  <div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ Auth::guard('scholar')->user()->name }}
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ route('scholar.home') }}" style="color: black">Dashboard</a>
      <a class="dropdown-item" href="{{ route('scholar.logout') }}" style="color: black" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
      <form action="{{ route('scholar.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
    </div>
  </div>
  @endif
</nav>
