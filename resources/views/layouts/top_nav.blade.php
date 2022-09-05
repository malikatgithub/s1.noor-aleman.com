<div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light border-bottom">
          {{-- <button class="btn" style="background:#171d3c !important!" id="menu-toggle"><i class="fas fa-bars"></i></button> --}}
  
          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0  font-weight-bold float-left">
              <li class="nav-item active">
                {{-- <a class="nav-link text-white" href={{ url('home') }}> <img src="{{ asset('public//upload/school_logo/default.png') }}" class="mb-2" width='30px' height='30px' alt=""> &nbsp; {{ $name }} <span class="sr-only">(current)</span></a> --}}
                <a class="nav-link text-white" href={{ url('home') }}>  مدارس جالنج العالمية  <span class="sr-only">(current)</span></a>
              </li>
            
              {{-- <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle float-left" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> --}}
            </ul>
          </div>

{{-- 
          <li class="nav-item dropdown ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li> --}}

          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle bg-primary border-0 text-white ml-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="caret"></span>
               <h5>
                {{ Auth::user()->name }}
              </h5>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">School Info <i class="fa fa-university"></i> </a>
              <a class="dropdown-item" href="#">Support <i class="fa fa-life-ring"></i> </a>

              <div class="dropdown-divider"></div>
              
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}  <i class="fa fa-sign-out-alt"></i>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

            </div>
          </div>

        </nav>

         <!-- /#sidebar-wrapper -->

        <div class="container-fluid">
            <br>
            @yield('content')
        </div>
        </div>
        <!-- /#page-content-wrapper -->