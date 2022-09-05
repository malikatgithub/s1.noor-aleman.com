@extends('layouts.css_main')

@section('body')

@include('layouts.employee_nav')

@include('layouts.top-menu')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          تعديل بيانات الموظفين 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('employee.update', ['id' => $employee->id ])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1 font-weight-bold mb-3">
                                          -   بيانات الموظف 
                                         
                                    </div>
                                    
                            

                                    {{-- Row of employee information --}}
                                <div class=" border-0 flex-column w-100 m-3">           

                                    <div class="row ">
                                        <div class="col-md-6 mb-4">
                                                <label for="validationDefault01">الإسم<span class="required">*</span> </label>
                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$employee->name}}">
                                        </div>

                                        <div class="col-md-3 mb-4">
                                                <label for="validationDefault01"> المرتب <span class="required">*</span></label>
                                                <input type="number" class="form-control" id="validationDefault01" placeholder="المرتب الشهري"  required  name="salary" value="{{$employee->salary}}">
                                        </div>


                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                <select class="custom-select" required name="gender">
                                                        <option value=""></option>

                                                        @if ($employee->gender =='ذكر')
                                                        <option value="ذكر" selected>ذكر</option>
                                                        <option value="أنثي" >أنثي</option>

                                                        @else
                                                        <option value="أنثي" selected>أنثي</option>
                                                        <option value="ذكر" >ذكر</option>

                                                        @endif

                                                </select>
                                        </div>   

                                        
                                </div>
                                

                                <div class="row ">
                                       

                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault01">الهاتف</label>
                                                <input type="text" class="form-control" id="validationDefault01" placeholder="إختياري" value="{{$employee->phone}}"  name="phone" >
                                        </div>

                                        <div class="col-md-3 mb-3">
                                                <label for="validationDefault01">رقم الهوية<span class="required">*</span></label>
                                                <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->id_card}}" required name="id_card" >
                                        </div>


                                    <div class="col-md-3 mb-3">
                                            <label for="validationDefault01">تاريخ الإنضمام  <span class="required">*</span></label>
                                            <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->join_date}}" required name="join_date">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                            <label for="validationDefault01"> عنوان السكن <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->address}}" required name="address">
                                    </div>

                              
                                </div>
                                

                                <div class="row ">
                                    <div class="col-md-12 mb-12">
                                            <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="note"> @if ($employee->note == NULL) لاتوجد ملاحظات @else  {{ $employee->note }}@endif</textarea>
                                            </div>
                                    </div>
                                        
                                </div>

        
                         
                                
                            </div>
                        </div>

                          {{-- Row of employee information --}}

                     
                        
                                         
                
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
