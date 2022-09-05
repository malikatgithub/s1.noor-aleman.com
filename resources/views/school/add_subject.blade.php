@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                     {{-- Error and Success Message Print --}}

                        @if (session('error'))
                            <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                        @endif



                        @if (Session::has('success'))

                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>  

                        {{Session::forget('success')}}
                        @endif


                     {{-- End of Error and Success Message Print --}}


                     <div class="card">
                        <div class="card-header border-top1">
                          إضافة بيانات مادة دراسية للعام الدراسي : <span class=" text-danger font-weight-bold">{{$academic_year_name}}</span> 
                        </div> 
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('subject.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                            بيانات المادة
                                    </div>

                                    @if ($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif
                         
                                    <div class="card-body border-0 flex-column w-100" >                                    

                                        
                        {{-- Subject information Section --}}

                        {{-- Row of Subject information --}}


                                        <div class="row ">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">إسم المادة <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="">

                                                        {{-- ACADEMIC YEAR ID HIDDEN INPUT --}}
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder=""  required name="current_academic_year_id" value="{{$current_academic_year_id}}">
                                                        {{-- # ACADEMIC YEAR ID HIDDEN INPUT --}}

                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                        <select class="form-control form-control-l" name="class_id">

                                                                @foreach ($classes as $class)
                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                
                                                        </select>
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                        <label for="validationDefault01"> المدرس<span class="required">*</span> </label>
                                                        <select class="form-control form-control-l" name="teacher_id">

                                                                @foreach ($teachers as $teacher)
                                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                @endforeach
                                                
                                                        </select>
                                                        <br>
                                                </div>
                                                
                             
                                               
                                        </div>
                                        
                        {{-- End of Row of Subject information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-success">حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of Subject  --}}

                                    <br>
                                    <br>
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
