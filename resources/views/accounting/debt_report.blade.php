@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11 text-right font-weight-light">

                <div class="card">
                        <div class="card-header border-top1">
                            <h6 class="font-weight-bold text-dark"> 
                                <i class="fas fa-file-alt text-info"></i>&nbsp;  نافذة تقرير السلفيات   
                            </h6>
        
                        </div>
                        <br>
        
                        <div class="container">
                            <label for="validationDefault01" class=" font-weight-bold"> طباعة تقارير السلفيات في الفترة معينة</label>
                            <hr>
                        
                            <div class="">
                                <form action="{{route('debt.report_print')}}" method="POST" enctype="multipart/form-data">
                                    {{@csrf_field()}}


                                    <label for="validationDefault01" class=" font-weight-bold"> إختر نوع التقرير </label>

                                    
                                        <div class="row mr-1 mb-4">
                                        <div class="form-check">
                                          

                                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" checked value="teacher">
                                            <label class="form-check-label mr-4" for="flexRadioDefault1">
                                                تقرير أساتذة
                                            </label>
                                        
                                        </div>
                                        <div class="form-check">


                                        <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2"  value="employee">
                                        <label class="form-check-label mr-4" for="flexRadioDefault2">
                                        تقرير موظفين
                                        </label>


                                         
                                        </div>
                                        </div>
                                   


                                    


                                    <div class="row container mt-5">
                                            <label for="validationDefault01" class=" font-weight-bold">التاريخ </label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="start_date">
                                            </div>
            
                                            <div class="col-md-1 text-center">
                                                    <span class="font-weight-bold">ـــ</span>
                                                </div>
            
                                            <div class="col-md-4">
                                                    <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="end_date">
                                                </div>
                                           <div class="row ">
                                               
                                                <div class="col-md-12 mt-3 ">
                                                    <input type="submit" class="btn btn-success text-white p-2 font-weight-bold" name="show" value="عرض السلفيات">
                                                    <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold " name="print" value="طباعة بيانات السلفيات">
                                                </div>

                                           </div>
                                    </div>
            
                                </form>
                            </div>
                        
                                <br>
                
                            </div>
                        </div>


            </div>

            </div>

            
        </div>

        {{-- End of Start of card Div --}}

    </div>
</div>
</div>

@endsection