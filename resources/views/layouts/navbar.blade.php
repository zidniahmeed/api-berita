<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @guest
        <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link" >
            {{__('login')}}
          </a>  
        </li>
      @else
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="dropdown">
          {{Auth::user()->name}} <i class="nav-icon fa fa-sign-out-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3> {{Auth::user()->name}}  </h3>
              </div>
            </div>
          </div>
          
          <div class="dropdown-divider"></div>
          
          <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" > Logout </a>
          
          <form action="{{route('logout')}}" method="post" id="logout-form" style="display: none">
            @csrf
          </form>

        </div>

      </li>
      @endguest
    </ul>
  </nav>