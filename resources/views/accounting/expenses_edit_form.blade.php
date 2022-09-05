@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">

                        <div class="card-header border-top1">
                                <span class=" fa-1x font-weight-bold text-dark"> <i class="fas fa-money-bill-alt text-info fa-2x pt-2"></i>  إضافة بيانات منصرف </span>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('expense.update',['id' => $expense->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">

                                   

                                    <div class="card-footer w-100 text-muted border-top1">
                                           <h6 class=" font-weight-bold text-dark"> البيانات : </h6>
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- income information Section --}}

                        {{-- Row of income information --}}


                                        <div class="row ">

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">رقم المنصرف<span class="required">*</span></label>
                                                        <input  class="form-control" id="validationDefault01" placeholder="auto_generate" readonly required value="{{$expense->exp_no}}" name="exp_no">
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">التاريخ <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="date" value="{{$expense->date}}">
                                                </div>

                                             
                                        </div>
                
                                        <div class="row mt-3">

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">القيمة <span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$expense->amount}}" required name="amount" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">منصرف لصالح <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="expense_owner" value="{{$expense->expense_owner}}">
                                                </div>
                                                
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12 mb-12">
                                                <label for="validationDefault01">ملاحظات <span class="required">*</span></label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="منصرف عبارة عن ..." name="expense_note" required>{{$expense->expense_note}}</textarea>
                                            </div>
                                        </div>
                                        
                        {{-- End of Row of income information --}}
                                 
                                        
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
