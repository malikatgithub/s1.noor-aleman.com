@extends('layouts.css_main')

@section('body')

@include('layouts.BusNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11 text-right font-weight-light">

                {{-- Start of card Div  --}}

                <div class="card">
                    {{-- Session parameter Success and fail or Error --}}
                        @if (session('status'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if (Session::has('delete'))

                        <div class="alert alert-danger mb-3">
                            <i class="fas fa-trash-alt fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                        </div>  

                        {{Session::forget('delete')}}
                        @endif

                        @if (Session::has('success'))

                        <div class="alert alert-success mb-3"> 
                            {{Session::get('success')}}
                        </div>  

                        {{Session::forget('success')}}
                        @endif
                    {{-- End of Session parameter Success and fail or Error --}}

                    <div class="card-header border-top1 ">
                        <h6 class="font-weight-bold"> 
                            <i class="fas fa-list-ul text-muted"></i>&nbsp; بيانات التراحيل المتاحة

                                <span class="float-left">
                                        <a href="{{asset('bus/create')}}" class="btn btn-info text-white">  <i class="fas fa-plus-circle fa-1x ml-1" ></i> إضافة ترحيل</a>
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
                                                    <label for="formGroupExampleInput"> <i class="fas fa-search fa-1x ml-1" ></i>  أدخل إسم الترحيل للبحث</label>
                                                </h6>
                                                
                                                @include('bus.buses_search')
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
