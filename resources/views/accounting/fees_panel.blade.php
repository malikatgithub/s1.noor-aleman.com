@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 text-right font-weight-light">

                {{-- Start of card Div  --}}

                <div class="card">

                    {{-- Sesion Error and Success handeler --}}

                      @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          <i class="fas fa-check-square fa-1x"></i> &nbsp; {{ session('status') }}
                      </div>
                      @endif

                      @if (Session::has('delete'))

                      <div class="alert alert-danger">
                          <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                      </div>  

                      {{Session::forget('delete')}}
                      @endif


                      @if (Session::has('error'))

                      <div class="alert alert-danger bg-danger text-white">
                          <i class="fas fa-exclamation-triangle fa-1x"></i> &nbsp;  {{Session::get('error')}}
                      </div>  

                      {{Session::forget('error')}}
                      @endif

                      @if (Session::has('success'))

                      <div class="alert alert-success">
                          {{Session::get('success')}}
                      </div>  

                      {{Session::forget('success')}}
                      @endif

                    {{-- Sesion Error and Success handeler --}}


                    <div class="card-header border-top1">
                        
                        <h6 class=" text-dark font-weight-bold"> 
                                <i class="fas fa-donate  text-primary"></i>&nbsp; تسديد الرسوم الدراسية للعام الدراسي الحالي

                        </h6>
                
                    </div>
                        <br>
                        <div class="container mt-2">  
                            <div class="row">
                                <div class="col-md-12">
                                    <form action='#'>
                                            <div class="form-group">
                                    
                                                <h6>
                                                    <label for="formGroupExampleInput"> <i class="fas fa-search-dollar ml-1"></i>  أدخل إسم الطالب  </label>
                                                </h6>
                                                
                                                @include('accounting.fees_panel_search')
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
                        </div>
                </div>

                {{-- End of Start of card Div  --}}


                    
                

            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-11 text-right ">
                    <div class="card">
                        <div class="card-header border-top1">
                                <h6 class=" text-dark font-weight-bold"> 
                                        <i class="far fa-edit f text-primary"></i>&nbsp; تعديل  بيانات قسط
            
                                </h6>
                                
                            </div>
                                <br>
                        <div class="container">  
                            <div class="row">
                                <div class="col-md-12">
                                    <form action='#'>
                                            <div class="form-group">
                                    
                                                <h6>
                                                    <label for="formGroupExampleInput"> <i class="fas fa-search-dollar ml-1"></i>  أدخل رقم الطالب الأكاديمي  </label>
                                                </h6>
                                                
                                            @include('accounting.fees_edit_search')
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           

        </div>



 
   
@endsection
