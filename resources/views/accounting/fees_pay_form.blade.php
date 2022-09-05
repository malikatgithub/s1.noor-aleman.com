@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">

                {{-- Sesion Error and Success handeler --}}

                @if (session('status'))
                <div class="alert alert-success m-3" role="alert">
                <i class="fas fa-check-square fa-1x"></i> &nbsp; {{ session('status') }}
                </div>
                @endif

                @if (Session::has('delete'))

                <div class="alert alert-danger m-3">
                <i class="fas fa-check-square fa-1x"></i> &nbsp;  {{Session::get('delete')}}
                </div>  

                {{Session::forget('delete')}}
                @endif


                @if (Session::has('error'))

                <div class="alert alert-danger m-3 bg-danger text-white">
                <i class="fas fa-exclamation-triangle fa-1x"></i> &nbsp;  {{Session::get('error')}}
                </div>  

                {{Session::forget('error')}}
                @endif

                @if (Session::has('success'))

                <div class="alert alert-success m-3">
                {{Session::get('success')}}
                </div>  

                {{Session::forget('success')}}
                @endif

                {{-- Sesion Error and Success handeler --}}


                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1">
                        <tr>
                                <td><i class="fas fa-2x fa-hand-holding-usd text-success"></i></td>
                                <td><span class="text-danger font-weight-bold text-danger">&nbsp; إضافة رسوم مالية للطالب : {{$student->name}}</span></td>
                               
                                <td><span class="font-weight-bold text-danger float-left">&nbsp; للعام الدراسي : {{$student->academic_years->name}}</span></td>
                                <td><i class="fas fa-2x fa-calendar-alt text-success float-left"></i></td>
                        </tr>
                        <br>
                       
                        </div>
                            <br>
                            <div class="container">
                                {{-- Start of form  --}}
                            <form action="{{route('fees.store')}}" method="POST" target="" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                  
                                <div class="card flex-row flex-wrap bg-white">
                                
                                    <div class="card-footer w-100 text-muted border-top1">
                                            <span class="font-weight-bold fa-1x">
                                                    معلومات الطالب
                                            </span>
                                    </div>
                             
                                                     
                                <div class="card-header border-0 flex-column w-100 bg-white" >                  

                                        

                                @php

                                $x = 0;
                                foreach ($fees_types_id as $paid)
                                {
                                        $x= $x+(int)$paid->paid;
                                }
                               
                                
                                $remain = $student->fees-$x;


                                if( $remain != 0)
                                {
                                       

                                }


                                else{

                                        echo '<h2 class="text-danger text-center font-weight-bold mb-5">  <i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; تم تسديد كل المبلغ المطلوب</h2>';

                                }
                                @endphp


                                        <div class="form-row">
                                                <div class="col-md-2 mb-3">
                                                        <label for="validationDefault01">رقم التسجيل</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->reg_no}}" readonly required name="">
                                                        <input type="hidden" class="form-control text-danger border border-danger font-weight-bold text-center" id="validationDefault01" readonly value="{{$student->academic_years->id}}" name="academic_year_id" >

                                                </div>

                                                <div class="col-md-4 mb-3">
                                                        <label for="validationDefault01">الإسم بالكامل</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->name}}" readonly required name="">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->reg_no}}" readonly required name="reg_no">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->name}}" readonly required name="student_name">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->id}}" readonly required name="student_id">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الفصل الدراسي</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->class->name}}" readonly required name="class_name">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->class_id}}" readonly required name="class_id">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الجنسية</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->nationality}}" readonly required name="">
                                                </div>
                                
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12 mb-12">
                                                    <div class="form-group">
                                                            <label for="exampleFormControlTextarea1">ملاحظات تخفيضات مالية و غيرها</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="" readonly> {{$student->fees_note}} </textarea>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                
                                    <br>
                                    
                                <div class="card flex-row flex-wrap bg-white">
                                    <div class="card-footer w-100 text-muted border-top1 border-bottom1">
                                            <span class="font-weight-bold fa-1x">
                                                    البيانات المالية
                                            </span>
                                    
                                            
                                       
                                            <div class="form-row m-3 p-3">

                                                {{-- ==== DAYNAMIC METHOD FOR CHECK THE EXISITANCE OF PAIED FEES ==== --}}

                                                <div class="col-md-3 mb-3">

                                                        <label for="validationDefault01" class="font-weight-bold text-primary"><i class="fas fa-file-invoice-dollar"></i>&nbsp; إجمالي المطلوب</label>
                                                        
                                                                @php 
                                                                        echo "<h5 class='text-danger font-weight-bold'> <i class='fas fa-equals fa-1x'></i>&nbsp;$student->fees</h5>" ;
                                                                @endphp
                                                                
                                                   
                                                                
                                                </div>


                                                <div class="col-md-3 mb-3">

                                                        <label for="validationDefault01" class="font-weight-bold text-primary"><i class="fas fa-file-invoice-dollar"></i>&nbsp; الأقساط المدفوعه</label>
                                                        
                                                        @if ($fees_types_id->isEmpty())
                                                                <h6 class="text-primary font-weight-bold">  <i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; لاتوجد اي أقساط مسددة</h6>
                                                                
                                                        @else

                                                                @php $x=0 @endphp
                                                                @foreach ($fees_types_id as $fees_id)
                                                                       
                                                                        @foreach ($fees_types as $names)
                                                                                @if ($fees_id->fees_types_id == $names->id)
                                                                                <br>
                                                                                @php $x++; echo "$x - " @endphp
                                                                                {{$names->name}}
                                                                                @else

                                                                                @endif
                                                                        @endforeach
                                                                @endforeach
                                                                
                                                        @endif
                                                       
                                                </div>
                                               

                                                <div class="col-md-3 mb-3">

                                                                <label for="validationDefault01" class="font-weight-bold text-primary"><i class="fas fa-file-invoice-dollar"></i>&nbsp; إجمالي المدفوع</label>
                                                                
                                                                @if ($fees_types_id->isEmpty())
                                                                      
                                                                @else
                                                                       
                                                                        @php $x=0 @endphp

                                                                        @foreach ($fees_types_id as $paid)
                                                                                @php $x= $x+(int)$paid->paid @endphp
                                                                        @endforeach
                                                                                 
                                                                                @php 
                                                                                       
                                                                                        echo "<h5 class='text-danger font-weight-bold'> <i class='fas fa-equals fa-1x'></i>&nbsp;$x</h5>" ;
                                                                                @endphp
                                                                      
                                                                        
                                                                @endif
                                                               
                                                </div>

                                                <div class="col-md-3 mb-3">

                                                        <label for="validationDefault01" class="font-weight-bold text-primary"><i class="fas fa-file-invoice-dollar"></i>&nbsp; إجمالي المتبقي</label>
                                                               
                                                                @php $x=0 @endphp

                                                                @foreach ($fees_types_id as $paid)
                                                                        @php

                                                                      
                                                                         $x= $x+(int)$paid->paid;

                                                                        @endphp
                                                                @endforeach
                                                                
                                                                @php 
                                                                
                                                                        $remain = $student->fees-$x;
                                                                        echo "<h5 class='text-danger font-weight-bold'> <i class='fas fa-equals fa-1x'></i>&nbsp;$remain</h5>" ;
                                                                @endphp
                                                                      
                                                   
                                                                 
                                                </div>

                                        </div>
                                </div>
                                                
                                                

                                                {{-- ==== END DAYNAMIC METHOD FOR CHECK THE EXISITANCE OF PAIED FEES ==== --}}
                                <div class="card-header border-0 flex-column w-100 bg-white" >   
                                                <div class="row">
                                                    <div class="col-md-3 mb-3 ">
                                                            <label for="validationDefault01">رقم الايصال <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="validationDefault01" placeholder="auto-generate" value="" readonly required name="bill_no">
                                                    </div>
                    
                    
                                                    <div class="col-md-3 mb-3">
                                                            <label for="validationDefault01">التاريخ <span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder=""  required name="date">
                                                    </div>
                                                    
                                                    @include('accounting.dynamic_dependent_fees')
                                                   
                                                    
                
                                            </div>
                    
                                            <div class="form-row">

                                                <div class="col-md-3 mb-3">

                                                        @php

                                                        if( $remain != 0 )
                                                        {
                                                                echo ' <label for="validationDefault01" class="text-danger font-weight-bold"> المبلغ المدفوع <span class="required">*</span></label>
                                                                <input type="number" class="form-control bg-white text-danger font-weight-bold border border-danger" id="validationDefault01" placeholder="" value=""  required name="paid">';

                                                        }

                                                
                                                        else{

                                                                echo '<h6 class="text-danger font-weight-bold mt-4">  <i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; تم تسديد كل المبلغ المطلوب</h6>';

                                                        }
                                                        @endphp
                                                        
                                                       
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01" class="font-weight-bold"> تخفيض<span class="required">*</span></label>
                                                        <input type="number" class="form-control bg-white text-info font-weight-bold" id="validationDefault01" placeholder="" value="0"  required name="discount">
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">طريقة الدفع <span class="required">*</span> </label>
                                                        <select class="form-control form-control-md" name="paid_method">
                                                                <option value="كاش">كاش</option>
                                                                <option value="شيك">شيك</option>
                                                                <option value="بنك">بنك</option>
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
                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="fees_note" placeholder="تخفيضات وغيرها"></textarea>
                                                        </div>
                                                </div>
                                            </div>
                                                   
                                        <br>
                                        
                                        <center>

                                                

                                            @if ($remain != 0  )
                                               
                                                        <button type="submit"  class="btn btn-primary"  onclick='return confirm("حفظ ؟")'>  <i class="fa fa-save"></i> حفظ البيانات </button>
                                                @else

                                                        <button type="submit" disabled class="btn btn-danger"  onclick='return confirm("حفظ ؟")'> <i class="fa fa-ban"></i> حفظ البيانات </button>


                                                
                                           @endif
                                           
                                            
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
