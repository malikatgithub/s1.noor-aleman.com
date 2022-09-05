@extends('layouts.css_main')

@section('body')

@include('layouts.student_nav')

@include('layouts.top-menu')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 text-right mt-4 mb-4">

                {{-- Start of card Div  --}}

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{ session('status') }}
                </div>
                @endif


                @if (Session::has('delete'))

                <div class="alert alert-danger">
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                </div>  

                {{Session::forget('delete')}}
                @endif
                
                @if (Session::has('success'))

                <div class="alert alert-success">
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('success')}}
                </div>  

                {{Session::forget('success')}}
                @endif

                <div class="card  border-top1">
                    
                    <div class="card-header">
                        <h6> التقارير السريعة عن طلاب فصل </h6>
                        
                    </div>
                        <br>
                        <div class="container">  
                            <div class="row mb-3">
                                <div class="col-md-12">
                                        <form  action="{{route('show_class_report_student_name')}}" method="POST" target="" enctype="multipart/form-data">
                                            {{@csrf_field()}}
                                            <label for="validationDefault01" class="font-weight-bold">الصف الدراسي</label>
                                            <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$academic_year_id}}" required name="academic_year_id">
                                            <select name="class_id" id="class_id" class="form-control input-md dynamic" required>
                                                   
                                                    <option value=""></option>
                                                    @foreach($classes as $class)
                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endforeach

                                                     
                                            </select>

                                            <br>
                                        
                                            <center>
                                                    <input type="submit" class="btn btn-success text-white p-2 font-weight-bold ml-2" name="show" value="عرض القائمة">
                                                    <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold" name="print" value="طباعة القائمة">
                                            </center>
                                       
                                        </form>
                                    </div>

                                    
                                </div>
                             </div>
                        </div>



                        <div class="card mt-4 border-top1">
                    
                            <div class="card-header">
                                <h6>  التقارير السريعة عن طلاب فصل </h6>
                                
                            </div>
                                <br>
                                <div class="container">  
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                                <form  action="{{route('show_class_report_students_attend')}}" method="POST" target="" enctype="multipart/form-data">
                                                    {{@csrf_field()}}
                                                    <label for="validationDefault01" class="font-weight-bold">دفتر الحضور للطلاب</label>
                                                    <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$academic_year_id}}" required name="academic_year_id">
                                                    <select name="class_id" id="class_id" class="form-control input-md dynamic" required>
                                                           
                                                            <option value=""></option>
                                                            @foreach($classes as $class)
                                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endforeach
        
                                                             
                                                    </select>
        
                                                    <br>
                                                
                                                    <center>
                                                            <input type="submit" class="btn btn-success text-white p-2 font-weight-bold ml-2" name="show" value="عرض القائمة">
                                                            <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold" name="print" value="طباعة القائمة">
                                                    </center>
                                               
                                                </form>
                                            </div>
        
                                            
                                        </div>
                                     </div>
                                </div>

                </div>

                {{-- End of Start of card Div  --}}


                    
                

            </div>
        </div>
    </div>


 
   
@endsection
