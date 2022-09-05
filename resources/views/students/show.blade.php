@extends('layouts.css_main')

@section('body')

@include('layouts.student_nav')

@include('layouts.top-menu')



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0 ">
                        <div class="card-header border-top1 ">
                            <h6 class=" font-weight-bold">  عرض بيانات طالب  </h6>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
        
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                            بيانات الطالب
                                    </div>

                                    <div class="border-0 m-3">
                                  
                                            <img src="{{asset("public/$student->pic")}}" alt="" width="130px" height="130px" class="img-reponsive">

                                    </div>

                                    <div class=" border-0 flex-column" style="width:82.0%;">                                    

                                        
                        {{-- Student information Section --}}

                        {{-- Row of student information --}}


                                        <div class="row mt-2">
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01"> - الإسم </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->name}}" readonly>
                                                </div>
                
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">- تاريخ الميلاد</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->dob}}" readonly>
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault01"> - الديانة </label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->relegion}}" readonly>
                                                </div>
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">- الجنس</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->gender}}" readonly>
                                                    </div>        
                                                
                                        </div>
                                        
                
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                    <label for="validationDefault01">- فصيلة الدم </label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->blood}}" readonly>
                                                  
                                            </div>
                
                
                                            <div class="col-md-3 mb-4">
                                                    <label for="validationDefault01">- الجنسية</label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->nationality}}" readonly>
                                                </div>
                                        
                            
                                            <div class="col-md-6 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">- ملاحظات</label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->std_note}}" readonly>
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

                                    <div class="border-0">        
                                        <div class="row m-2">
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">- إسم الوالد</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->fa_name}}" readonly>
                                                </div>
                
                
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">- إسم الولدة</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->ma_name}}" readonly>
                                                </div>
            
            
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">- رقم ولي الامر</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->fa_phone}}" readonly>
                                                </div>
            
                                        </div>
                
                                        <div class="row m-2">
                                            <div class="col-md-12 mb-12">
                                              
                                                            <label for="exampleFormControlTextarea1">- عنوان السكن</label>
                                                           <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->address}}" readonly>
                                    
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
        
                                        <div class="border-0" >   
                                            <div class="form-row m-3">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">- الرقم الأكاديمي</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->reg_no}}" readonly>
                                                    </div>
                    
                    
                                                    <div class="col-md-6 mb-6">
                                                            <label for="validationDefault01">- الفصل الدراسي</label>

                                                           {{-- CODE FOR HANDLE THE EXCEPTION ERROR IF Class TYPES DELETED --}}
                                                                @php
                                                                        try
                                                                        {
                                                                                $class_name=$student->class->name;
                                                                                echo "<input type='text' class='form-control' id='validationDefault01' placeholder=''  required name='name' value='$class_name' readonly>";
                                                                        } 
                                                                        catch (\Exception $e) {
                                                                                echo "<input type='text' class='text-danger font-weight-bold form-control' id='validationDefault01' placeholder=''  required name='name' value='لقد تم مسح نوع هذا الفصل الرجاء مراجعة سله المهملات  !!' readonly>";
                                                                        }
                                                                @endphp

                                                        {{-- # CODE FOR HANDLE THE EXCEPTION ERROR IF Class TYPES DELETED --}}
                                                                
                                                         
                                                                
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
            
                                            <div class="border-0">   
                                                <div class="row m-2">
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">- الرسوم الدراسية</label>
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->fees}}" readonly>
                                                                
                                                        </div>
                        
                        
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">- رسوم التسجيل</label>
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->reg_fees}}" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">- رسوم الترحيل</label>
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->bus_fees}}" readonly>
                                                        </div>
                    
                    
                                                </div>
                        
                                                <div class="row m-2">
                                                    <div class="col-md-12 mb-12">
                                                            <div class="form-group">
                                                                <br>
                                                                <label for="exampleFormControlTextarea1">- ملاحظات</label>
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$student->fees_note}}" readonly>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                     {{-- End of Fees information --}}
                        
                                         
                
                                        <br>
                                        
                                        <center>
                                                <button id="printPageButton" class='btn btn-info font-weight-bold text-white' onClick="window.print();"> <i class="fa fa-print"></i> طباعة </button>
                                        </center>
                                       
          
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
