<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    @guest
    @if (Route::has('register'))
    <li></li>
    @endif
    @else
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/home" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="/companies">{{ __('Companies') }}</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link" href="/employees">{{ __('Employees') }}</a>
    </li>

    @endguest
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
  @php $locale = session()->get('locale'); @endphp
    <!-- Language Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        Language
      </a>
      @switch($locale)
      @case('fr')
      <i class="flag-icon flag-icon-fr mr-2"></i> French
      @break
      @case('es')
      <i class="flag-icon flag-icon-es mr-2"></i> Spain
      @break
      @case('sw')
      <i class="flag-icon flag-icon-tz mr-2"></i> Tanzania
      @break
      @default
      <i class="flag-icon flag-icon-us mr-2"> English
      @endswitch
      <div class="dropdown-menu dropdown-menu-right p-0">
        <a href="lang/en" class="dropdown-item active">
          <i class="flag-icon flag-icon-us mr-2"></i> English
        </a>
        <a href="lang/sw" class="dropdown-item">
          <i class="flag-icon flag-icon-tz mr-2"></i> Swahili
        </a>
        <a href="lang/fr" class="dropdown-item">
          <i class="flag-icon flag-icon-fr mr-2"></i> French
        </a>
        <a href="lang/es" class="dropdown-item">
          <i class="flag-icon flag-icon-es mr-2"></i> Spanish
        </a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>

  </ul>
</nav>
<!-- /.navbar -->