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
                        <i class="fas fa-file-alt text-info pt-"></i>&nbsp;  نافذة تقارير الخزينة  
                    </h6>

                </div>
                <br>

               

                <div class="container">
                    <label for="validationDefault01" class=" font-weight-bold"> تقرير رسوم الترحيل </label>
                    <div class="mt-3">
                        <form action="{{route('bus.report_print')}}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                        

                            <div class="row container">

                            
                                <div class="col-md-3 mb-3">
                                <label for="validationDefault01">أختر الشهر <span class="required">*</span> </label>
                                    <select name='month' class="form-control" required>
                                    <option value=''>--Select Month--</option>
                                    <option selected value='يناير'> يناير </option>
                                    <option value='فبراير'>فبراير</option>
                                    <option value='مارس'>مارس</option>
                                    <option value='أبريل'>أبريل</option>
                                    <option value='مايو'>مايو</option>
                                    <option value='يونيو'>يونيو</option>
                                    <option value='يوليو'>يوليو</option>
                                    <option value='أغسطس'>أغسطس</option>
                                    <option value='سبتمبر'>سبتمبر</option>
                                    <option value='أكتوبر'>أكتوبر</option>
                                    <option value='نوفمبر'>نوفمبر</option>
                                    <option value='ديسمبر'>ديسمبر</option>
                                    </select> 
                                </div>
                            
                                <div class="col-md-3 mb-3">
                                <label for="validationDefault01">أختر  الترحيل <span class="required">*</span> </label>
                                    <select name='bus_id' class="form-control" required>
                                    @foreach($buses as $bus)
                                        <option value="{{$bus->id}}">{{$bus->name}}</option>
                                    @endforeach
                                    </select> 
                                </div>

                                
                                    <div class="col mt-4 pt-2">
                                            <input type="submit" class="btn btn-success text-white p-2 font-weight-bold ml-2" name="show" value="عرض بيانات الترحيل">
                                            <input type="submit" class="btn btn-primary text-white p-2 font-weight-bold " name="print" value="طباعة بيانات الترحيل ">
                                            
                                    </div>
                            </div>
    
                        </form>
                    </div>
                
        
                
                        <br>
        
                </div>

                <br>
                <br>
                    
        


            </div>

            </div>

            
        </div>

        {{-- End of Start of card Div --}}

    </div>
</div>
</div>

@endsection