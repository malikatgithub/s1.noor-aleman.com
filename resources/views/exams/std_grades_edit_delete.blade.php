@extends('layouts.css_main')

@section('body')

@include('layouts.examNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">


                {{-- Session parameter Success and fail or Error --}}

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (Session::has('delete'))

                        <div class="alert alert-danger">
                            <i class="fas fa-check-square fa-1x"></i>&nbsp;  {{Session::get('delete')}}
                        </div>  

                    {{Session::forget('delete')}}
                    @endif

                    @if (Session::has('success'))

                    <div class="alert alert-success"> 
                            <i class="fas fa-check-square fa-1x"></i>&nbsp; {{Session::get('success')}}
                    </div>  

                    {{Session::forget('success')}}
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                    @endif

                 {{-- End of Session parameter Success and fail or Error --}}


                        <div class="card-header border-top1">
                          <h6 class="text-dark font-weight-bold"><i class="fas fa-plus-circle"></i>&nbsp; إضافة درجات  الطلاب </h6>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                         
                                    <table class="table table-striped table-bordered text-right" >
                                                <br>
                                                 <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>إسم الإمتحان</td>
                                                        <td class="font-weight-bold text-danger">العام الدراسي</td>
                                                        <td>الفصل الدراسي</td>
                                                        <td>الدرجة الكاملة</td>
                                                        <td>بداية الإمتحان</td>
                                                        <td>نهاية الامتحان</td>
                                                      </tr>
                                                 </thead>
                                                 
                                                 <tbody class="text-right">
                                                        <td>1</td>
                                                        <td>{{$exam->name}}</td>
                                                        <td  class="font-weight-bold text-danger">{{$exam->academic_years->name}}</td>
                                                        <td>

                                                                @php

                                                                
                                                                try {
                                                                  echo $exam->class->name;
                                                                } 
                                                                catch (\Exception $e) {echo "<spna class='text-danger font-weight-bold'>لقد تم مسح هذا الفصل الرجاء مراجعة سله المهملات  !!</span>";}
                                                                
                                                                
                                                                @endphp

                                                            

                                                        </td>
                                                        <td>{{$exam->total_grade}}</td>
                                                        <td>{{$exam->start_date}}</td>
                                                        <td>{{$exam->end_date}}</td>
                                                       
                                                 </tbody>
                                          
                                            </table>
                         
                                    {{-- <div class="card-header border-0 flex-column w-100" >                                    
                                        
                                    </div> --}}

                                        



                                    @if ($subjects_name->isEmpty())
                                        <div class="alert bg-danger text-center text-white font-weight-bold" role="alert">
                                            <i class="fas fa-check-square fa-1x"></i> &nbsp; لم تتم إضافة مواد لهذا المستوي الدراسي     
                                        </div>
                                    @else
                                        @foreach ($students as $student)

                                            @if ($student_result->isEmpty() or $exam_result->isEmpty())

                                            <form action="{{route('grades.store')}}" method="POST" enctype="multipart/form-data">
                                                {{@csrf_field()}}
                                                <table class="table table-striped table-bordered text-right" >
                                                    
                                                        <tbody class="text-right">
                                                                    
                                                            
                                                        {{-- Import hidden information for database feed table --}}
                                                            <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="academic_year_id" value="{{$exam->academic_years_id}}">
                                                            <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="class_id" value="{{$exam->class_id}}">
                                                            <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="exam_id" value="{{$exam->id}}">
                                                            <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="total_grade" value="{{$exam->total_grade}}">
                                                        {{-- Ends Import hidden information for database feed table --}}
                                                                    <tr>   
                                                        <td style="width:15%">
                                                            {{$student->name}}
                                                        </td>
                                                        <span style="display:none">@php $x=0 @endphp </span>

                                                        {{-- CREATE THE SUBJECT INPUT FEILD --}}

                                                         
                                                                @foreach ($subjects_name as $subject_name)
                                                                    {{-- {{$x++}} --}}
                                                                    <span style="display:none"> @php $x++ @endphp </span>
                                                                    <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="student_id" value="{{$student->id}}">  
                                                                    <td> 
                                                                        <label for="validationDefault01" class="text-muted" style="font-size:10px;">{{$subject_name->name}}</label> 
                                                                    {{-- <input type="text" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder=""  required  readonly name="" value="{{$subject_name->name}}">                                                         --}}
                                                                    <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder=""  required  name="subject_id[]" value="{{$subject_name->id}}">
                                                                    <input type="number" class="form-control w-100" id="validationDefault01" placeholder=""  required name="{{'grade'.$x}}" value="">
                                                                    </td>
                                                                @endforeach    
                                                         

                                                        {{-- CREATE THE SUBJECT INPUT FEILD --}}
                                            
                                                        <td>
                                                            <center>
                                                                <label for="validationDefault01" class="text-muted font-weight-bold" style="font-size:12px;">حفظ</label> 
                                                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save fa-2x"></i></button>   
                                                            </center>
                                                        </td>
                                                
                                                            </tr>
                                                        </tbody>
                                                
                                                    </table>
                                                </form> 


                                            @else

                                        
                                    
                                            {{-- FUNCTION FOR STORE THE STUDENT WHOES IS ADDED RESULT FOR THEM  --}}

                                            @foreach ($student_result as $student_id)
                                                @php
                                                    $array[] = $student_id->std_id;
                                                @endphp
                                            @endforeach
                                        
                                            {{--# FUNCTION FOR STORE THE STUDENT WHOES IS ADDED RESULT FOR THEM  --}}
                                         
                            
                                            @if (in_array($student->id , $array))


                                            {{-- @if ($student->id ==  and $exam->id == ) --}}

                                                <form action="{{route('grades.store')}}" method="POST" enctype="multipart/form-data">
                                                                                    {{@csrf_field()}}
                                                                                    <table class="table table-striped table-bordered text-right" >
                                                                                        
                                                                                            <tbody class="text-right">
                                                                                                        
                                                                                                
                                                                                            {{-- Import hidden information for database feed table --}}
                                                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="academic_year_id" value="{{$exam->academic_years_id}}">
                                                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="class_id" value="{{$exam->class_id}}">
                                                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="exam_id" value="{{$exam->id}}">
                                                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="total_grade" value="{{$exam->total_grade}}">
                                                                                            {{-- Ends Import hidden information for database feed table --}}
                                                                                                        <tr>   
                                                                                            <td style="width:15%">
                                                                                                {{$student->name}}
                                                                                            </td>
                                                                                            <span style="display:none">@php $x=0 @endphp </span>


                                                                                            {{-- CREATE THE SUBJECT INPUT FEILD --}}

                                                                                            @foreach ($subjects_name as $subject_name)

                                                                                                {{-- {{$x++}} --}}
                                                                                                <span style="display:none">@php $x++ @endphp </span>
                                                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="student_id" value="{{$student->id}}">  
                                                                                                <td> 
                                                                                                    <label for="validationDefault01" class="text-muted" style="font-size:10px;">{{$subject_name->name}}</label> 
                                                                                                <input type="text" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder=""  required  name="subject_id[]" value="{{$subject_name->id}}">
                                                                                                <input type="number" class="form-control w-100" id="validationDefault01" placeholder=""  required name="{{'grade'.$x}}" value="">
                                                                                                </td>
                                                                                        
                                                                                            @endforeach  

                                                                                            {{-- # CREATE THE SUBJECT INPUT FEILD --}}
                                                                                        
                                                                                        
                                                                                
                                                                                            <td>
                                                                                                <center>
                                                                                                    <label for="validationDefault01" class="text-muted font-weight-bold" style="font-size:12px;">حفظ</label> 
                                                                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save fa-2x"></i></button>   
                                                                                                </center>
                                                                                            </td>
                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                    
                                                                                        </table>
                                                                                    </form> 
                                                @else
                                                
                                                @endif
                                            @endif
                                    @endforeach  

                                {{-- FUNCTION FOR COUNT THE NUMBER OF STUDENT IN THE CLASS, THIS COUNT WILL USED TO MAKE SURE AL
                                        STUDENT RESULT IS ADDED --}}

                                    {{-- @php
                                        $no_students = count($students);
                                        $no_students_in_grades_table = count($student_result);
                                    @endphp


                                
                                    
                                    @if ($no_students_in_grades_table = $no_students )

                                        <div class="alert alert-dark text-center text-dark font-weight-bold" role="alert">
                                            <i class="fas fa-check-square fa-1x"></i> &nbsp; تم إضافة النتيجة لكل طلاب الفصل
                                        </div>
 
                                    @endif
                                    

                                     @php
                                        echo $no_students;
                                        echo $no_students_in_grades_table;
                                     @endphp

                                      --}}
                                {{-- ================================================================= --}}

                                 
                                @endif

                                <br>
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
