<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>طباعة سند قبض</title>
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
    <script src="{{ asset('js/app.js') }}" defer></script>

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

    <title>سند قبض مالي</title>

    {{-- SCRIPT FOR REDIRECT AFTER PRINT  --}}
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("closePrintView()", 3000);
        });
        function closePrintView() {
            document.location.href = "{{ url('fees_panel') }}";
        }
    </script>


</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl ' class="text-right mt-5 bg-white" >
    <div class="pt-5 container">

        <div class="row">

            <div class="col-md-2">
                <center><img src="{{ asset("public/$school_info->logo") }}" alt="" width="100px" height="100px" class="img-reponsive"></center>
            </div>
 
            <div class="col-md-8">
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_arabic}}</h5>
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_english}}</h5>
            </div>

            <div class="col-md-2">
                <center><img src="{{ asset("public/$school_info->logo") }}" alt="" width="100px" height="100px" class="img-reponsive"></center>
            </div>

        </div>

    </div>
    <div class=" pt-5">
    
        <center>
            <div class='borber'>
                <h5 class="font-weight-bold">
                        << سند إستلام داخلي - 
                        Reciept Voucher >>
                    </h5>
            </div>
        </center>

        <div class='cash_container'>

            <table class='table_cash'>
           

                <tr>
                    <td> - العام الدراسي : <ins> <strong>

                                {{$academic_year_name}}
            
                            </strong></ins>
                    </td>
                </tr>

                <tr>
                    <td> - تاريخ الدفع : <ins> <strong> 
                    {{date('Y-m-d H:i:s')}}

                                        </strong></ins>
                    </td>
                </tr>

                <tr>
                    <td> - رقم الإيصال : <ins> <strong> 00{{$invoice_id->id}} </strong></ins> <span class=" float-left"></td>
                </tr>

                <tr>
                    <td> 
                        </strong> - وصلني من ولي أمر الطالب : <ins> <strong>{{$name}} </ins> <span class=" float-left"> مبلغ و قدرة : <strong> ## {{$paid}} جنية ##</strong></span>
                    </td>
                </tr>

                <tr>
                
                <td></strong></ins>&nbsp; وذلك عبارة عن رسوم الترحيل لشهر {{$month}}  .</td>

                </tr>
                <tr>
                    <td> - ملاحظات : <strong><br>&nbsp;&nbsp;&nbsp;{{$fees_note}}  </strong></td>
                </tr>
            </table>
            <br>
            <br>
            <table class='table_cash'>
                <tr>
                    <td> إسم المحاسب</td>
                    <td> توقيع و ختم المحاسب </td>
                </tr>
                <tr>
                    <td>________________________________</td>
                    <td></td>
                </tr>

               
            </table>
        </div>
</body>

</html>