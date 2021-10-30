@extends('layout.master')





<div class="card-body mt-5" >
  <form  action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data" id="uploadFile" >
  <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
    @csrf
    @method('POST')
      <label for="">File Name</label><br>
            <input type="text" name="filename" placeholder=" File name"><br>
            <div class="col">
                  <div class="form-group">
                      <label class="form-label"><b>Form Tax Type</b></label>
                      <select name="taxtype" class="form-control form-control-sm">
                      <option value="">--Select Tax Type--</option>
                          @foreach($taxTypes as $taxType)
                            <option value="{{$taxType->id}}">{{$taxType->tax_type}}</option>
                          @endforeach
                      </select>
                  </div><br>
                  <div class="form-floating">
                    <textarea name="description" class="form-control form-control-sm" placeholder="Leave a Description here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>
        <div class="input-group ">
            <input class="form-control mt-3" id="inputGroupFile02" name="upload_file" type="file">
            
           
        </div>
        <button class="btn btn-success mt-2 saveBtn" type="submit" value="uploadFile" >Save</button>
  </form>      
</div>




