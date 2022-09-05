<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-right  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src={{ asset("public/assets/img/brand/blue.png") }} class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href={{ url('accounting') }}>
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">الصفحة الرئيسية</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">
              <i class="fa fa-list text-primary"></i>
              <span class="nav-link-text text-dark"> بيانات الإمتحانات </span>
            </a>
          </li>

          <span class="mr-5" style="border-right:2px solid #f3f3f3;">
            <li class="nav-item">
              <a class="nav-link" href={{ url('exams') }}>
                <i class="fas fa-file-signature text-info"></i>
                <span class="nav-link-text">قائمة الإمتحانات</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('/exam/create') }}>
                <i class="fas fa-plus-circle text-primary"></i>
                <span class="nav-link-text">إضافة امتحان</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{ url('/class/trashed') }}>
                <i class="fas fa-trash text-danger"></i>
                <span class="nav-link-text">سلة المهملات</span>
              </a>
            </li>
          </span>

          <li class="nav-item">
            <a class="nav-link" href={{ url('exam/grades') }}>
              <i class="fa fa-file-alt text-primary"></i>
              <span class="nav-link-text text-dark">إضافة نتيجة</span>
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