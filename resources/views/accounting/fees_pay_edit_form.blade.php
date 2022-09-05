@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">


                 {{-- Session parameter Success and fail or Error --}}

                        @if (session('status'))
                        <div class="alert alert-success m-3" role="alert">
                        {{ session('status') }}
                        </div>
                        @endif

                        @if (Session::has('delete'))

                        <div class="alert alert-danger m-3">
                                <i class="fas fa-check-square fa-1x"></i>&nbsp;  {{Session::get('delete')}}
                        </div>  

                        {{Session::forget('delete')}}
                        @endif

                        @if (Session::has('success m-3'))

                        <div class="alert alert-success"> 
                                <i class="fas fa-check-square fa-1x"></i>&nbsp; {{Session::get('success')}}
                        </div>  

                        {{Session::forget('success')}}
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger bg-danger m-3 text-white"><i class="fas fa-exclamation-circle fa-1x"></i> &nbsp; {{ session('error') }}</div>
                        @endif

                 {{-- End of Session parameter Success and fail or Error --}}


                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                        <h6 class="font-weight-bold text-dark"> <i class="fas  fa-edit text-success"></i><span class="text-danger">&nbsp; تعديل بيانات إيصال : {{$fees->bill_no}}</span></h6>
                        </div>
                            <br>
                            <div class="container">
                                {{-- Start of form  --}}
                            <form action="{{route('fees.update',['id' => $fees->id])}}" method="POST" target="" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                  
                                    <br>
                                    
                                <div class="card flex-row card-header flex-column flex-wrap  w-100 bg-white">
                                    <div class="card-footer w-100 text-muted border-top1 border-bottom1">
                                            <span class="font-weight-bold fa-1x">
                                                    البيانات المالية
                                            </span>generate
                                    
                                            
                                       
                                            <div class="form-row m-3 p-3">generate

                                                {{-- ==== DAYNAMIC METHOD FOR CHECK THE EXISITANCE OF PAIED FEES ==== --}}


                                                {{-- ==== END DAYNAMIC METHOD FOR CHECK THE EXISITANCE OF PAIED FEES ==== --}}
                                <div class=" border-0 " >   
                                                <div class="row">
                                                    <div class="col-md-3 mb-3 ">
                                                            <label for="validationDefault01">رقم الايصال <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$fees->bill_no}}" readonly required name="bill_no">
                                                            <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$fees->reg_no}}" readonly required name="reg_no">
                                                    </div>
                    
                    
                                                    <div class="col-md-3 mb-3">
                                                            <label for="validationDefault01">التاريخ <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{$fees->date}}"  required name="date">
                                                    </div>
                                                    
                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">أختر نوع القسط <span class="required">*</span> </label>
                                                        <select name="fees_type_id"  class="form-control input-md dynamic"  required>
                                                                        
                                                                @foreach ($fees_types as $fees_type)

                                                                @if ($fees->fees_types_id == $fees_type->id and $fees_type->class_id == $class_id)
                                                                        <option value="{{$fees_type->id}}" selected>{{$fees_type->name}}</option>
                                                                @endif

                                                                @if ($fees->fees_types_id  != $fees_type->id and $fees_type->class_id == $class_id)
                                                                        <option value="{{$fees_type->id}}">{{$fees_type->name}}</option>
                                                                @endif

                                                        @endforeach
                                                        
                                                        </select>
                                                </div>
                
                                            </div>
                    
                                            <div class="form-row">

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01" class="text-danger font-weight-bold"> المبلغ المدفوع <span class="required">*</span></label>
                                                        <input type="number" class="form-control bg-white text-danger font-weight-bold border border-danger" id="validationDefault01" placeholder="" value="{{$fees->paid}}"  required name="paid">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01" class="font-weight-bold"> تخفيض<span class="required">*</span></label>
                                                        <input type="number" class="form-control bg-white text-info font-weight-bold" id="validationDefault01" placeholder="" value="{{$fees->discount}}"  required name="discount">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">طريقة الدفع <span class="required">*</span> </label>
                                                        <select class="form-control form-control-md" name="paid_method">
                                                                @php
                                                                    if($fees->paid_method == 'كاش'){
                                                                            echo '<option value="كاش" selected>كاش</option>
                                                                                <option value="شيك">شيك</option>
                                                                                <option value="بنك">بنك</option>';
                                                                    }

                                                                    if($fees->paid_method == 'شيك'){
                                                                            echo '<option value="كاش">كاش</option>
                                                                                <option value="شيك" selected>شيك</option>
                                                                                <option value="بنك">بنك</option>';
                                                                    }

                                                                    if($fees->paid_method == 'بنك'){
                                                                            echo '<option value="كاش">كاش</option>
                                                                                <option value="شيك">شيك</option>
                                                                                <option value="بنك" selected>بنك</option>';
                                                                    }
                                                                    
                                                                    
                                                                    
                                                                @endphp
                                                                
                                                        </select>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlFile1">ارفق المستند</label>
                                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="doc">
                                                        </div>
                                                </div>
 

                                                <div class="col-md-12 mb-12">
                                                        <div class="form-group">
                                                                @php
                                                                    
                                                                        if ($fees->fees_note = 'NULL')
                                                                        {
                                                                        $fees_note = 'لاتوجد ملاحظات';
                                                                        }
                                                                        
                                                                        else {
                                                                        $fees_note = $fees_note->fees_note;
                                                                        }
                                                                @endphp

                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="fees_note" placeholder="تخفيضات وغيرها">{{$fees_note}}</textarea>
                                                        </div>
                                                </div>
                                            </div>
                                                   
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-primary" onclick='return confirm("تعديل ؟")'>حفظ البيانات</button>
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
    <br>
   

   
@endsection
