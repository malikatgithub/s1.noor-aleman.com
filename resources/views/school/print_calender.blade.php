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

    <title>تقرير التقويم الدراسي</title>

    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("closePrintView()", 3000);
        });
        function closePrintView() {
            document.location.href = '/school/calender';
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
                    <center><h5 class="text-center font-weight-bold">إدارة السجلات المدرسية</h5> </center>
            </div>
            
        <ul class="m-4"> 
            <li><h6>وحدة البيانات المدرسية</h6></li>
            <li><h6>تقرير تقويم دراسي</h6></li>
            <li><h6>التاريخ  : {{date('Y-m-d')}}</h6></li>
            <li><h6>العام الدراسي  : {{$academic_year_name}}</h6></li>
        </ul>
        @if (isset($academic_calender_events))
            {{-- VERFY THE EXPENSES FOR SPECIFIC DATE WHERE $EXPENSES_INFO IS NULL = 00 --}}
     
            @if (!($academic_calender_events->isEmpty()))
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                            <td>الحدث</td>
                            <td>بداية الحدث</td>
                            <td>نهاية الحدث</td>
                            <td>ملاحظات</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">
                            
                            @php
                           
                            foreach ($academic_calender_events as $academic_calender_events_info){
                            
                               echo "<tr>

                                        <td>$academic_calender_events_info->event</td>
                                        <td>$academic_calender_events_info->start_date</td>
                                        <td>$academic_calender_events_info->end_date</td>
                                        <td>$academic_calender_events_info->event_note</td>
                                    
                                </tr>";
                            }

                            @endphp
                      
                        </tbody>
                </table>

                <div class="p-3">
                    <h6>إدارة البيانات المدرسية</h6>
                    <h6>___________________________</h6>
                </div>
            
            @else

                <div class="alert alert-dark mt-3">
                        <center><h5 class="text-center font-weight-bold">لم يتم إضافة تقويم لهذا العام بعد </h5> </center>
                </div>

            @endif
        @endif
    </div>

    
    
</body>

</html>