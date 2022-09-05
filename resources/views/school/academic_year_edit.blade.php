
@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')

    

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
            </div>
        </div>
    

         <div class="row justify-content-center">
            <div class="col-lg-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1 font-weight-bold text-dark">
                          إضافة بيانات العام الدراسي 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('academic_year.update_info',['id' => $academic_year->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-header w-100 text-muted border-top1">
                                           <h6 class="text-dark font-weight-bold">  - بيانات العام </h6>
                                    </div>

                                    <div class="card-body border-0 flex-column w-100" >                                    

                                        
                        {{-- academic_year information Section --}}

                        {{-- Row of academic_year information --}}


                                        <div class="row pb-5">
                                            
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">إسم العام الدراسي<span class="required">*</span> </label>
                                                    <input type="text" class="form-control" id="validationDefault01" placeholder="مثال: 2019- 2020"  required name="name" value="{{$academic_year->name}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">بداية العام الدراسي<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$academic_year->start_date}}" required name="start_date" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">نهاية العام الدراسي<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$academic_year->end_date}}" required name="end_date" >
                                                </div>
                                                
                                        </div>
                                        
                        {{-- End of Row of academic_year information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of student  --}}
                                    <br>
                                </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

                  
            </div>
        </div>
    </div>

   
@endsection
