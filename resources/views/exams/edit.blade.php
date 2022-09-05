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
                          تعديل بيانات امتحان 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('exam.update',['id'=>$exam->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                            بيانات الامتحان
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- class information Section --}}

                        {{-- Row of class information --}}


                                        <div class="row ">
                                                       
                                                <div class="col-md-9 mb-12">
                                                        <label for="validationDefault01">إسم الامتحان <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$exam->name}}">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                                <label for="validationDefault01">العام الدراسي الحالي<span class="required">*</span> </label>
                                                                
                                                                <input type="text" class="form-control" id="validationDefault01" placeholder=""  readonly required name="academic_year" value="{{$exam->academic_years->name}}">
                                                                <input type="hidden" class="form-control" id="validationDefault01" placeholder=""  readonly required name="academic_year_id" value="{{$exam->academic_years_id}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01"> الدرجة الكاملة <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$exam->total_grade}}" required name="total_grade" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                    <select class="form-control form-control-l" name="class_id">

                                                        @if ($exam->class_id == '')
                                                                <option selected disabled>لم يتم تحديد الفصل</option>
                                                        
                                                                @foreach ($classes as $class)

                                                        
                                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                                

                                                                @endforeach

                                                                @else
                                                                        @foreach ($classes as $class)

                                                                                @if ($exam->class_id == $class->id)
                                                                                        <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                                                                        
                                                                                @endif

                                                                                @if ($exam->class_id != $class->id)
                                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                                @endif

                                                                        @endforeach

                                                        @endif    
                                            
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">تاريخ النهاية<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$exam->start_date}}" required name="start_date" >           
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                                <label for="validationDefault01"> تاريخ البداية<span class="required">*</span></label>
                                                                <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$exam->end_date}}" required name="end_date" >           
                                                        </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01">ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="exam_note">{{$exam->exam_note}}</textarea>
                                                </div>
                                                
                             
                                                
                                        </div>
                                        
                        {{-- End of Row of class information --}}
                                 
                                        
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
