@extends('layouts.css_main')

@section('body')

@include('layouts.student_nav')

@include('layouts.top-menu')


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                {{-- Start of card Div  --}}

                <div class="card" style="height: 400px !important">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{ session('status') }} 
                        </div>
                        @endif

                        @if (Session::has('success'))

                        <div class="alert alert-success">
                            <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('success')}}
                        </div>  

                        {{Session::forget('success')}}
                        @endif


                        @if (Session::has('delete'))

                        <div class="alert alert-danger">
                            <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                        </div>  

                        {{Session::forget('delete')}}
                        @endif

                    <div class="card-header border-top1">
                        <h6 class="font-weight-bold"> 
                            
                                <i class="fas fa-trash-alt text-danger"></i>&nbsp; بيانات الطلاب الذين تم حذفهم 

                        </h6>
                        
                    </div>
                        <br>
                        <div class="container">  
                            <div class="row">
                                <div class="col-md-12">
                                    <form action='#'>
                                                <div class="form-group">
                                        
                                                    <h6>
                                                        <label for="formGroupExampleInput"> <i class="fas fa-search fa-1x ml-1" ></i>  أدخل الإسم للبحث</label>
                                                    </h6>
                                                    
                                                    @include('students.trashed.searchTrashed')
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
