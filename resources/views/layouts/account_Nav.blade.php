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
            <a class="nav-link bg-danger text-white rounded-lg font-weight-bold" href={{ url('accounting') }}>
              <i class="fa fa-money-bill-wave"></i>
              <span class="nav-link-text"> الإدارة المالية </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ url('fees_types') }}>
              <i class="fas fa-file-invoice-dollar text-yellow"></i>
              <span class="nav-link-text">بيانات الأقساط</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href={{ url('fees_panel') }}>
              <i class="fas fa-hand-holding-usd text-primary"></i>
              <span class="nav-link-text">نافذة سداد الاقساط</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href={{ url('#') }}>
              <i class="fas fa-bus text-primary"></i>
              <span class="nav-link-text">  رسوم التراحيل </span>
            </a>
          </li>

          

          <span class="mr-5" style="border-right:2px solid #f3f3f3;">
            <li class="nav-item">
              <a class="nav-link" href={{ url('bus_panel') }}>
              <i class="fas fa-hand-holding-usd text-primary"></i>
                <span class="nav-link-text">  إستلام رسوم  </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href={{ url('bus_report') }}>
                <i class="fa fa-file-alt  text-info"></i>
                <span class="nav-link-text"> تقارير </span>
              </a>
            </li>
          </span>


          <li class="nav-item">
            <a class="nav-link" href={{ url('expenses') }}>
              <i class="fas fa-money-bill-alt text-danger"></i>
              <span class="nav-link-text">المنصرفات</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-money-bill-alt text-green"></i>
              <span class="nav-link-text">المرتبات</span>
            </a>
          </li>



          <span class="mr-5" style="border-right:2px solid #f3f3f3;">
            <li class="nav-item">
              <a class="nav-link" href={{ url('teachers_salary') }}>
                <i class="fas fa-chalkboard-teacher text-muted"></i>
                <span class="nav-link-text"> مرتبات الاساتذة </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href={{ url('employee_salary') }}>
                <i class="fa fa-user-friends  text-info"></i>
                <span class="nav-link-text"> مرتبات الموظفين </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href={{ url('debt_report') }}>
                <i class="fa fa-hand-holding-usd  text-primary"></i>
                <span class="nav-link-text"> تقرير السلفيات </span>
              </a>
            </li>

          </span>


          <li>
            <hr>
          </li>

          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
              <i class="fa fa-file-alt text-primary"></i>
              <span class="nav-link-text text-dark">التقارير المالية</span>
            </a>
          </li>

          <span class="mr-5" style="border-right:2px solid #f3f3f3;">
            <li class="nav-item">
              <a class="nav-link" href={{ url('treasury') }}>
                <i class="fas fa-wallet text-muted"></i>
                <span class="nav-link-text"> واردات الخزينة </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href={{ url('inventory') }}>
                <i class="fa fa-funnel-dollar  text-info"></i>
                <span class="nav-link-text">جرد الخزينة</span>
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
                <i class="fas fa-money-bill-alt text-warrning"></i>
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