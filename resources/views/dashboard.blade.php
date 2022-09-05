@extends('layouts.css_main')

@section('body')

@include('layouts.right-menu')

@include('layouts.top-menu')





    <!-- Header -->
    <div class="header pb-6" style="direction: rtl; background:#3d4571 !important">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4" >
            <div class="col-12">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#"> الصفحة الرئيسية </a></li>
                </ol>
              </nav>
            </div>
           
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <a href="{{route('students')}}">
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0 text-muted">01</span>
                        <h5 class="card-title text-uppercase  mb-0">وحدة الطلاب</h5>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                          <i class="fa fa-users"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <a href="teachers">
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0 text-muted">02</span>
                        <h5 class="card-title text-uppercase  mb-0">وحدة الأساتذة</h5>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="fa fa-chalkboard-teacher"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <a href="exams">
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0 text-muted">03</span>
                        <h5 class="card-title text-uppercase mb-0">الهيكل المدرسي</h5>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="fa fa-school"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <a href="accounting">
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0 text-muted">04</span>
                        <h5 class="card-title text-uppercase mb-0">الإدارة المالية</h5>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                          <i class="ni ni-chart-bar-32"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-12">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-muted text-left ls-1 mb-1">,, Welcome</h6>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h1 class="text-white display-1 text-center p-5 m-5">
                    Challenge International School
                  </h1>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>

   
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-right text-muted">
              &copy; 2020 <a href="http://www.privilege.sd" class="text-dark font-weight-bold" target="_blank" style="letter-spacing: 1px"> PRIVILEGE <i class="fab fa-product-hunt text-danger"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="http://privilege.sd" class="nav-link" target="_blank">School Management System (SMS) v.1.4.0</a>
              </li>
      
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @endsection 