<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-right  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="home">
        <img src={{ asset("public/assets/img/brand/blue.png") }} class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link bg-danger text-white rounded-lg font-weight-bold" href={{ url('teachers') }}>
              <i class="ni ni-tv-2"></i>
              <span class="nav-link-text">وحدة الاساتذة</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ url('teacher/create') }}>
              <i class="fa fa-plus-circle text-yellow"></i>
              <span class="nav-link-text">إضافة مدرس</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href={{ url('teacher_report') }}>
              <i class="fa fa-file-alt text-primary"></i>
              <span class="nav-link-text">تقارير المدرسين</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href={{ url('teacherTrashed') }}>
              <i class="fa fa-trash-alt text-danger"></i>
              <span class="nav-link-text">سلة المهملات</span>
            </a>
          </li>
         
        </ul>
        <!-- Divider -->
       
      
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li>
            <hr>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.privilege.sd" target="_blank">
              <i class="ni ni-spaceship"></i>
              <span class="nav-link-text">Documentation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" aria-disabled="true">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Components</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>