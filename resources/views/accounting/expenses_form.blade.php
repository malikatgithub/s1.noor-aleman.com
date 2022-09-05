@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                      {{-- Sesion Error and Success handeler --}}

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <i class="fas fa-check-square fa-1x"></i> &nbsp; {{ session('status') }}
                            </div>
                            @endif

                            @if (Session::has('delete'))

                            <div class="alert alert-danger">
                                <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                            </div>  

                            {{Session::forget('delete')}}
                            @endif


                            @if (Session::has('error'))

                            <div class="alert alert-danger bg-danger text-white">
                                <i class="fas fa-exclamation-triangle fa-1x"></i> &nbsp;  {{Session::get('error')}}
                            </div>  

                            {{Session::forget('error')}}
                            @endif

                            @if (Session::has('success'))

                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>  

                            {{Session::forget('success')}}
                            @endif

                            @if(isset($salary))
                          

                            <div class="card-header border-top1">

                            @if (isset($dept))
                                <span class=" fa-1x font-weight-bold text-dark"> <i class="fas fa-money-bill-alt text-info"></i>  إضافة بيانات سلفية مرتب شهري </span>

                                
                            @else
                                <span class=" fa-1x font-weight-bold text-dark"> <i class="fas fa-money-bill-alt text-info"></i>  إضافة بيانات صرف مرتب شهري </span>
                                
                                <br>
                                <br>


                                <div class="row">

                                    <div class="col-md-5 m-2 shadow p-4 border border-danger border-bottom-0 border-left-0 border-right-0">
                                    <label for="validationDefault01" class="font-weight-bold"  style="font-size:16px">تاريخ آخر 4 سلفيات</label>
                                    <br>
                                  

                                        @if($debt->count() != 0)

                                            <?php $x=0; ?>

                                            @foreach($debt as $debt)

                                                <?php $x=$x+1; ?>

                                                <span class="font-weight-bold text-danger"  style="font-size:14px"> {{ $x }} - <span class='text-dark'> سلفية بقيمة </span> {{ $debt->amount }} &nbsp;  <span class='text-dark'>بتاريخ</span> {{ $debt->date }} </span>
                                                <br>
                                                
                                            @endforeach

                                        @else
                                           <h5 class="text-danger text-center">
                                           لاتوجد سلفيات 
                                           </h5>
                                        @endif

                                  
                                    </div>

                                    <div class="col-md-5 shadow m-2 p-4 border border-danger border-bottom-0 border-left-0 border-right-0">
                                        <label for="validationDefault01" class="font-weight-bold" style="font-size:16px">تاريخ آخر 4 صرفية</label>
                                        <br>

                                        @if($cashing->count() != 0)
                                            <?php $x=0; ?>

                                            @foreach($cashing as $cashing)
                                                <?php $x=$x+1; ?>
                                                <span class=" fa-1x font-weight-bold text-danger"  style="font-size:14px"> {{ $x }} -  <span class='text-dark'> مرتب بتاريخ </span>  {{ $cashing->amount }} <span class='text-dark'>بتاريخ</span> {{ $cashing->date }} </span>
                                                <br>
                                            @endforeach

                                        @else
                                           <h5 class="text-danger text-center">
                                           لاتوجد صرفيات 
                                           </h5>
                                        @endif
                                    </div>
                                </div>
                                
                            @endif
                                </div>
                                    <br>
                                    <div class="container">
                                {{-- Start of form  --}}
                                    <form action="{{route('salary.store')}}" method="POST" enctype="multipart/form-data">
                                        {{@csrf_field()}}
                                        <div class="card flex-row flex-wrap">

                                        

                                        <div class="card-footer w-100 text-muted border-top1">
                                            <h6 class=" font-weight-bold text-dark"> البيانات : </h6>
                                        </div>

                            
                                        <div class="card-header border-0 flex-column w-100" >                                    



                                    <div class="row">

                                            <div class="col-md-6">
                                                    <label for="validationDefault01">رقم المنصرف</label>
                                                    <input  class="form-control" id="validationDefault01" placeholder="auto_generate" readonly required name="exp_no">
                                            </div>

                                            <div class="col-md-6">
                                                    <label for="validationDefault01">التاريخ</label>
                                                    <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="date" value="{{ Carbon\Carbon::now()->toDateString() }}">
                                            </div>

                                         
                                    </div>
            
                                    <div class="row mt-3">

                                            <div class="col-md-6">
                                                    <label for="validationDefault01"> القيمة</label>
                                                    <br>
                                                    <label for="" class="text-danger font-weight-bold">- تأكد من تاريخ اخر سلفية </label>


                                                    @if (isset($dept))
                                                        <input type="number" class="form-control font-weight-bold border-danger" id="validationDefault01" placeholder="" required name="amount" value="">
                                                    @else
                                                        <input type="number" class="form-control text-white font-weight-bold border-0 bg-danger" id="validationDefault01" placeholder="" required name="amount" value="">
                                                    @endif


                                            </div>

                                            <div class="col-md-6">
                                                    @if (isset($dept))
                                                    <label for="validationDefault01">سلفية لصالح</label>

                                                    @else
                                                    <label for="validationDefault01">مرتب لصالح</label>
                               
                                                    @endif
                                                    <input type="text" class="form-control text-danger font-weight-bold mt-4" id="validationDefault01" placeholder=""  required name="expense_owner" value="{{ $info->name }}" readonly>
                                                    @if (isset($teacher_salary))
                                                        <input type="hidden" class="form-control text-danger font-weight-bold mt-3" id="validationDefault01" placeholder=""  required name="teacher_id" value="{{ $info->id }}" readonly>
                                                    @else
                                                        <input type="hidden" class="form-control text-danger font-weight-bold mt-3" id="validationDefault01" placeholder=""  required name="employee_id" value="{{ $info->id }}" readonly>
                                                    @endif
                                            </div>
                                            
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="validationDefault01">ملاحظات</label>
                                            
                                            @if (isset($dept))
                                                <input type="text" class="form-control text-muted" id="validationDefault01" placeholder=""  required name="expense_note" value="عبارة عن سلفية من المرتب الشهري" readonly>
                                                <input type="hidden" class="form-control text-muted" id="validationDefault01" placeholder=""  required name="debt" value="debt">
                                            @else
                                                <input type="text" class="form-control text-muted" id="validationDefault01" placeholder=""  required name="expense_note" value="عبارة عن المرتب الشهري" readonly>
                                                <input type="hidden" class="form-control text-muted" id="validationDefault01" placeholder=""  required name="salary" value="salary">
                                            @endif
                                            
                                        </div>
                                    </div>
                                    
                                        {{-- End of Row of income information --}}
                                    
                                            
                                        </div> 
                                    </div>

                    
                                            <br>
                                            
                                            <center>
                                                <button type="submit" class="btn btn-success btn-sm"  onclick='return confirm("صرف المرتب ؟")'> صرف المرتب </button>
                                            </center>
                                        
                                        </form>
                                        
                                        <br>
                                        <br>
                                </div>

                                @else

                                   




                                    <div class="card-header border-top1">
                                        <span class=" fa-1x font-weight-bold text-dark"> <i class="fas fa-money-bill-alt text-info"></i>  إضافة بيانات منصرف </span>
                                        </div>
                                            <br>
                                            <div class="container">
                                        {{-- Start of form  --}}
                                            <form action="{{route('expense.store')}}" method="POST" enctype="multipart/form-data">
                                                {{@csrf_field()}}
                                                <div class="card flex-row flex-wrap">

                                                

                                        <div class="card-footer w-100 text-muted border-top1">
                                            <h6 class=" font-weight-bold text-dark"> البيانات : </h6>
                                        </div>

                            
                                        <div class="card-header border-0 flex-column w-100" >                                    

                                            
                                    {{-- income information Section --}}

                                    {{-- Row of income information --}}


                                        <div class="row ">

                                                <div class="col-md-6">
                                                        <label for="validationDefault01">رقم المنصرف<span class="required">*</span></label>
                                                        <input  class="form-control" id="validationDefault01" placeholder="auto_generate" readonly required name="exp_no">
                                                </div>

                                                <div class="col-md-6">
                                                        <label for="validationDefault01">التاريخ <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="date">
                                                </div>

                                            
                                        </div>
            
                                        <div class="row mt-3">

                                                <div class="col-md-6">
                                                        <label for="validationDefault01">القيمة <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="" required name="amount" >
                                                </div>

                                                <div class="col-md-6">
                                                        <label for="validationDefault01">منصرف لصالح <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="expense_owner" value="">
                                                </div>
                                                
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label for="validationDefault01">ملاحظات <span class="required">*</span></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="منصرف عبارة عن ..." name="expense_note" required></textarea>
                                            </div>
                                        </div>
                                        
                                            {{-- End of Row of income information --}}
                                        
                                                
                                            </div> 
                                        </div>

                        
                                                <br>
                                                
                                                <center>
                                                    <button type="submit" class="btn btn-success"  onclick='return confirm("حفظ ؟")'>حفظ البيانات</button>
                                                </center>
                                            
                                            </form>
                                            {{-- End of form of student  --}}

                                            <br>
                                            <br>
                                    </div>


                            @endif

                    </div>
    
                    {{-- End of Start of card Div  --}}

            </div>
        </div>
    </div>

   
@endsection
