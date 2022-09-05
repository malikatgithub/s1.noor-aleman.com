@extends('layouts.css_main')

@section('body')

@include('layouts.employee_nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0 ">
                        <div class="card-header border-top1 ">
                            <h5> عرض بيانات الموظف </h5>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
        
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1 mb-3">
                                            بيانات الموظف
                                    </div>


                                    <div class=" border-0 flex-column m-4 w-100">                                    

                                        
                                        {{-- employee information Section --}}

                

                                        <div class="row ">
                                                <div class="col-md-6 mb-4">
                                                        <label for="validationDefault01">الإسم<span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$employee->name}}" readonly>
                                                </div>
                                                
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الجنس <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$employee->gender}}" readonly>
                                                </div>   

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الهاتف</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="إختياري" value="{{$employee->phone}}"  name="phone" readonly>
                                                </div>
                                                
                                        </div>
                                        

                                        <div class="row ">
                                        

                                                <div class="col-md-6 mb-3">
                                                        <label for="validationDefault01">رقم الهوية<span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->id_card}}" required name="id_card" readonly>
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">تاريخ الإنضمام  <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->join_date}}" required name="join_date" readonly>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01"> عنوان السكن <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$employee->address}}" required name="address" readonly>
                                                </div>

                                        </div>
                                                

                                                <div class="row ">
                                                <div class="col-md-12 mb-12">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="note" readonly>
                                                                        @if ($employee->note == NULL)
                                                                            لاتوجد ملاحظات
                                                                        @else
                                                                        {{$employee->note}}
                                                                        @endif
                                                                </textarea>
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
