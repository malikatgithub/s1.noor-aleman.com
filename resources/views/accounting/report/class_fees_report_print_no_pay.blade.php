<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Student;
?>

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

    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("closePrintView()", 3000);
        });
        function closePrintView() {
            document.location.href = "{{ url('/fees_report') }}";
        }
    </script> 

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
            <li><h6>تقرير بعدم دفع القسط : {{$fees_type->name}} </h6></li>
            <li><h6> للفصل : {{$class->name}} </h6></li>
            <li><h6>التاريخ  : {{date('Y-m-d')}}</h6></li>
            <li><h6>العام الدراسي  : {{$academic_year_name}}</h6></li>
        </ul>
        @if (isset($fees_info))
            {{-- VERFY THE EXPENSES FOR SPECIFIC DATE WHERE $EXPENSES_INFO IS NULL = 00 --}}
                @php
                $info = (int) $fees_info    
                @endphp 
                
                @if ($info == 00)
                <div class="alert alert-dark mt-3">
                        <center><h5 class="text-center font-weight-bold">لم يتم دفع رسوم لهذا القسط</h5> </center>
                </div>
                @endif

                
            @if (count($fees_info)>0)
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                        
                            <td>الرقم الأكاديمي</td>
                            <td>إسم الطالب</td>
                            <td>إسم الوالد</td>
                            <td>رقم الهاتف</td>
                            <td>الفصل الدراسي</td>
                            <td>العنوان</td>
                            <td>ملاحظات</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">

                    @php



                    // Student match reg_no for verfication 

                    foreach ($fees_info as $fees)
                        {

                            $array[] = $fees->reg_no;
                            
                        }

                     
                            foreach ($students_info as $student_info){
                                if(!in_array($student_info->reg_no , $array)){

                                    echo "
                                        <tr>
                                                <td>$student_info->reg_no</td>
                                                <td>$student_info->name</td>
                                                <td>$student_info->fa_name</td>
                                                <td>$student_info->fa_phone</td>
                                                <td>$class->name</td>
                                                <td>$student_info->address</td>
                                                <td>$student_info->std_note</td>
                                            </tr>
                                        ";    
                                }
                            }
                         
                    // # Student match reg_no for verfication 

                        
                  
     
                       @endphp

                            
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