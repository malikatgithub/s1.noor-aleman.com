@extends('layouts.css_main')

@section('body')

@include('layouts.examNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          إضافة بيانات امتحان 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('exam.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1">
                                            بيانات الامتحان
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- Exam information Section --}}

                        {{-- Row of Exam information --}}


                                        <div class="row ">
                                                       
                                                <div class="col-md-8 mb-12">
                                                        <label for="validationDefault01">إسم الامتحان <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="">
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                                <label for="validationDefault01">العام الدراسي الحالي<span class="required">*</span> </label>
                                                                <input type="text" class="form-control border-danger text-danger font-weight-bold" id="validationDefault01" placeholder=""   required value="{{$academic_year_name}}">
                                                                <input type="hidden" class="form-control" id="validationDefault01" placeholder=""   required name="academic_year_id" value="{{$academic_year_id}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01"> الدرجة الكاملة <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="total_grade" >
                                                </div>
                                                
                                                <div class="col-md-12 mb-12 mt-3 mb-3">
                                                        <label for="validationDefault01"> إختر الفصول  <span class="required">*</span></label>
                                                        <br>
                                                        <div class="form-check form-check-inline mr-0 ">
                                                                @foreach ($classes as $class)
                                                                        <input class="form-check-input"  value="{{$class->id}}" type="checkbox"  name="class_id[]">
                                                                        <label class="form-check-label" for="defaultCheck1">
                                                                        &nbsp; {{$class->name}}
                                                                        </label>
                                                                        <br>
                                                                @endforeach
                                                        </div>
                                                        
                                                    {{-- <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                    <select class="form-control form-control-l" name="class_id">

                                                            @foreach ($classes as $class)
                                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endforeach
                                            
                                                    </select> --}}
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">تاريخ النهاية<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="start_date" >           
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                                <label for="validationDefault01"> تاريخ البداية<span class="required">*</span></label>
                                                                <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="end_date" >           
                                                        </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01">ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="exam_note"></textarea>
                                                </div>
                                                
                             
                                                
                                        </div>
                                        
                        {{-- End of Row of Exam information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-success">حفظ البيانات</button>
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
