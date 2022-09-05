@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
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
            </div>

        {{--====== 
            
            Info of school 
            
            --}}
            
        </div>
        <div class="row mb-4">
                <div class="col-md-12 text-right">
                        <div class="card flex-row flex-wrap">
                            <div class="card-footer w-100 text-muted border-top1">
                                <span class="font-weight-bold text-primary"><i class="fa fa-university text-dark"></i>&nbsp; بيانات المدرسة </span>
                                
                                @if ($school_info->isEmpty())
                                <br>
                                <br>
                                    <h6 class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; لم تتم إضافة بيانات المدرسة<h6>
                                @else
                                <br>
                                    @foreach ($school_info as $info)
                                        <div class="row">
                                            <div class="col-md-8 mt-4">
                                                    <h6 class="text-dark font-weight-bold">- الإسم باللغة العربية <i class="fas fa-angle-double-left fa-1x"></i>&nbsp; {{$info->name_arabic}}<h6>
                                                    <h6 class="text-dark font-weight-bold">- الإسم باللغة الإنجليزية <i class="fas fa-angle-double-left fa-1x"></i>&nbsp; {{$info->name_english}}<h6>
                                                    <br>
                                                    <h6 class="font-weight-bold text-danger">- العمليات<h6>
                                                    <a href={{ url("/school_info/edit/$info->id") }} class="font-weight-bold"><i class='far fa-edit fa-1x ml-1 text-primary'></i>تعديل </a>
                                            </div>

                                            <div class="col-md-3">
                                                <img src='{{ asset("public/$info->logo")}}' alt="" width="150px" height="150px" class="img-reponsive">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                </div>
        </div>

        {{-- =====

            End section of school Info
            
            --}}

         <div class="row justify-content-center">
            <div class="col-lg-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1 font-weight-bold text-dark">
                          إضافة بيانات المدرسة 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('school_info.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1">
                                            بيانات المدرسة
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- school information Section --}}

                        {{-- Row of class information --}}

                            @if (!($school_info->isEmpty()))
                                    <div class="row ">
                                            <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">الإسم باللغة العربية <span class="required">*</span> </label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name_arabic" value="" readonly>
                                            </div>
            
            
                                            <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">الإسم باللغة الإنجليزية <span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="name_english" readonly>
                                            </div>

                                            <div class="col-md-12 mb-12">
                                                    <label for="exampleFormControlFile1">الشعار</label>
                                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo" readonly>
                                            </div>
                                    </div>

                           
                                        
                        {{-- End of Row of school information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-primary" disabled>حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of student  --}}

                                    <br>
                                    <br>

                            @else

                            <div class="row ">
                                <div class="col-md-6 mb-6">
                                        <label for="validationDefault01">الإسم باللغة العربية <span class="required">*</span> </label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name_arabic" value="">
                                </div>


                                <div class="col-md-6 mb-6">
                                        <label for="validationDefault01">الإسم باللغة الإنجليزية <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="name_english">
                                </div>

                                <div class="col-md-12 mb-12">
                                        <label for="exampleFormControlFile1">الشعار</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
                                </div>
                        </div>

               
                            
            {{-- End of Row of school information --}}
                     
                            
                        </div>
                    </div>

    
                            <br>
                            
                            <center>
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </center>
                           
                        </form>
                        {{-- End of form of student  --}}

                        <br>
                        <br>
                                    
                            @endif



                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

                  
            </div>
        </div>
    </div>

   
@endsection
