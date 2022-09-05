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
            <a class="nav-link bg-danger text-white rounded-lg font-weight-bold" href={{ url('students') }}>
              <i class="fa fa-users"></i>
              <span class="nav-link-text"> شئؤن الطلاب </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ route('student/create') }}>
              <i class="fa fa-user-plus text-success"></i>
              <span class="nav-link-text">إضافة طالب</span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href={{ route('student_report') }}>
              <i class="fa fa-file-alt text-primary"></i>
              <span class="nav-link-text">تقارير الطلاب</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ route('studentTrashed') }}>
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