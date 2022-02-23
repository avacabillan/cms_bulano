<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="container">
    <div class="col-md-8 offset-md-2"> -->
      <!-- <h4>Edit Associate</h4> -->
<!--     
      <form action="{{route('update', $associate->id)}}" id="editAssocForm" name="editAssocForm" method="post">
      @csrf
      @method('PUT')
      <center>
        <div class="form-group bg-light mt-5 ml-5">
          <input type="hidden" value="{{$associate->id}}" >

        
          Name<input type="text" value="{{$associate->name}}" class="form-control mt-5" style="width: 35rem;" name="assoc_name" >
          Email<input type="text" value="{{$associate->email}}" class="form-control" style="width: 35rem;" name="assoc_email" >
          Contact Number<input type="number" value="{{$associate->contact_number}}" class="form-control" style="width: 35rem;" name="assoc_contact" >
          Birthdate<input type="date" value="{{$associate->birth_date}}" class="form-control" style="width: 35rem;" name="assoc_birthdate" >
          Address<input type="text" value="{{$associate->address}}" class="form-control"  style="width: 35rem;"name="assoc_address">
          SSS Number<input type="text" value="{{$associate->sss_no}}" class="form-control" style="width: 35rem;" name="assoc_sss" >
          Department<input type="text" value="{{$associate->departments->department_name}}" style="width: 35rem;" class="form-control" name="department" >

          Position<input type="text" value="{{$associate->positions->position_name}}" class="form-control" style="width: 35rem;" name="position" >
          
          <input type="submit" value="Update" class=" mt-2 btn btn-success">
        </div>
        </center>
      </form>
    </div>
  </div> -->


  
@extends('layout.master')
@section('title')
    Edit Associate
@endsection
@section('content')

<div class="content-header">
  <div class="container-fluid">

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">Edit Associates</h3>
    </div>

    <div class="card-body">
      <div class="row">

      <form action="{{route('update', $associate->id)}}" id="editAssocForm" name="editAssocForm" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$associate->id}}" >

        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="{{$associate->name}}" name="assoc_name" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" value="{{$associate->email}}" name="assoc_email" style="width: 100%;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" value="{{$associate->contact_number}}" name="assoc_contact" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Birthdate</label>
            <input type="text" class="form-control" value="{{$associate->birth_date}}" name="assoc_birthdate" style="width: 100%;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" value="{{$associate->address}}" name="assoc_address" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>SSS Number</label>
            <input type="text" class="form-control" value="{{$associate->sss_no}}" name="assoc_sss" style="width: 100%;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Department</label>
            <input type="text" class="form-control" value="{{$associate->departments->department_name}}" name="department" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Position</label>
            <input type="text" class="form-control" value="{{$associate->positions->position_name}}" name="position" style="width: 100%;">
          </div>
        </div>

        
        <div class="edit_associate" >
          <input type="submit" value="Update" class=" mt-2 btn btn-success">
        </div>
        
       </form>
      </div>
    </div>
  </div>
</div>
@stop