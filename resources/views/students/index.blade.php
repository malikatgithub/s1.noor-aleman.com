@extends('layouts.css_main')

@section('body')

@include('layouts.student_nav')

@include('layouts.top-menu')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 text-right mt-4">

                {{-- Start of card Div  --}}

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{ session('status') }}
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
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('success')}}
                </div>  

                {{Session::forget('success')}}
                @endif

                <div class="card border-top1">

                    <div class="card-header ">
                        <h6 class="font-weight-bold"> 

                            <span>
                                <i class="fa fa-search mt-3"></i> &nbsp;  البحث عن طالب 
                            </span>

                                <span class="float-left">
                                        <a href="{{asset('student/create')}}" class="btn btn-info text-white">إضافة طالب</a>
                                </span>

                        </h6>
                        
                    </div>
                        <br>
                        <div class="container">  
                            <div class="row">
                                <div class="col-md-12">
                                    <form action='#'>
                                                <div class="form-group">
                                                    
                                                    @include('students.search')

                                                </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
                        </div>
                </div>

                {{-- End of Start of card Div  --}}


                    
                

            </div>
        </div>
    </div>

   
@endsection
