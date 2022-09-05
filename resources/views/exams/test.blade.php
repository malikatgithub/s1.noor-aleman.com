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
                          <h5 class="text-muted font-weight-bold"><i class="fas fa-plus-circle"></i>&nbsp; إضافة درجات  الطلاب </h5>
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
                                                        <td>العام الدراسي</td>
                                                        <td>الفصل الدراسي</td>
                                                        <td>الدرجة الكاملة</td>
                                                        <td>بداية الإمتحان</td>
                                                        <td>نهاية الامتحان</td>
                                                      </tr>
                                                 </thead>
                                                 
                                                 <tbody class="text-right">
                                                        <td>1</td>
                                                        <td>{{$exam->name}}</td>
                                                        <td>{{$exam->academic_year}}</td>
                                                        <td>{{$exam->class->name}}</td>
                                                        <td>{{$exam->total_grade}}</td>
                                                        <td>{{$exam->start_date}}</td>
                                                        <td>{{$exam->end_date}}</td>
                                                       
                                                 </tbody>
                                          
                                            </table>
                         
                                    <div class="card-header border-0 flex-column w-100" >                                    
                                        
                                    </div>


                                 
        
                                    @foreach ($student_result as $added)
                                        
                                    @endforeach
                                                @foreach ($students as $student)
                                                <form action="{{route('grades.store')}}" method="POST" enctype="multipart/form-data">
                                                    {{@csrf_field()}}
                    
                                                
                                                    <table class="table table-striped table-bordered text-right" >
                                                        
                                                            <tbody class="text-right">
                                                                        
                                                                
                                                            {{-- Import hidden information for database feed table --}}
                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="academic_year" value="{{$exam->academic_year}}">
                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="class_id" value="{{$exam->class_id}}">
                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="exam_id" value="{{$exam->id}}">
                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="total_grade" value="{{$exam->total_grade}}">
                                                            {{-- Ends Import hidden information for database feed table --}}
                                                                        <tr>   
                                                            <td style="width:15%">
                                                                {{$student->name}}
                                                            </td>
                                                            <span style="display:none">@php $x=0 @endphp </span>
                                                            @foreach ($subjects_name as $subject_name)
                                                            {{-- {{$x++}} --}}
                                                            <span style="display:none">@php $x++ @endphp </span>
                                                            <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder="" readonly required name="student_id" value="{{$student->id}}">  
                                                            <td> 
                                                                <label for="validationDefault01" class="text-muted" style="font-size:10px;">{{$subject_name->name}}</label> 
                                                                 {{-- <input type="text" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder=""  required  readonly name="" value="{{$subject_name->name}}">                                                         --}}
                                                                <input type="hidden" class="form-control p-0 m-0 border-0 " style="font-size:10px; background:inherit" id="validationDefault01" placeholder=""  required  name="subject_id[]" value="{{$subject_name->id}}">
                                                                <input type="text" class="form-control w-50" id="validationDefault01" placeholder=""  required name="{{'grade'.$x}}" value="">
                                                            </td>
                                                            
                                                            @endforeach    
                                                       
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
                                                    @endforeach 
                                                
                                          
                                        

                                        <br>
                                        
                                        
                                       
                                  
           

                                    <br>
                                    <br>
                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
