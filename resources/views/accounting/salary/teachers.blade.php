@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 text-right">

            {{-- Start of card Div  --}}

            <div class="card">

                    @if (session('status'))
                    <div class="alert alert-success m-3" role="alert">
                        <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{ session('status') }} 
                    </div>
                    @endif

                    @if (Session::has('success'))

                    <div class="alert alert-success m-3">
                        <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('success')}}
                    </div>  

                    {{Session::forget('success')}}
                    @endif


                    @if (Session::has('delete'))

                    <div class="alert alert-danger m-3">
                        <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                    </div>  

                    {{Session::forget('delete')}}
                    @endif

                <div class="card-header border-top1">
                    <h5 class="font-weight-bold"> 
                        
                            <i class="fas fa-list-ul text-muted"></i>&nbsp; بيانات الاساتذة و المدرسين المتاحة

                            <span class="float-left">
                                    <a href="{{asset('teacher/create')}}" class="btn bg-success text-white">  <i class="fas fa-plus-circle fa-1x ml-1" ></i> إضافة مدرس</a>
                            </span>

                    </h5>
                    
                </div>
                    <br>
                    <div class="container mb-5">  
                        <div class="row">
                            <div class="col-md-12">
                                <form action='#'>
                                            <div class="form-group">
                                    
                                                <h6>
                                                    <label for="formGroupExampleInput"> <i class="fas fa-search fa-1x ml-1" ></i>  أدخل الإسم للبحث</label>
                                                </h6>
                                                
                                                @include('accounting.salary.teacher_search')
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
