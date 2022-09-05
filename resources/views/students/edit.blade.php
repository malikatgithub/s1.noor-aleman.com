@extends('layouts.css_main')

@section('body')

@include('layouts.right-menu')

@include('layouts.top-menu')


    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          تعديل بيانات طالب 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('student.update', ['id' => $student->id ])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap ">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                            بيانات الطالب
                                    </div>
                                    
                                    <div class=" border-0 p-2">
                                        <br>
                                        @if ($student->pic == '')
                                        <img src="{{asset('public/upload/students/default.png')}}" alt="fgsdf" width="150px" height="150px">
                                        @else
                                            <img src= "{{asset('public/upload/students/$student->pic')}}" alt="" width="130px" height="130px">
                                        @endif
                                        
                                    </div>
                                    

                                    <div class=" border-0 flex-column " style="width:82.2%;">                                    

                                        
                        {{-- Student information Section --}}

                        {{-- Row of student information --}}


                                        <div class="row pt-3">
                                                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الإسم <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->name}}">
                                                </div>
                
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">تاريخ الميلاد <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$student->dob}}" required name="dob" >
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault01">الديانة <span class="required">*</span></label>
                                                    <select class="custom-select" required name="relegion">
                                                            <option value=""></option>

                                                            @if ($student->relegion =='مسلم')
                                                            <option value="مسلم" selected>مسلم</option>
                                                            <option value="مسيحي" >مسيحي</option>

                                                            @else
                                                            <option value="مسيحي" selected>مسيحي</option>
                                                            <option value="مسلم" >مسلم</option>

                                                            @endif
                                            
                                                    </select>
                                                </div>
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                        <select class="custom-select" required name="gender">
                                                                <option value=""></option>

                                                                @if ($student->gender =='ذكر')
                                                                <option value="ذكر" selected>ذكر</option>
                                                                <option value="أنثي" >أنثي</option>

                                                                @else
                                                                <option value="أنثي" selected>أنثي</option>
                                                                <option value="ذكر" >ذكر</option>

                                                                @endif

                                                        </select>
                                                    </div>        
                                                
                                        </div>
                                        
                
                                        <div class="row">
                                            <div class="col-md-2 mb-2">
                                                    <label for="validationDefault01">فصيلة الدم</label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->blood}}" name="blood">
                                            </div>
                
                
                                            <div class="col-md-4 mb-4">
                                                    <label for="validationDefault01">الجنسية <span class="required">*</span></label>
                                                    <select class="custom-select" required name="nationality">
                                                            <option value=""></option>
                                                            @if ($student->nationality == 'سوداني')
                                                            <option value="سوداني" selected>سوداني</option>
                                                            <option value="أجنبي">أجنبي</option>

                                                            @else
                                                            <option value="أجنبي" selected>أجنبي</option>
                                                            <option value="سوداني" >سوداني</option>

                                                            @endif
                                                    </select>
                                                </div>
                                            
                                                <div class="col-md-4 mb-4">
                                                    <label for="validationDefault01">الصورة</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="pic">
                                                    </div>

                                                </div>

                                                <div class="col-md-2 mb-2 mt-4">

                                                        <div class="form-check text-danger font-weight-bold">
                                                                        <input class="form-check-input border border-danger" type="checkbox" value="default.png" id="defaultCheck1" name="delete_pic">
                                                                        <label class="form-check-label" for="defaultCheck1">
                                                                                <br>
                                                                                حذف الصورة
                                                                        </label>
                                                        </div>

                                                </div>  
                
                                               
                                                
                                        </div>
                
                                        <div class="row">
                                            <div class="col-md-12 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="std_note">{{$student->std_note}}</textarea>
                                                    </div>
                                            </div>
                                        </div>
                                       
                    {{-- End Row of student information --}}

                                        
                                    </div>
                                </div>
        
                                
            
                
                
                                    <br>
                    {{-- Start Parent information --}}
                                
                                <div class="card  flex-wrap">
                                      
                                    <div class="card-header  w-100 text-muted border-top1">
                                            <h5 class="">بيانات ولي الامر</h5>
                                    </div>

                                    <div class="mt-3 border-0 p-3" >        
                                        <div class="row">
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">إسم الوالد <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" required name="fa_name" value="{{$student->fa_name}}">
                                                </div>
                
                
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">إسم الولدة <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="ma_name" value="{{$student->ma_name}}">
                                                </div>
            
            
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">رقم ولي الامر <span class="required">*</span></label>
                                                    <input type="number" class="form-control" id="validationDefault01" placeholder="" required name="fa_phone" value="{{$student->fa_phone}}">
                                                </div>
            
                                        </div>
                
                                        <div class="row">
                                            <div class="col-md-12 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">عنوان السكن <span class="required">*</span> </label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="address">{{$student->address}}</textarea>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                    <br>
                    {{-- Start Acadmic information --}}
                                    <div class="card  flex-wrap">
                                      
                                        <div class="card-header  w-100 text-muted border-top1">
                                                <h5 class="">بيانات الأكاديمية </h5>
                                        </div>
        
                                        <div class="mt-3 border-0 p-3">   
                                            <div class="form-row">
                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">الرقم الأكاديمي <span class="required">*</span> </label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder=""  name="reg_no" readonly value="{{$student->reg_no}}">
                                                    </div>
                    
                    
                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                                @if ($student->class_id == '')
                                                                        <label for="validationDefault01">  <span class="required">قم بتحديد الفصل</span> </label>
                                                                @endif
                                                                <select class="form-control" name="class_id">

                                                                        @if ($student->class_id == '')
                                                                                <option selected disabled>لم يتم تحديد الفصل</option>
                                                                      
                                                                                @foreach ($classes as $class)

                                                                                        @if ($student->class_id == $class->id)
                                                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                                                
                                                                                        @endif

                                                                                        @if ($student->class_id != $class->id)
                                                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                                        @endif

                                                                                @endforeach

                                                                                @else
                                                                                        @foreach ($classes as $class)

                                                                                                @if ($student->class_id == $class->id)
                                                                                                        <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                                                                                        
                                                                                                @endif

                                                                                                @if ($student->class_id != $class->id)
                                                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                                                @endif

                                                                                        @endforeach

                                                                        @endif    

                                                                        
                                                                </select>

                                                            {{-- <input type="text" class="form-control" id="validationDefault01" placeholder=""  name="class_id" value="{{$student->class_id}}"> --}}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                     {{-- Start Acadmic information --}}
                    
                                    <br>
                     
                     {{-- Start Fees information --}}
                
                                        <div class="card  flex-wrap">
                                      
                                            <div class="card-header  w-100 text-muted border-top1">
                                                    <h5 class="">بيانات الرسوم الدراسية </h5>
                                            </div>
            
                                            <div class="mt-3 p-3 border-0 " >   
                                                <div class="row">
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">الرسوم الدراسية <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder=""  required name="fees" value="{{$student->fees}}">
                                                        </div>
                        
                        
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">رسوم التسجيل <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder=""  required name="reg_fees" value="{{$student->reg_fees}}">
                                                        </div>

                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">رسوم الترحيل <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder=""  required name="bus_fees" value="{{$student->bus_fees}}">
                                                        </div>
                    
                    
                                                </div>
                        
                                                <div class="row">
                                                    <div class="col-md-12 mb-12">
                                                            <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="تخفيضات و غيرها" name="fees_note">{{$student->fees_note}}</textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                     {{-- End of Fees information --}}
                        
                                         
                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-success">حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of card Div  --}}

                                    <br>
                                    <br>
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
