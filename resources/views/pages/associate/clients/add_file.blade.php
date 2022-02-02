
<div class="card-body" >
  <form  action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data" id="uploadFile" >
    <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
    @csrf
    @method('POST')
    <div class="col">
      <label for=""><b>File Name</b></label><br>
      <input type="text" name="filename" placeholder=" File name"><br>

          <div class="form-group mt-2">
            <label class="form-label"><b>Form Tax Type</b></label>
              <select name="taxtype" class="form-control form-control-sm">
                <option value="">--Select Tax Type--</option>
                  @foreach($taxType as $tax)
                <option value="{{$tax->id}}">{{$tax->tax_type}}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-floating">
            <textarea name="description" class="form-control form-control-sm" placeholder="Leave a Description here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Description</label>
          </div>

          <div class="input-group ">
            <input class="form-control mt-3" id="inputGroupFile02" name="upload_file" type="file">
          </div>
            <button class="btn btn-success mt-2 saveBtn" type="submit" value="uploadFile" >Save</button>
    </div>
  </form>      
</div>




