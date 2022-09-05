@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-right">

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
                                    <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                                </div>  

                            {{Session::forget('delete')}}
                            @endif

                            @if (Session::has('success'))

                            <div class="alert alert-success"> 
                                {{Session::get('success')}}
                            </div>  

                            {{Session::forget('success')}}
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                            @endif

                        {{-- End of Session parameter Success and fail or Error --}}

                    
                        <div class="card-header border-top1">
                          إضافة بيانات لتقويم دراسي 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('calender.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1">
                                            بيانات التقويم
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- class information Section --}}

                        {{-- Row of class information --}}


                                        <div class="row ">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01"> تقويم للعام <span class="required">*</span> </label>
                                                        <input type="text" readonly class="form-control border-danger bg-white font-weight-bold text-danger" id="validationDefault01" placeholder=""  required name="" value="{{$academic_year_name}}">
                                                        <input type="hidden" readonly class="form-control border-danger bg-white font-weight-bold text-danger" id="validationDefault01" placeholder=""  required name="academic_year_id" value="{{$academic_year_id}}">
                                                </div>
                
                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">الحدث<span class="required">*</span> </label>
                                                    <input type="text"  class="form-control" id="validationDefault01" placeholder=""  required name="event" value="">
                                                 </div>
                                                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">بدايةالحدث <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="start_date" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">نهاية الحدث <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="end_date" >
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01">ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="event_note"></textarea>
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
