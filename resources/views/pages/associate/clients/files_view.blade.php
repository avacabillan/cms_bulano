
@extends('layout.master')
@section('title')
@stop

@section('content')
<a href="{{route('addfile')}}" class="btn btn-outline-dark me-md-2 mt-3" id="btnclient" >Add New File</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">File name</th>
      <th scope="col">Path</th>
      <th scope="col">Uploaded at</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>ITR - January</td>
      <td>database/capstone/itr_january.pdf</td>
      <td>01-21-20</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>ITR - April</td>
      <td>database/capstone/itr_april.pdf</td>
      <td>04-21-20</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>ITR - August</td>
      <td>database/capstone/itr_august.pdf</td>
      <td>08-21-20</td>
    </tr>
  </tbody>
</table>


@stop
