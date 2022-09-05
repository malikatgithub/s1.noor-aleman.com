@extends('layouts.css_main')

@section('body')

@include('layouts.academicNav')

@include('layouts.top-menu')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-right">
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

                {{-- Sesion Error and Success handeler --}}
            </div>
        </div>
    

         <div class="row justify-content-center">
            <div class="col-lg-12 text-right">

                 {{-- Start of card Div  --}}

                 <div class="card border-top-0">
                        <div class="card-header border-top1 font-weight-bold text-dark">
                          - إضافة بيانات العام الدراسي 
                        </div>
                            <br>
                            <div class="container">
                {{-- Start of form  --}}
                            <form action="{{route('academic_year.store')}}" method="POST" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card flex-row flex-wrap">
                                      
                                    <div class="card-footer w-100 text-muted border-top1">
                                           <h6 class="text-dark font-weight-bold">  - بيانات العام </h6>
                                    </div>

                         
                                    <div class="card-header border-0 flex-column w-100" >                                    

                                        
                        {{-- academic_year information Section --}}

                        {{-- Row of academic_year information --}}


                                        <div class="row pb-5">
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">إسم العام الدراسي<span class="required">*</span> </label>
                                                        <input type="text" class="form-control" id="validationDefault01" placeholder="مثال: 2019- 2020"  required name="name" value="">
                                                </div>
                
                
                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">بداية العام الدراسي<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="start_date" >
                                                </div>

                                                <div class="col-md-6 mb-6">
                                                        <label for="validationDefault01">نهاية العام الدراسي<span class="required">*</span></label>
                                                        <input type="date" class="form-control" id="validationDefault01" placeholder="" value="" required name="end_date" >
                                                </div>
                                                
                             
                                                
                                        </div>
                                        
                        {{-- End of Row of academic_year information --}}
                                 
                                        
                                    </div>
                                </div>

                
                                        <br>
                                        
                                        <center>
                                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                        </center>
                                       
                                    </form>
                                    {{-- End of form of student  --}}
                                    <br>
                                    <div class="table-responsive mb-5">
                                            <h6 align="right" class="mr-1 font-weight-bold"> - الاعوام الدراسية : <span id="total_records"></span></h6>
                                            <table class="table table-striped table-bordered text-right" >
                                            <br>
                                             <thead >
                                                <tr class="font-weight-bold">
                                                    <td>#</td>
                                                    <td>إسم العام</td>
                                                    <td>بداية العام</td>
                                                    <td>نهاية العام</td>
                                                    <td class="text-center">تعديل</td>
                                                    <td class="text-center"> <span class="text-success"> تشغيل </span> / <span class="text-danger"> إيقاف </span> </td>
                                                  </tr>
                                             </thead>
                                              
                                             <tbody class="text-right tbody">

                                                 @php $x=0; @endphp
                                                 @foreach ($academic_year_info as $info)
                                                 @php $x++; @endphp
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$info->name}}</td>
                                                        <td>{{$info->start_date}}</td>
                                                        <td>{{$info->end_date}}</td>
                                                        <td class="text-center"><a href="/academic_year/edit/{{$info->id}}"><i class='far fa-edit fa-1x ml-1 text-primary' style="font-size:18px"></i></a><br>
                                                            لاتقم بتعديل العام كعام جديد !! قم بإضافة عام جديد
                                                        </td>
                                                        <td class="bg-white text-center">
                                                            {{-- Check if the academic year active or not --}}
                                                            
                                                                @if ($info->status == '0')
                                                                <label>
                                                                    <form action="{{route('academic_year.update', ['id' => $info->id ])}}" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}}
                                                                        <button type="submit" class="btn btn-md bg-white btn-danger"> <i class="fas fa-toggle-off text-danger" style="font-size:18px"></i></button>
                                                                        <input type="hidden" name="status" value="0"/>
                                                                    </form>
                                                                </label>


                                                                @else
                                                                    <form action="{{route('academic_year.update', ['id' => $info->id ])}}" method="POST" enctype="multipart/form-data">
                                                                        {{@csrf_field()}}
                                                                        <button type="submit" class="btn btn-md bg-white btn-success" onclick='return academic_year_suspend()'> <i class="fas fa-toggle-on text-success" style="font-size:18px"></i></button>
                                                                        <input type="hidden" name="status" value="1"/>
                                                                    </form>
                                                                @endif
                                                            {{-- End of checking --}}
                                                        </td>
                                                    </tr>
                                                 @endforeach
                                                 
                                             </tbody>
                                      
                                            </table>
                                           </div>

                            </div>
                           
                        
    
    
                    </div>
    
                    {{-- End of Start of card Div  --}}

                  
            </div>
        </div>
    </div>

   
@endsection
