      {{-- <div class="form-group">
                  <label for="validationDefault01">أختر الامتحان <span class="required">*</span> </label>
            <select name="exam_id" id="exam_id" class="form-control input-md dynamic" data-dependent="class_id">
                  <option value=""></option>
                  @foreach($exams_list as $exam)
                  <option value="{{ $exam->id}}">{{ $exam->name }}</option>
                  @endforeach
            </select>
                  </div>
                  <br />
            <div class="form-group">
                  <label for="validationDefault01">أختر الفصل الدراسي <span class="required">*</span> </label>
                  <select name="class_id" id="class_id" class="form-control input-md dynamic" >
                  </select>
            </div>
            <br />
            {{ csrf_field() }}
            <br />
       --}}

            <div class="form-group">
                        <label for="validationDefault01" class="font-weight-bold">أختر الفصل </label>
                  <select name="class_id" id="class_id" class="form-control input-md dynamic" data-dependent="exam_id" required>
                        <option value=""></option>
                        @foreach($classes_list as $class)
                        <option value="{{$class->id}}">{{ $class->name }}</option>
                        @endforeach
                  </select>
                        </div>
                        <br />
                  <div class="form-group">
                        <label for="validationDefault01" class="font-weight-bold">أختر الإمتحان </label>
                        <select name="exam_id" id="exam_id" class="form-control input-md dynamic" required>
                        </select>
                  </div>
                  <br />
                  
                  <br />


            </body>
           </html>
           
           <script>
           $(document).ready(function(){
           
            $('.dynamic').change(function(){
             if($(this).val() != '')
             {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dependent = $(this).data('dependent');
              var _token = $('input[name="_token"]').val();
              $.ajax({
               url:"{{ route('dynamicdependent.fetch') }}",
               method:"POST",
               data:{select:select, value:value, _token:_token, dependent:dependent},
               success:function(result)
               {
                $('#'+dependent).html(result);
               }
           
              })
             }
            });
           
            $('#class_id').change(function(){
             $('#exam_id').val('');
            });
      
            
           
           });
           </script>