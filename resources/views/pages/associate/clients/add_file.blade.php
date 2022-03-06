
<h5>Upload File</h5>
<hr>
<div class="card-body">
  <form  action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data" id="uploadFile" >
    <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
    @csrf
    @method('POST')
    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <label>File Name</label>
          <input type="text" class="form-control" name="filename" placeholder=" File name">
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-group">
          <label>Form Tax Type</label>
          <select  name="taxform" class="form-control">
            <option value="">--Select File Folder--</option>
            @foreach( $client->clientTaxes as $tax)
              <option value="{{$tax->taxForms->id}}">{{$tax->taxForms->tax_form_no}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control form-control-sm" placeholder="Leave a Description here" id="floatingTextarea"></textarea>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <input class="form-control mt-3" id="inputGroupFile02" name="file" type="file">
        </div>
      </div>

      <div class="input-group">
        <button class="btn btn-success mt-2 saveBtn" type="submit" value="uploadFile">Save</button>
      </div>

    </div>
  </form>      
</div>


