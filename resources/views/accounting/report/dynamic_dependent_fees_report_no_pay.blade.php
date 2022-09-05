
      <div class="col-md-3 mb-2 d-inline">

            <form action="{{route('show_class_report_no_pay')}}" method="POST" target="" enctype="multipart/form-data">
                  {{@csrf_field()}}
                  <label for="validationDefault01" class="font-weight-bold">الصف الدراسي</label>

                  <select name="class_type_id" id="class_type_id2" class="form-control input-md dynamic" data-dependent="fees_type_id2" required>
                        <option value=""></option>
                        @foreach($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                  </select>


                  <label for="validationDefault01" class="mt-2 font-weight-bold">إختر القسط</label>
                  <select name="fees_type_id" id="fees_type_id2" class="form-control input-md dynamic" required>

                  </select>

                  <br>
                  <center>
                        <button type="submit" class="btn btn-primary font-weight-bold btn-sm" > <i class="fas fa-search"></i> &nbsp; البحث</button>
                  </center>
            </form>
            
      </div>

      

 

           <script>
           $(document).ready(function(){

            $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $('.dynamic').change(function(){
             if($(this).val() != '')
             {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dependent = $(this).data('dependent');
              var _token = $('input[name="_token"]').val();
              $.ajax({
               url:"{{ route('dynamicdependent.show_class_report_no_pay') }}",
               method:"POST",
               data:{select:select, value:value, _token:_token, dependent:dependent},
               success:function(result)
               {
                $('#'+dependent).html(result);
               }
           
              })
             }
            });
           
            $('#class_type_id2').change(function(){
             $('#fees_type_id2').val('');
            });
      
            
           
           });
           </script>