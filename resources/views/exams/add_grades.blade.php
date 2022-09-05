@extends('layouts.css_main')

@section('body')

@include('layouts.examNav')

@include('layouts.top-menu')

 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          <h6 class="text-muted font-weight-bold"><i class="fas fa-plus-circle"></i>&nbsp; إضافة درجات  امتحان </h5>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}


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
                
         
                            <form action="{{route('grades.list')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card flex-row flex-wrap">
                                      
                                 

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- Grade information Section --}}

                        {{-- Row of Dynamic Search information --}}

           
                            @include('exams.dynamic_dependent')
    
                                        
                        {{-- End of Dynamic Search information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-success">إضافةالدرجات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of student  --}}

                                    <br>
                                    <br>
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
