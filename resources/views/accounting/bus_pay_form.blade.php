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
                                <td><span class="text-danger font-weight-bold text-danger">&nbsp; إضافة رسوم ترحيل للطالب : {{$student->name}}</span></td>
                               
                                <td><span class="font-weight-bold text-danger float-left">&nbsp; للعام الدراسي : {{$student->academic_years->name}}</span></td>
                                <td><i class="fas fa-2x fa-calendar-alt text-success float-left"></i></td>
                        </tr>
                        <br>
                       
                        </div>
                            <br>
                            <div class="container">
                                {{-- Start of form  --}}
                            <form action="{{route('bus_payment.store')}}" method="POST" target="" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                  
                                <div class="card flex-row flex-wrap bg-white">
                                
                                    <div class="card-footer w-100 text-muted border-top1">
                                            <span class="font-weight-bold fa-1x">
                                                    معلومات الطالب
                                            </span>
                                    </div>
                             
                                                     
                                <div class="card-header border-0 flex-column w-100 bg-white" >                  

                                        

                             <h3 class="text-danger text-right font-weight-bold mb-5">  <i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; آخر تاريخ تسديد رسوم :  </h3>

                             

                                        <div class="form-row">
                                                <div class="col-md-2 mb-3">
                                                        <label for="validationDefault01">رقم التسجيل</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->reg_no}}" readonly required name="">
                                                        <input type="hidden" class="form-control text-danger border border-danger font-weight-bold text-center" id="validationDefault01" readonly value="{{$student->academic_years->id}}" name="academic_year_id" >

                                                </div>

                                                <div class="col-md-4 mb-3">
                                                        <label for="validationDefault01">الإسم بالكامل</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->name}}" readonly required name="std_name">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->reg_no}}" readonly required name="reg_no">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->name}}" readonly required name="">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->id}}" readonly required name="student_id">
                                                </div>


                                                <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">الفصل الدراسي</label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="" value="{{$student->class->name}}" readonly required name="">
                                                        <input type="hidden" class="form-control" id="validationDefault01" placeholder="" value="{{$student->class_id}}" readonly required name="">
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
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="" readonly>{{$student->std_note}}</textarea>
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
                                    
                                            
                                       
                                            <div class="form-row  mt-5 mb-4">

                                             
                                                    
                                                    @include('accounting.dynamic_dependent_bus')
                                                   
                                                   

                                                    <div class="col-md-3 mb-3">
                                                        <label for="validationDefault01">المدفوع *</label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder=""   required name="paid">
                                                    </div>



                                                    <div class="col-md-3 mb-3">
                                                    <label for="validationDefault01">أختر  الشهر <span class="required">*</span> </label>
                                                        <select name='month' class="form-control" data-dependent="month" required>
                                                        <option value=''>--Select Month--</option>
                                                        <option selected value='يناير'> يناير  </option>
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
                                                    

                                            </div>
                    
                                            <div class="form-row">

                                             
 

                                                <div class="col-md-12 mb-12">
                                                        <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="fees_note" placeholder="تخفيضات وغيرها">   لاتوجد </textarea>
                                                        </div>
                                                </div>
                                            </div>
                                                   
                                        <br>
                                        
                                        <center>

                   

                                                        <button type="submit"  class="btn btn-primary"  onclick='return confirm("حفظ ؟")'>حفظ البيانات</button>

                                         
                                        
                                            
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
