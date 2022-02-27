
<div class="card-body" >
  <form  action="{{route('attach-declaration', $deadline->id)}}" method="POST" enctype="multipart/form-data" id="uploadFile" >
    <input class="form-control" type="hidden" value="{{$deadline->id}}" name="client_id">
    @csrf
    @method('POST')
    
          <div class="input-group ">
            <input class="form-control mb-5" id="inputGroupFile02" name="file" type="file">
          </div>
            <button class="btn btn-success mt-5 saveBtn" type="submit" value="uploadFile" >Save</button>
   </form>      
</div>

