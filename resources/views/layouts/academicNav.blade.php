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
            <a class="nav-link bg-danger text-white rounded-lg font-weight-bold" href={{ url('school') }}>
              <i class="fa fa-university"></i>
              <span class="nav-link-text"> الهيكل المدرسي </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ url('/academic_year') }}>
              <i class="fa fa-calendar-alt text-info"></i>
              <span class="nav-link-text">السنة الدراسية</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ url('/school_info') }}>
              <i class="fa fa-chalkboard-teacher text-primary"></i>
              <span class="nav-link-text"> بيانات المدرسة </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='#' >
              <i class="fa fa-list text-danger"></i>
              <span class="nav-link-text">الفصول الدراسية</span>
            </a>
          </li>

          {{-- =========================DROP DOWN MENU========================= --}}

          <span class="mr-5" style="border-right:2px solid #f3f3f3;">

              <li class="nav-item">
                <a class="nav-link" href={{ url('classes') }}>
                  <i class="fa fa-university text-dark"></i>
                  <span class="nav-link-text">بيانات الفصول</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href={{ url('/class/create') }}>
                  <i class="fa fa-plus text-success"></i>
                  <span class="nav-link-text">إضافة فصل</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href={{ url('/class_trashed') }}>
                  <i class="fa fa-trash-alt text-danger"></i>
                  <span class="nav-link-text">سلة المهملات</span>
                </a>
              </li>


            </span>

          {{-- ========================DROP DOWN MENU========================== --}}
         
          <li class="nav-item">
            <a class="nav-link" href={{route('school.calender')}}>
              <i class="fa fa-calendar-alt text-dark"></i>
              <span class="nav-link-text">التقويم الدراسي</span>
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