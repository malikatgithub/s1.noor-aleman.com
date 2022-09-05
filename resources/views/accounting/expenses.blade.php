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

                                        <i class="fas fa-money-bill-alt text-info"></i>&nbsp; نافذة المنصرفات للعام الدراسي : {{$academic_year_name}} 

                                <span class="float-left mr-2">
                                        <a href="{{asset('expenses/create')}}" class="btn btn-success text-white">  <i class="fas fa-plus-circle fa-1x ml-1" ></i>  إضافة منصرف </a>
                                </span>

                                <span class="float-left">
                                        <a href="expenses_search" class="btn btn-info text-white">  <i class="fas fa-search fa-1x ml-1" ></i>  بحث  </a>
                                </span>

                        </h6>

                </div>
                <br>

                <div class="container">
                    <div class="card mb-3 pb-5">

                            <div class="card-header">
                                <h6 class="font-weight-bold text-dark"> 
                                    <i class="far fa-list-alt  pt-2 "></i>&nbsp; منصرفات اليوم   
                                </h6>
                            </div>      
                                
                            <div class="container">
                                {{-- VIEW THE EXPENSE OF THE DAY --}}
                                    
                                @if (count($expense_info)<=0)
                                <div class="alert alert-dark mt-3">
                                        <center><i class="fas fa-check-square fa-1x font-weight-bold"></i> &nbsp; لاتوجد منصرفات لليوم </center>
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

                                                            {{--  @if ($expense->employee_id && $expense->teacher_id == NULL)
                                                                <td>{{$expense->expense_owner}}</td>


                                                            @if ($expense->employee_id != NULL)
                                                                <td>{{$expense->employee->name}}</td>
                                                            @if($expense->teacher_id != NULL)
                                                                <td>{{$expense->teacher->name}}</td>
                                                            @else
                                                                <td>{{$expense->expense_owner}}</td>
                                                            @endif
                                                            @endif
                                                            @endif  --}}

                                                            @if (($expense->employee_id == NULL) && ($expense->teacher_id == NULL))
                                                                <td>{{$expense->expense_owner}}</td>
                                                            @elseif($expense->teacher_id != NULL)
                                                                <td>{{$expense->teacher->name ?? "تم حذف الاستاذ ($expense->expense_owner)"}}</td>
                                                            @elseif($expense->employee_id != NULL)
                                                                <td>{{$expense->employee->name ?? "تم حذف الاستاذ $expense->expense_owner"}}</td>
                                                            @endif  


                                                            


                                                        <td>{{$expense->expense_note}}</td>
                                                        <td>
                                                            <center>
                                                                <a onclick='return confirm("طباعة ؟")' href="expense/print/{{$expense->id}}"><i class='fas fa-print fa-2x text-dark p-1'></i></a>
                                                                <a onclick='return confirm("تعديل ؟")' href="expense/edit/{{$expense->id}}"><i class='far fa-edit fa-2x text-primary p-1'></i></a>
                                                                <a onclick='return confirm("إستمرار المسح ؟ ")' href="expense/delete/{{$expense->id}}"><i class='fas fa-trash-alt fa-2x text-danger p-1' ></i></a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                    </table>
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