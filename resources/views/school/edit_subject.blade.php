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
                                <div class="alert alert-success"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{Session::get('success')}}</div>
                        </div>  

                        {{Session::forget('success')}}
                        @endif


                     {{-- End of Error and Success Message Print --}}



                        <div class="card-header border-top1">
                          تعديل بيانات مادة دراسية 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('subject.update',['id' => $subject->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1 font-weight-bold">
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
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$subject->name}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                     
                                                
                                                @if ($subject->class_id == '')
                                                        <label for="validationDefault01">  <span class="required">قم بتحديد الفصل</span> </label>
                                                @endif
                                                <select class="form-control" name="class_id">

                                                        @if ($subject->class_id == '')
                                                                <option selected disabled>لم يتم تحديد الفصل</option>
                                                        
                                                                @foreach ($classes as $class)

                                                            
                                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                 

                                                                @endforeach

                                                                @else
                                                                        @foreach ($classes as $class)

                                                                                @if ($subject->class_id == $class->id)
                                                                                        <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                                                                        
                                                                                @endif

                                                                                @if ($subject->class_id != $class->id)
                                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                                @endif

                                                                        @endforeach

                                                        @endif    

                                                        
                                                </select>
                                                
                                                   
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                        <label for="validationDefault01"> المدرس<span class="required">*</span> </label>
                                                        <select class="form-control form-control-l" name="teacher_id">

                                                         


                                                                @if ($subject->teacher_id == '')
                                                                <option selected disabled>لم يتم تحديد الاستاذ</option>
                                                        
                                                                @foreach ($teachers as $teacher)

                                                 
                                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                         

                                                                @endforeach

                                                                @else
                                                                        @foreach ($teachers as $teacher)

                                                                                @if ($subject->teacher_id == $teacher->id)
                                                                                        <option value="{{$teacher->id}}" selected>{{$teacher->name}}</option>
                                                                                        
                                                                                @endif

                                                                                @if ($subject->teacher_id != $teacher->id)
                                                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                                @endif

                                                                        @endforeach

                                                                @endif    
                                                
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
