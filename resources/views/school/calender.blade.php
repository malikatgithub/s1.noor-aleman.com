@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right font-weight-light">

                {{-- Start of calender Div  --}}

                <div class="card">

                       {{-- Session parameter Success and fail or Error --}}

                       @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                       @endif
   
                       @if (Session::has('delete'))
   
                           <div class="alert alert-danger">
                               <i class="fas fa-check-square fa-1x"></i>&nbsp;  {{Session::get('delete')}}
                           </div>  
   
                       {{Session::forget('delete')}}
                       @endif
   
                       @if (Session::has('success'))
   
                       <div class="alert alert-success"> 
                               <i class="fas fa-check-square fa-1x"></i>&nbsp; {{Session::get('success')}}
                       </div>  
   
                       {{Session::forget('success')}}
                       @endif
   
                       @if (session('error'))
                           <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                       @endif
   
                   {{-- End of Session parameter Success and fail or Error --}}

                     

                    <div class="card-header border-top1">
                        <h6 class="font-weight-bold"> 
                            <i class="fas fa-list-ul text-muted"></i>&nbsp; التقويم الدراسي للعام الحالي : <span class="font-weight-bold text-danger ">{{$academic_year_name}}</span>
                                <span class="float-left">
                                        <a href="{{asset('school/create_calender')}}" class="btn btn-info text-white">  <i class="fas fa-plus-circle fa-1x ml-1" ></i> إضافة التقويم</a>
                                </span>

                                <span class="float-left ml-2">
                                        <a href="{{asset('school/print_calender')}}" class="btn btn-success text-white">  <i class="fas fa-print fa-1x ml-1" ></i> طباعة التقويم</a>
                                </span>

                        </h6>
                        
                    </div>
                        <br>
                        <div class="container mb-5">  
                            <div class="row">
                                <div class="col-md-12">
                                    <form action='#'>
                                                <div class="form-group">
                                        
                                                    <h6>
                                                        <label for="formGroupExampleInput"> <i class="fas fa-search fa-1x ml-1" ></i> أدخل  اسم الحدث أو التاريخ </label>
                                                    </h6>
                                                    
                                                    @include('school.calender_search')

                                                </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
                        </div>
                </div>

                {{-- End of calender of card Div  --}}


                    
                

            </div>
        </div>
    </div>


 
   
@endsection
