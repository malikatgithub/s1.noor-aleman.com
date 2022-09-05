<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    
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

    <title>تقرير رسوم دراسية</title>

    {{-- <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("closePrintView()", 3000);
        });
        function closePrintView() {
            document.location.href = '/fees_report';
        }
    </script>  --}}

</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl ' class="text-right mt-5 bg-white">
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
            <li><h6>وحدة الاقساط</h6></li>
            <li><h6>تقرير اقساط</h6></li>
            <li><h6>التاريخ  : {{date('Y-m-d')}}</h6></li>
            <li><h6>العام الدراسي  : {{$academic_year_name}}</h6></li>
            <li><h6> <b> الطالب  : {{$student_info->name}}</b> </h6></li>
            <li><h6> <b class='text-danger'> إجمالي المطلوب  : {{$student_info->fees}}</b> </h6>
            @php

                $x = 0;
                foreach ($fees_info as $paid)
                {
                        $x= $x+(int)$paid->paid;
                }


                $remain = $student_info->fees-$x;


                if( $remain != 0)
                {
                    echo "<li><h6> <b class='text-danger'> إجمالي المتبقي  : $remain</b> </h6>";

                }


                else{

                        echo '<li> <h2 class="text-danger text-center font-weight-bold mb-5">  <i class="fas fa-exclamation-triangle fa-1x"></i>&nbsp; تم تسديد كل المبلغ المطلوب</h2> </li>';

                }

                @endphp


        </ul>
        @if (isset($fees_info))
            {{-- VERFY THE EXPENSES FOR SPECIFIC DATE WHERE $EXPENSES_INFO IS NULL = 00 --}}
                @php
                $info = (int) $fees_info    
                @endphp 
                
                @if ($info == 00)
                <div class="alert alert-dark mt-3">
                        <center><h5 class="text-center font-weight-bold">لم يتم دفع أقساط لهذا الطالب</h5> </center>
                </div>
                @endif




               


            @if (count($fees_info)>0)
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                            <td>رقم الايصال</td>
                            <td>التاريخ</td>
                            <td>نوع القسط</td>
                            <td>المبلغ المدفوع</td>
                            <td>تخفيض</td>
                            <td>طريقة الدفع</td>
                            <td>ملاحظات</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">
                            @php
                               $total = 0;
                            @endphp
                            @foreach($fees_info as $fees)
                               
                                <tr>
                                    <td>{{$fees->bill_no}}</td>
                                    <td>{{$fees->date}}</td>
                                    @foreach ($fees_types_id as $fees_info)
                                        @if ($fees_info->id == $fees->fees_types_id)
                                            @php
                                                $fees_name = $fees_info->name;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <td>
                                        {{-- CODE FOR HANDLE THE EXCEPTION ERROR IF FEES TYPES DELETED --}}


                                            @php
                                                try {
                                                echo "    
                                                    $fees_name";
                                                } 
                                                catch (\Exception $e) {echo "<spna class='text-danger font-weight-bold'>لقد تم مسح نوع هذا القسط الرجاء مراجعة سله المهملات  !!</span>";}
                                            @endphp
                                         

                                        {{-- # CODE FOR HANDLE THE EXCEPTION ERROR IF FEES TYPES DELETED --}}
                                        
                                        </td>


                                    <td>{{$fees->paid}}</td>
                                    <td>{{$fees->discount}}</td>
                                    <td>{{$fees->paid_method}}</td>
                                    <td>{{$fees->fees_note}}</td>
                                </tr>


                                @php
                                    $total = $total+$fees->paid;
                                @endphp 
                               
                            @endforeach

                            <tr>
                                <td class="font-weight-bold text-center" colspan="6">إجمالي المدفوع</td>
                                <td class="bg-danger font-weight-bold text-white">{{ $total }}</td>
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