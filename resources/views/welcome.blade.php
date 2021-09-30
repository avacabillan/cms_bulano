@extends('layout.master')

@section('content')
<div class="form-group">
            <label for="exampleInputEmail1"> Select Groups </label>
            <select class="form-control" name="group" id="group" required>
                <option value=""> Select </option>
                @foreach($groups as $group)
                <option value="group->id">Group{{$group}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Select Corporate </label>
            <select class="form-control" name="subCorporate" id="subCorporate" required>
                <option value=""> Select </option>
                @foreach($subCorporates as $subCorporate)
                    <option value="{{$subCorporate->id}}"> {{ $subCorporate }}</option>
                @endforeach
            </select>
        </div>

   
    <script type="text/javascript">
            jQuery(document).ready(function ()
            {
                    jQuery('select[name="group"]').on('change',function(){
                       var groupID = jQuery(this).val();
                       if(groupID)
                       {
                          jQuery.ajax({
                             url : 'dropdownlist/getsubCorporate/' +groupID,
                             type : "GET",
                             dataType : "json",
                             success:function(data)
                             {
                                console.log(data);
                                jQuery('select[name="subCorporate"]').empty();
                                jQuery.each(data, function(key,value){
                                   $('select[name="subCorporate"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                       else
                       {
                          $('select[name="subCorporate"]').empty();
                       }
                    });
            });
            </script>

            
@endsection​