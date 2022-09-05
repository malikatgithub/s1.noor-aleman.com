@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11 text-right font-weight-light">

            {{-- Start of card Div --}}

            <div class="card mb-3">

                <div class="card-header border-top1">

                    <h6 class="font-weight-bold text-dark"> 
                        <i class="fas fa-file-alt text-info"></i>&nbsp;  نافذة تقرير المنصرفات  
                    </h6>

                </div>
                <br>

                <div class="container">
                    <label for="validationDefault01" class=" font-weight-bold">طباعة تقارير المنصرفات في تاريخ معين </label>
                    <hr>
                    <div class="mt-2">
                        <form action="{{route('expense.report_print')}}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                        
                            <div class="row container">
                                    <label for="validationDefault01" class=" font-weight-bold">التاريخ </label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="date">
                                    </div>
                                    <div class="col">
                                            <input type="submit" class="btn btn-success text-white p-2 font-weight-bold ml-2" name="show" value="عرض الخزينة">
                                            <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold " name="print" value="طباعة بيانات الخزينة">
                                    </div>
                            </div>
    
                        </form>
                    </div>
                   
           
                
                        <br>
        
                    </div>
                </div>


                <div class="card">

                        <div class="card-header border-top1">
        
                            <h6 class="font-weight-bold text-dark"> 
                                <i class="fas fa-file-alt text-info"></i>&nbsp;  نافذة تقرير المنصرفات  
                            </h6>
        
                        </div>
                        <br>
        
                        <div class="container">
                            <label for="validationDefault01" class=" font-weight-bold"> طباعة تقارير المنصرفات في الفترة معينة</label>
                            <hr>
                        
                            <div class="mt-2">
                                <form action="{{route('expense.report_print')}}" method="POST" enctype="multipart/form-data">
                                    {{@csrf_field()}}
                                    <div class="row container mt-4">
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
                                                    <input type="submit" class="btn btn-success text-white p-2 font-weight-bold" name="show" value="عرض المنصرفات">
                                                    <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold " name="print" value="طباعة بيانات المنصرفات">
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