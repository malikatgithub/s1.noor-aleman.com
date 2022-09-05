         
      <div class="col-md-3 mb-3">
            <label for="validationDefault01">أختر نوع القسط <span class="required">*</span> </label>
            <select name="fees_type_id" id="fees_type_id" class="form-control input-md dynamic" data-dependent="amount" required>
                  <option value=""></option>
                  @foreach($fees_types_list as $fees_type)
                        <option value="{{$fees_type->id}}">{{$fees_type->name}}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-md-3 mb-3" style="display:none !important;">
            <label for="validationDefault01">القيمة المالية المطلوبة<span class="required">*</span> </label>
            {{-- <select name="amount" id="amount" class="form-control input-md dynamic" required>
            </select> --}}
            <span class="amount" id="amount" class="form-control input-md dynamic">
            </span>
      </div>


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
               url:"{{ route('dynamicdependent.fetch_fees_types') }}",
               method:"POST",
               data:{select:select, value:value, _token:_token, dependent:dependent},
               success:function(result)
               {
                $('#'+dependent).html(result);
               }
           
              })
             }
            });
           
            $('#fees_type_id').change(function(){
             $('#amount').val('');
            });
      
            
           
           });
           </script>