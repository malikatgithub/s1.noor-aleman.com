@extends('layouts.css_main')

@section('body')

@include('layouts.examNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right font-weight-light">

                {{-- Start of card Div  --}}

                <div class="card">


                 {{-- Session parameter Success and fail or Error --}}
                 @if (session('status'))
                 <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                 </div>
                 @endif

                 @if (Session::has('delete'))

                     <div class="alert alert-danger">
                         <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                     </div>  

                 {{Session::forget('delete')}}
                 @endif

                 @if (Session::has('success'))

                 <div class="alert alert-success"> 
                     {{Session::get('success')}}
                 </div>  

                 {{Session::forget('success')}}
                 @endif

                 @if (session('error'))
                     <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                 @endif
             {{-- End of Session parameter Success and fail or Error --}}

                    <div class="card-header border-top1">
                        <h6 class="font-weight-bold"> 
                            <i class="fas fa-list-ul text-success"></i>&nbsp; إضافة الدرجات لإمتحانات العام الدراسي الحالي : <span class="font-weight-bold text-danger">{{$academic_year_name}}</span>

                                <span class="float-left">
                                        <a href="{{asset('grades/create')}}" class="btn btn-success text-white">  <i class="fas fa-plus-circle fa-1x ml-1" ></i> إضافة نتيجة</a>
                                </span>

                        </h6>
                    </div>
  

                        </div>




                         {{-- Start of card Div  --}}

                <div class="card mt-4">

                    <div class="card-header border-top1">
                        <h6 class="font-weight-bold"> 
                            <i class="fas fa-list-ul text-primary"></i>&nbsp; تعديل الدرجات لإمتحانات العام الدراسي الحالي : <span class="font-weight-bold text-danger">{{$academic_year_name}}</span>
                        </h6>
                    </div>
                        <br>
                        <div class="container">  
                            <div class="row">
                                <div class="col-md-12">
    
                                    <div class="form-group">
                                        <div class="card-body">

                                            <form action="{{route('grades.list_edit_delete')}}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                            
                                                @include('exams.dynamic_dependent_edit_delete_print')
                                        

                                                <center>
                                                    <button type="submit" class="btn btn-primary"> <i class="fas fa-pen-alt fa-1x ml-1" ></i> تعديل الدرجات</button>
                                                </center>
                                                    
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                </div>

                </div>

                {{-- End of Start of card Div  --}}


                    
                

            </div>
        </div>
    </div>


 
   
@endsection
