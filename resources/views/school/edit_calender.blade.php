@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">

                       

                    
                        <div class="card-header border-top1">
                          تعديل بيانات لتقويم دراسي 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('calender.update',['id' => $calender->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1 font-weight-bold">
                                            بيانات التقويم
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- class information Section --}}

                        {{-- Row of class information --}}


                                        <div class="row ">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01"> تقويم للعام <span class="required">*</span> </label>
                                                        <input type="text" readonly class="form-control bg-white border-danger font-weight-bold text-danger" id="validationDefault01" placeholder=""  required name="" value="{{$calender->academic_years->name}}">
                                                        <input type="hidden" readonly class="form-control bg-white border-danger font-weight-bold text-danger" id="validationDefault01" placeholder=""  required name="academic_year_id" value="{{$calender->academic_years_id}}">
                                                </div>
                
                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">الحدث <span class="required">*</span> </label>
                                                    <input type="text"  class="form-control" id="validationDefault01" placeholder=""  required name="event" value="{{$calender->event}}">
                                                 </div>
                                                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">بدايةالحدث <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$calender->start_date}}" required name="start_date" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">نهاية الحدث <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$calender->end_date}}" required name="end_date" >
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01"> ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="event_note">{{$calender->event_note}}</textarea>
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
