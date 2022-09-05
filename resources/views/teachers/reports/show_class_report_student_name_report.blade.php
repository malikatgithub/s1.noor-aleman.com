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



</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl ' class="text-right mt-5 bg-white">

        @if ($operation == 'print')
            <script type="text/javascript">
                $(document).ready(function () {
                    window.print();
                    setTimeout("closePrintView()", 3000);
                });
                function closePrintView() {
                    document.location.href ="{{ url('/teacher_report') }}"
                }
            </script>
        @else

        @endif

    <div class="pt-5 container">

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
    <div class=" pt-3">
            <div class="alert alert-dark mt-3">
                    <center><h5 class="text-center font-weight-bold">إدارة سجلات الطلاب</h5> </center>
            </div>
            
        <ul class="m-4"> 
            <li><h6>وحدة سجلات الطلاب</h6></li>
            <li><h6>تقرير بيانات طلاب للفصل : {{$class->name}}</h6></li>
            <li><h6>التاريخ  : {{date('Y-m-d')}}</h6></li>
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
                    <tr class="font-weight-bold">
                        <td>#</td>
                        <td>الرقم الأكاديمي</td>
                        <td>إسم الطالب</td>
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
                                        </tr>
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
    