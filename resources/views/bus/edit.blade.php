@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')

    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                          إضافة بيانات فصل 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('bus.update', ['id' => $bus->id ])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top2">
                                    : {{$bus->name}} بيانات الترحيل
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- Student information Section --}}

                        {{-- Row of student information --}}


                                        <div class="row ">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">إسم الترحيل <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$bus->name}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01"> مبلغ الترحيل<span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$bus->fees}}" required name="fees" >
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01">ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="note">{{$bus->note}}</textarea>
                                                        </div>
                                                
                             
                                                
                                        </div>
                                        
                
                                 
                                        
                                    </div>
                                </div>

                
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
