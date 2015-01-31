<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
        @if(Auth::check())
          <li>
            @if( Auth::user()->avatar )
              <img src="{{ asset(Auth::user()->avatar) }}" class="avatar" alt="">
            @else
              <img src="{{ asset('assets/avatar@2x.png') }}" class="avatar" alt="">
            @endif     
            <a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
          </li>
          <li><a href="{{ route('logout') }}">Sign Out</a></li> 
        @else
          <li><a href="{{ route('login') }}">Sign In</a></li> 
        @endif      
        </ul>
        @if(Route::currentRouteName() == 'home')
          <img src="{{ asset('assets/logobeta-blue@2x.png') }}" class="logo">
        @else
          <a href="{{ route('home') }}"><img src="{{ asset('assets/logobeta-blue@2x.png') }}" class="logo"></a>
        @endif
        <input type="text" class="form-control" placeholder="Enter Location">
        <a href="{{ route('search') }}" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Find Rooms</a>
        <a href="{{ route('users_search') }}" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Find Flatmates</a>            
      </div>
    </div>
  </div>
</nav>