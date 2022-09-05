<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>إذن صرف مالي</title>
    <style>
        @font-face {
            font-family: font;
            src: url("{{asset('public/fonts/Cairo-Regular.ttf')}}");
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- calling some java script files -->
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-jquery.js')}}"></script>
    <script src="{{asset('public/js/proper.js')}}"></script>
    <script src="{{asset('public/js/font-awsome.js')}}"></script>
    <script src="{{asset('public/js/plugins.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sidnav.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awsome.css') }}" rel="stylesheet">

    <title>تقرير منصرفات</title>



</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl ' class="text-right mt-5 bg-white">

        {{-- SET THE OPERATION FOR THE REPORT --}}

        @if ($operation == 'print')
            <script type="text/javascript">
                $(document).ready(function () {
                    window.print();
                    setTimeout("closePrintView()", 3000);
                });
                function closePrintView() {
                    document.location.href = "{{ url("/treasury") }}";
                }
            </script>
        @else

        @endif

        {{-- SET THE OPERATION FOR THE REPORT --}}


    <div class="pt-5 container">

        <div class="row">

            <div class="col-md-2">
                <center><img src="{{asset("public/$school_info->logo")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

            <div class="col-md-8">
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_arabic}}</h5>
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_english}}</h5>
            </div>

            <div class="col-md-2">
                <center><img src="{{asset("public/$school_info->logo")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

        </div>

    </div>
    <div class=" pt-3">
            <div class="alert alert-dark mt-3">
                    <center><h5 class="text-center font-weight-bold">الإدارة المالية</h5> </center>
            </div>
            
        <ul class="m-4"> 
            <li><h6>وحدة المنصرفات</h6></li>
            <li><h6>تقرير منصرفات</h6></li>
            <li><h6>
                {{-- FUNCTION FOR RETREVE THE DATE  --}}
                @if (isset($date))
                تاريخ المنصرفات : {{$date}}
                @else
                تاريخ المنصرفات : {{$start_date}} - {{$end_date}}
                @endif
                {{-- # FUNCTION FOR RETREVE THE DATE  --}}                
            </h6></li>
        </ul>
        @if (isset($expense_info))
            {{-- VERFY THE EXPENSES FOR SPECIFIC DATE WHERE $EXPENSES_INFO IS NULL = 00 --}}
                @php
                $info = (int) $expense_info    
                @endphp 
                
                @if ($info == 00)
                <div class="alert alert-dark mt-3">
                        <center><h5 class="text-center font-weight-bold">لاتوجد منصرفات بهذا التاريخ</h5> </center>
                </div>
                @endif
            @if (count($expense_info)>0)
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                            <td><i class="fas fa-list-ol"></i></td>
                            <td>منصرف رقم</td>
                            <td>التاريخ</td>
                            <td>المبلغ</td>
                            <td>المستفيد</td>
                            <td>عبارة عن</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">
                           @php
                               $x = 0;
                               $total = 0;
                           @endphp
                            @foreach ($expense_info as $expense)
                                @php
                                    $x++;
                                    $total = $total+$expense->amount;
                                @endphp 
                                <tr>
                                    <td>{{$x}}</td>
                                    <td>{{$expense->exp_no}}</td>
                                    <td>{{$expense->date}}</td>
                                    <td>{{$expense->amount}}</td>
                                    <td>{{$expense->expense_owner}}</td>
                                    <td>{{$expense->expense_note}}</td>
                                </tr>
                            @endforeach
                     
                            <tr>
                                <td class="font-weight-bold text-center" colspan="5">إجمالي المصروف</td>
                                <td class="bg-danger text-white font-weight-bold">{{$total}}</td>
                            </tr>
                        </tbody>
                </table>

                <div class="p-3">
                    <h6>الإدارة المالية</h6>
                    <h6>___________________________</h6>
                </div>
            @endif
        @else

        @endif
    </div>

    
    
</body>

</html>