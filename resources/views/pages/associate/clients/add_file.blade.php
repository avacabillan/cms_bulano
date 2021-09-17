@extends('layout.master')
@section('title')
@stop

@section('content')
<div class="card bg-light justify-content-sm-center sticky-top" style="width: 30rem;">
  <div class="card-header "style="text-align:left;">
    Upload new File
  </div>
  <div class="card-body" style="text-align:left;">
    <label for="">File Name</label><br>
    <input class="p-1" ></input><br>
    <label for="">File Type</label><br>
    <select class="form-select form-select-lg bg-light mb-3 p-1" aria-label=".form-select-lg example"><br>
      <option selected placeholder="Select File type"></option><br>
      <option value="1">.PDF</option>
      <option value="2">.IMG</option>
      <option value="3">.DOCS</option>
    </select>
    <div class="input-group ">
        <input type="file" class="form-control" id="inputGroupFile02">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>
  </div>
</div>

@stop

