<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>تقرير الخزينة</title>
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

    <title>تقرير الخزينة</title>

    

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
                document.location.href = '/treasury';
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
        @if (isset($treasury_info))

            @if (count($treasury_info)>0)
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                            <td><i class="fas fa-list-ol"></i></td>
                            <td>إيصال رقم</td>
                            <td>التاريخ</td>
                            <td>المدفوع</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">
                           @php
                               $x = 0;
                               $total = 0;
                           @endphp
                            @foreach ($treasury_info as $info)
                                @php
                                    $x++;
                                    $total = $total+$info->paid;
                                @endphp 
                                <tr>
                                    <td>{{$x}}</td>
                                    <td>{{$info->bill_no}}</td>
                                    <td>{{$info->date}}</td>
                                    <td>{{$info->paid}}</td>
                                </tr>
                            @endforeach
                     
                            <tr>
                                <td class="font-weight-bold text-center" colspan="3">إجمالي الخزينة</td>
                                <td class="bg-danger font-weight-bold text-white">{{$total}}</td>
                            </tr>
                        </tbody>
                </table>

                <div class="p-3">
                    <h6>الإدارة المالية</h6>
                    <h6>___________________________</h6>
                </div>
            @endif
        @else
        <div class="alert alert-dark mt-3">
                <center><h5 class="text-center font-weight-bold">لاتوجد منصرفات بهذا التاريخ</h5> </center>
        </div>
        @endif
    </div>

    
    
</body>

</html>