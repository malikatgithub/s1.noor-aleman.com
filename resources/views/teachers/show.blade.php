@extends('layouts.css_main')

@section('body')

@include('layouts.teacher_nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0 ">
                        <div class="card-header border-top1 ">
                            <h5> عرض بيانات الأستاذ </h5>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
        
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1 mb-3">
                                            بيانات المدرس
                                    </div>

               
                                    <div class=" border-0 m-3">
                                  
                                            <img src="{{asset("$teacher->pic")}}" alt="" width="150px" height="150px" class="img-thumbnail">
                        
                                        
                                    </div>

                                    <div class=" border-0 flex-column" style="width:82.0%;">                                    

                                        
                                        {{-- Teacher information Section --}}

                

                                        <div class="row ">
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">الإسم<span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$teacher->name}}" readonly>
                                                </div>
                                                
                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">المؤهل الأكاديمي<span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$teacher->qualification}}" readonly>
                                                </div>

                                                <div class="col-md-4 mb-4">
                                                        <label for="validationDefault01">تاريخ الميلاد <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$teacher->dob}}" required name="dob" readonly>
                                                </div>
                                                
                                                
                                        </div>
                                        

                                        <div class="row ">
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$teacher->gender}}" readonly>
                                                </div>   


                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الهاتف</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="إختياري" value="{{$teacher->phone}}"  name="phone" readonly>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">رقم الهوية<span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$teacher->id_card}}" required name="id_card" readonly>
                                                </div>

                                                <div class="col-md-3 mb-4">
                                                        <label for="validationDefault01"> المرتب <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="المرتب الشهري" value="" required  name="salary" {{ $teacher->salary }}>
                                                </div>
                                    
                                                </div>

                                                <div class="row">

                                                        <div class="col-md-3 mb-3">
                                                                <label for="validationDefault01">تاريخ الإنضمام  <span class="required">*</span></label>
                                                                <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$teacher->join_date}}" required name="join_date" readonly>
                                                        </div>

                                                        <div class="col-md-3 mb-3">
                                                                <label for="validationDefault01"> عنوان السكن <span class="required">*</span></label>
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$teacher->address}}" required name="address" readonly>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                                <label for="validationDefault01">الإيميل</label>
                                                                <input type="email" class="form-control" id="validationDefault01" placeholder="إختياري" value="{{$teacher->email}}"  name="email" readonly>
                                                        </div>

                                                </div>
                                                

                                                <div class="row ">
                                                <div class="col-md-12 mb-12">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="teacher_note" readonly>{{$teacher->teacher_note}}</textarea>
                                                        </div>
                                                </div>
                                                        
                                                </div>

                                                
                                
                                                
                                        {{-- End Row of student information --}}

                                        
                                    </div>
                                </div>
        
                                
            
                
                
                                 
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
