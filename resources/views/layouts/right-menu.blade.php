<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-right  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand">
        <img src={{ asset("public/assets/img/brand/blue.png") }} class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link bg-danger text-white rounded-lg font-weight-bold" href="#">
              <i class="fa fa-list"></i>
              <span class="nav-link-text">الروابط السريعة</span>
            </a>
          </li>
          <span class="mr-3 mt-2" style="border-right:2px solid #f3f3f3;">

            <li class="nav-item">
              <a class="nav-link" href={{ url('/academic_year') }}>
                <i class="fa fa-chalkboard-teacher text-yellow"></i>
                <span class="nav-link-text">السنة الدراسية</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('classes') }}>
                <i class="fa fa-university text-dark"></i>
                <span class="nav-link-text">بيانات الفصول</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{route('school.calender')}}  onclick="show_menu1()" id='show1'>
                <i class="fa fa-calendar-alt text-muted"></i>
                <span class="nav-link-text">التقويم الدراسي</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href={{ url('exams') }}>
                <i class="fas fa-file-signature text-info"></i>
                <span class="nav-link-text">قائمة الإمتحانات</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href={{ url('fees_panel') }}>
                <i class="fas fa-hand-holding-usd text-primary"></i>
                <span class="nav-link-text">نافذة سداد الاقساط</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('expenses') }}>
                <i class="fas fa-money-bill-alt text-danger"></i>
                <span class="nav-link-text">المنصرفات</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('fees_report') }}>
                <i class="fas fa-file-invoice-dollar text-primary"></i>
                <span class="nav-link-text">تقرير الاقساط</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href={{ url('expenses_report') }}>
                <i class="fas fa-money-bill-alt text-info"></i>
                <span class="nav-link-text">تقرير المنصرفات</span>
              </a>
            </li>
          </span>
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