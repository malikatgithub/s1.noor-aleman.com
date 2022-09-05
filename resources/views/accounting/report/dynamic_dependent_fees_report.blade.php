
      <div class="col-md-3 mb-2 d-inline">

            <form action="{{route('show_class_report')}}" method="POST" target="" enctype="multipart/form-data">
                  {{@csrf_field()}}
                  <label for="validationDefault01" class="font-weight-bold">الصف الدراسي</label>

                  <select name="class_type_id" id="class_type_id" class="form-control input-md dynamic" data-dependent="fees_type_id" required>
                        <option value=""></option>
                        @foreach($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                  </select>


                  <label for="validationDefault01" class="mt-2 font-weight-bold">إختر القسط</label>
                  <select name="fees_type_id" id="fees_type_id" class="form-control input-md dynamic" required>

                  </select>

                  <br>
                  <center>
                        <button type="submit" class="btn btn-success font-weight-bold btn-md" > <i class="fas fa-search"></i> &nbsp; بحث</button>
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
               url:"{{ route('dynamicdependent.fetch_class_fees_types') }}",
               method:"POST",
               data:{select:select, value:value, _token:_token, dependent:dependent},
               success:function(result)
               {
                $('#'+dependent).html(result);
               }
           
              })
             }
            });
           
            $('#class_type_id').change(function(){
             $('#fees_type_id').val('');
            });
      
            
           
           });
           </script>