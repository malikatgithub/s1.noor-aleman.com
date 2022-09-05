@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')


    <div class="container mt-5">

         <div class="row justify-content-center">
            <div class="col-lg-12 text-right">

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
                        {{Session::get('success')}}<i class="fas fa-check-square fa-1x"></i>
                    </div>  

                    {{Session::forget('success')}}
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                    @endif

                {{-- End of Session parameter Success and fail or Error --}}

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1 font-weight-bold text-dark">
                          تعديل بيانات المدرسة 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('school_info.update', ['id' => $school_info->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1">
                                            بيانات المدرسة
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- class information Section --}}


                        {{-- Row of class information --}}


                                        <div class="row ">
                                            
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">الإسم باللغة العربية <span class="required">*</span> </label>
                                                        <input type="text" class="form-control text-dark" id="validationDefault01" placeholder=""  required name="name_arabic" value="{{$school_info->name_arabic}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">الإسم باللغة الإنجليزية <span class="required">*</span></label>
                                                        <input type="text" class="form-control text-dark" id="validationDefault01" placeholder="" value="{{$school_info->name_english}}" required name="name_english" >
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                    <br>
                                                        <label for="exampleFormControlFile1">قم بإختيار الشعار <span class="required">*</span></label>
                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
                                                </div>  

                                        </div>
                                        
                        {{-- End of Row of class information --}}
                                 
                                        
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
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

                  
            </div>
        </div>
    </div>

   
@endsection
