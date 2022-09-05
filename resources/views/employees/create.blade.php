@extends('layouts.css_main')

@section('body')

@include('layouts.employee_nav')

@include('layouts.top-menu')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1 font-weight-bold">
                                <i class="fas fa-user-plus"></i> &nbsp; إضافة بيانات موظف جديد 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                              إستمارة إضافة الموظف 
                                    </div>

                         
                                    <div class="p-3 border-0 flex-column w-100" >                                    

                                        
                        {{-- teacher information Section --}}

                        {{-- Row of teacher information --}}


                                        <div class="row ">
                                                <div class="col-md-4 mb-4">

                                                        {{-- ACADEMIC YEAR ID --}}
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder=""  required name="academic_year_id" value="{{$academic_year_id}}">
                                                        {{--# ACADEMIC YEAR ID --}}


                                                        <label for="validationDefault01">الإسم<span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="">
                                                </div>
                                                
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01"> المرتب <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="المرتب الشهري" value="" required  name="salary" >
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                        <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                        <select class="custom-select" required name="gender">
                                                                <option value=""></option>
                                                                <option value="ذكر">ذكر</option>
                                                                <option value="أنثي">أنثي</option>
                                                        </select>
                                                </div>   
                                                
                                                
                                        </div>
                                        

                                        <div class="row ">
                                             

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الهاتف</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value=""  name="phone" required>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                        <label for="validationDefault01">رقم الهوية<span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="الرقم الوطني" value="" required  name="id_card" >
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">تاريخ الإنضمام  <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="join_date">
                                                </div>
    
                                    
                                        </div>

                                        <div class="row">

                                           
                                            <div class="col-md-12 mb-3">
                                                    <label for="validationDefault01"> عنوان السكن <span class="required">*</span></label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder="" value="" required name="address">
                                            </div>

                           
                                        </div>
                                        

                                        <div class="row ">
                                            <div class="col-md-12 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="teacher_note">لاتوجد</textarea>
                                                    </div>
                                            </div>
                                                
                                        </div>

                
                                 
                                        
                                    </div>
                                </div>

                                  {{-- Row of teacher information --}}

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
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
