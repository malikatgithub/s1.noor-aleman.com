
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

                            <div class="alert alert-danger bg-danger text-white m-3">
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

                        <div class="card-header border-top1">
                                <span class=" fa-1x font-weight-bold text-يشقن"><i class="fas fa-file-invoice-dollar"></i>&nbsp; تعديل بيانات الأقساط </span>
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('fees_type.update', ['id' => $fees->id])}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">

                                   

                                    <div class="card-footer w-100 text-muted border-top2">
                                            البيانات
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- income information Section --}}

                        {{-- Row of income information --}}


                                        <div class="row ">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">إسم القسط <span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder=""  required name="name" value="{{$fees->name}}">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">القيمة<span class="required">*</span></label>
                                                        <input type="number" class="form-control" id="validationDefault01" placeholder="" value="{{$fees->amount}}" required name="amount" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">الفصل الدراسي <span class="required">*</span> </label>
                                                        <select class="form-control form-control-l" name="class_id">

                                                                @foreach ($classes as $class)
                                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                                @endforeach
                                                
                                                        </select>
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                    <label for="validationDefault01">تاريخ القصد<span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="validationDefault01" placeholder="" value="{{ $fees->date }}" required name="date" >
                                                </div>

                                                <div class="col-md-12 mb-12">
                                                                <label for="validationDefault01">ملاحظات </label>
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="" name="fees_note">{{$fees->fees_note}}</textarea>
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
