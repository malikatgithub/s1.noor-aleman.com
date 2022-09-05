<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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

    <title>تقرير رسوم كراسة الحضور</title>

    

    {{-- SCRIPT FOR PRINTER --}}
        <script type="text/javascript">
            $(document).ready(function () {
                window.print();
                setTimeout("closePrintView()", 3000);
            });
            function closePrintView() {
                document.location.href = "{{ url('/teacher_report') }}"
            }
        </script> 
    {{-- # SCRIPT FOR PRINTER --}}


    <style>

        @font-face {
            font-family: font;
            src: url("{{asset('fonts/Cairo-Regular.ttf')}}");
        }


        @media print{@page {size: landscape}}
        

            
    </style>

</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl; font-size:13px important;' class="text-right mt-5 bg-white m-0">

    <div class="" style="">

        <div class="row">

            <div class="col-md-2">
                <center><img src="{{$school_info->logo}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

            <div class="col-md-8">
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_arabic}}</h5>
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_english}}</h5>
            </div>

            <div class="col-md-2">
                <center><img src="{{$school_info->logo}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

        </div>

    </div>
    <div class=" pt-3" style="">
           
        <ul class="m-4"> 
            <li><h6>وحدة سجلات الطلاب</h6></li>
            <li><h6> دفتر طلاب للفصل : {{$class->name}}</h6></li>
            <li><h6>العام الدراسي  : {{$academic_year->name}}</h6></li>
        </ul>


        @if (isset($class_students))
        {{-- VERFY THE EXPENSES FOR SPECIFIC DATE WHERE $EXPENSES_INFO IS NULL = 00 --}}
           
            
            @if ($class_students-> isEmpty())
            <div class="alert alert-dark mt-3">
                    <center><h5 class="text-center font-weight-bold">لم يتم تعين طلاب لهذا الفصل ! </h5> </center>
            </div>
            @endif


        @if (count($class_students)>0)
            <table class="table table-striped table-bordered text-right" >
                <br>
                    <thead >
                  

                    <tr>
                        
                        <td colspan="3">اليوم</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr class="font-weight-bold">
                            <td>#</td>
                            <td>الرقم الأكاديمي</td>
                            <td>إسم الطالب</td>
                            <td colspan="32"></td>
                        </tr>

                    </thead>
                    <tbody class="text-right">
                            
                                @php
                                    $x=0;

                                foreach ($class_students as $student){
                                    $x++;
                                    echo "
                                        <tr>
                                            <td>$x</td>
                                            <td>$student->reg_no</td>
                                            <td>$student->name</td>
                                            
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        <tr>
                                    ";

                                   
                                   
                                   
                                }

                                @endphp
                                
                            
                     
                        
                    </tbody>
            </table>

            <div class="p-4">
                <h6 class=" font-weight-bold">الإدارة سجلات الطلاب</h6>
                <h6>__________________</h6>
            </div>
        @endif
    @else

    @endif
</div>



</body>

</html>
    