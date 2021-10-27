@extends('layout.master')
@section('title')
@stop

@section('content')
<div class="card bg-light justify-content-sm-center sticky-top" style="width: 30rem;">
  <div class="card-header "style="text-align:left;">
    Upload new File
  </div>
  <div class="card-body" style="text-align:left;">
  <form  action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data" >

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
            <input class="form-control" id="inputGroupFile02" name="upload_file" type="file">
            <label class="input-group-text"  for="inputGroupFile02">Upload</label>
        </div>
  </form>      
  </div>
</div>

@stop

