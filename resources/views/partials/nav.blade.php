<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">{{ Setting::get('name') }}</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        @if (Setting::get('registrations') == "true")
          <li><a href="{{ route('register.index') }}">Register</a></li>
        @endif
        <li><a href="{{ route('faqs') }}">FAQs</a></li>
        <li><a href="{{ route('contact') }}">Contact information</a></li>
        <li><a href="{{ route('sponsors') }}">Sponsors</a></li>
        @if (Auth::check())
          <li><a href="{{ route('admin.index') }}">Admin</a></li>
          <li><a href="{{ route('settings.index') }}">Settings</a></li>
          <li><a href="{{ route('auth.logout') }}">Logout</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
