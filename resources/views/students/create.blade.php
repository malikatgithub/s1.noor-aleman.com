@extends('layouts.css_main')

@section('body')

@include('layouts.student_nav')

@include('layouts.top-menu')


    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          <h6 class="font-weight-bold text-dark"> <i class="fas fa-user-plus text-primary"></i>&nbsp; إضافة طالب جديد</h6>
                        </div>
                            <br>
                            <div class="container">
                                {{-- Start of form  --}}
                            <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                  
                                        <div class="card flex-row flex-wrap">
                                      
                                                                <div class="card-header w-100 text-muted border-top1">
                                                                       <span class="font-weight-bold fa-1x">
                                                                                معلومات الطالب
                                                                       </span>
                                                                </div>
                            
                                                     
                                                                <div class="card-body border-0 flex-column w-100" >                  

                                        
                                        <div class="form-row">
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الإسم <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="name">
                                                </div>
                
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">تاريخ الميلاد <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="dob">
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationDefault01">الديانة <span class="required">*</span></label>
                                                    <select class="custom-select" required name="relegion">
                                                            <option value=""></option>
                                                            <option value="مسلم">مسلم</option>
                                                            <option value="مسيحي">مسيحي</option>
                                                    </select>
                                                </div>
                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                        <select class="custom-select" required name="gender">
                                                                <option value=""></option>
                                                                <option value="ذكر">ذكر</option>
                                                                <option value="أنثي">أنثي</option>
                                                        </select>
                                                </div>        
                                                
                                        </div>
                
                
                                        <div class="form-row">
                                            <div class="col-md-4 mb-4">
                                                    <label for="validationDefault01">فصيلة الدم</label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" name="blood">
                                            </div>
                
                
                                            <div class="col-md-4 mb-4">
                                                    <label for="validationDefault01">الجنسية <span class="required">*</span></label>
                                                    <select class="custom-select" required name="nationality">
                                                            <option value=""></option>
                                                            <option value="سوداني">سوداني</option>
                                                            <option value="أجنبي">أجنبي</option>
                                                    </select>
                                                </div>
                                            
                                                <div class="col-md-4 mb-4">
                                                    <label for="validationDefault01">الصورة</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="pic">
                                                    </div>
                                                </div>
                
                                                    
                                                
                                        </div>
                
                                        <div class="form-row">
                                            <div class="col-md-12 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="std_note"></textarea>
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                
                
                                    <br>
                
                                    <div class="card flex-row flex-wrap">
                                      
                                                <div class="card-header w-100 text-muted border-top1">
                                                       <span class="font-weight-bold fa-1x">
                                                                معلومات ولي الامر
                                                       </span>
                                                </div>
            
                                     
                                                <div class="card-body border-0 flex-column w-100" > 
                                    
                                            <div class="form-row">
                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">إسم الوالد <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="fa_name">
                                                    </div>
                    
                    
                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">إسم الولدة <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="ma_name">
                                                    </div>
                
                
                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">رقم ولي الامر <span class="required">*</span></label>
                                                            <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="fa_phone">
                                                    </div>
                
                                            </div>
                    
                                            <div class="form-row">
                                                <div class="col-md-12 mb-12">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">عنوان السكن <span class="required">*</span> </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="address"></textarea>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                    
                                    
                
                
                                    <br>

                                    <div class="card flex-row flex-wrap">
                                      
                                                <div class="card-header w-100 text-muted border-top1">
                                                       <span class="font-weight-bold fa-1x">
                                                                البيانات الأكاديمية
                                                       </span>
                                                </div>
            
                                        <div class="card-body border-0 flex-column w-100" > 
                                            <div class="form-row">

                                                        <div class="col-md-4 mb-4">
                                                                <label for="validationDefault01">السنة الدراسية <span class="required">*</span> </label>
                                                                <input type="hidden" class="form-control text-danger" id="validationDefault01" placeholder="auto-genterate" readonly value="{{$academic_year_id}}" name="academic_year_id" >
                                                                <input type="text" class="form-control text-danger border border-danger font-weight-bold text-center" id="validationDefault01" readonly value="{{$academic_year_name}}" name="academic_year_name" >
                                                        </div>

                                                    <div class="col-md-4 mb-4">
                                                            <label for="validationDefault01">الرقم الأكاديمي <span class="required">*</span> </label>
                                                            <input type="text" class="form-control border-success" id="validationDefault01" placeholder="auto-genterate" readonly value="" name="reg_no" >
                                                    </div>
                    
                    
                                                    <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                        <select class="form-control form-control-md" name="class_id">

                                                                @foreach ($classes as $class)
                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                
                                                        </select>
                                                    </div>
                
                
                                            </div>
                                        </div>
                                </div>
                    
                    
                
                                
                                <br>

                                <div class="card flex-row flex-wrap">
                                      
                                                <div class="card-header w-100 text-muted border-top1">
                                                       <span class="font-weight-bold fa-1x">
                                                                البيانات المالية
                                                       </span>
                                                </div>
            
                                        <div class="card-body border-0 flex-column w-100" > 
                        
                                                <div class="form-row">
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">الرسوم الدراسية <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="fees">
                                                        </div>
                        
                        
                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">رسوم التسجيل <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="reg_fees">
                                                        </div>

                                                        <div class="col-md-4 mb-6">
                                                                <label for="validationDefault01">رسوم الترحيل <span class="required">*</span></label>
                                                                <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="bus_fees">
                                                        </div>
                    
                    
                                                </div>
                        
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-12">
                                                            <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="تخفيضات و غيرها" name="fees_note"></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                </div>

                                        <br>
                                        
                                        <center>
                                            <button type="submit" id='btn' class="btn btn-success">حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of card Div  --}}

                                    <br>
                                    <br>
                            </div>
                           

                            <script>
                                function disableButton() {
                                        var btn = document.getElementById('btn');
                                        btn.disabled = true;
                                        btn.innerText = 'saving...'
                                }
                                </script>

                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>
    <br>
   

   
@endsection
