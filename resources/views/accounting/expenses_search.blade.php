@extends('layouts.css_main')

@section('body')

@include('layouts.account_Nav')

@include('layouts.top-menu')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11 text-right font-weight-light">

            {{-- Start of card Div --}}

            <div class="card">

                {{-- Session parameter Success and fail or Error --}} 
                @if (session('status'))
                <div class="alert alert-success m-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif 

                @if (Session::has('delete'))

                <div class="alert alert-danger m-3">
                    <i class="fas fa-trash-alt fa-1x"></i> &nbsp; {{Session::get('delete')}}
                </div>

                {{Session::forget('delete')}}
                @endif 

                @if (Session::has('success'))

                <div class="alert alert-success m-3">
                    <i class="fas fa-check-square fa-1x"></i> &nbsp;{{Session::get('success')}}
                </div>

                {{Session::forget('success')}} 
                @endif 
                {{-- End of Session parameter Success and fail or Error --}}

                <div class="card-header border-top1">

                    <h6 class="font-weight-bold text-dark"> 
                        <i class="fas fa-search text-info fa-2x pt-2"></i>&nbsp; نافذة المنصرفات  
                    </h6>

                </div>
                <br>

                <div class="container">

                    <form action="{{route('expense.show')}}" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                    
                        <div class="row container">
                                <label for="validationDefault01" class=" font-weight-bold">التاريخ </label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="date">
                                </div>
                                <div class="col">
                                        <button type="submit" class="btn btn-info text-white"><i class="fas fa-search fa-1x ml-1" ></i> بحث</button>
                                </div>
                        </div>

                    </form>

                    <form action="{{route('expense.show')}}" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                        <div class="row container mt-4">
                                <label for="validationDefault01" class=" font-weight-bold">التاريخ </label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="start_date">
                                </div>

                                <div class="col-md-1 text-center">
                                        <span class=" font-weight-bold ">ــــ</span>
                                </div>

                                <div class="col-md-4">
                                        <input type="date" class="form-control" id="validationDefault01" placeholder=""  required  name="end_date">
                                    </div>
                                <div class="col">
                                        <button type="submit" class="btn btn-info text-white"><i class="fas fa-search fa-1x ml-1" ></i> بحث</button>
                                </div>
                        </div>

                    </form>
                

                    <div class="card mb-3 mt-3">

                            <div class="card-header  bg-secondary">
                                <h6 class="font-weight-bold text-white text-center"> 
                                    <i class="far fa-list-alt fa-2x pt-2 text-white "></i>&nbsp;  نتائج البحث   
                                </h6>
                            </div>      
                                
                            <div class="container">

                               {{-- # VIEW THE EXPENSE OF THE DAY --}}  
                                    
                                @if (isset($expense_info))
                                    @if (count($expense_info)<0)
                                    <div class="alert alert-dark mt-3">
                                            <center><i class="fas fa-check-square fa-1x"></i> &nbsp; لاتوجد منصرفات لليوم </center>
                                        </div>
                                    @else
                                        <table class="table table-striped table-bordered text-right" >
                                            <br>
                                                <thead >
                                                <tr class="font-weight-bold">
                                                    <td>منصرف رقم</td>
                                                    <td>التاريخ</td>
                                                    <td>المبلغ</td>
                                                    <td>المستفيد</td>
                                                    <td>عبارة عن</td>
                                                    <td class="text-center">العمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-right">
                                                    @foreach ($expense_info as $expense)
                                                        <tr>
                                                            <td>{{$expense->exp_no}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->amount}}</td>
                                                            <td>{{$expense->expense_owner}}</td>
                                                            <td>{{$expense->expense_note}}</td>
                                                            <td>
                                                                <center>
                                                                    <a onclick='return confirm("طباعة ؟")' href= {{ url("expense/print/$expense->id") }}><i class='fas fa-print fa-2x text-dark p-1'></i></a>
                                                                    <a onclick='return edit()' href= {{ url("expense/edit/$expense->id") }}><i class='far fa-edit fa-2x text-primary p-1'></i></a>
                                                                    <a onclick='return del()' href= {{ url("expense/delete/$expense->id") }}><i class='fas fa-trash-alt fa-2x text-danger p-1' ></i></a>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                        </table>
                                    @endif
                                @else
                                    
                                @endif

                                {{-- # VIEW THE EXPENSE OF THE DAY --}}  
                            </div>    
                        
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