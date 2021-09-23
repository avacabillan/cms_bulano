@extends('layout.master')
@section('title')
@stop

@section('content')

<div class="panel">


   <div class="col-md-8 offset-md-2 bg-light mt-3 pt-3">
        <div class="card-body">
            <div class="form-goup">
                    <div class="row ">
                        <div class="col-9 col-sm-4 ms-3">
                            <form action="{{route('addclient')}}" class="row action=" method="post">
                            @csrf
                            @method('PUT')
                               
                        </div> 
                        
                        <h4 class="form-label text-dark">Personal Information</h4> 
                            <div class="row ">
                            <div class="col mt-2 pt-2">
                              <label class="form-label">Name</label> 
                              <input type="text" class="form-control" value=""   name="client_name" >
                              <label class="form-label">Email</label>
                              <input type="text" class="form-control" value="" name="email">         
                              <label class="form-label">Contact Number</label>
                              <input type="text" class="form-control" value="" name="client_contact"> <br>
                              <label class="form-label">TIN No.</label>
                              <input type="text" class="form-control" value="" name= "tin" > <br>
                              <label class="form-label">OCN No.</label>
                              <input type="text" class="form-control" value="" name="ocn"> <br>
                            </div>
                            </div>
                            <h4 class="form-label text-dark">Business Information</h4> 
                            <div class="col">
                            <label class="form-label">Registration Date</label>
                            <input type="date" class="form-control me-1" name="regdate"   value=""><br>
                            <label class="form-label">Trade Name</label> 
                            <input type="text" class="form-control" name="trade_name"   value=""><br>
                            <label class="form-label">Line of Business</label> 
                            <input type="text" class="form-control" name="linebus"   value=""><br>

                            </div>
                            
                            <h4 class="form-label text-dark">Address</h4> 
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Unit/House No.</label>
                                <input type="text" value="" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Street</label>
                                <input type="text" value="" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">City/Municipality</label>
                                <input type="text" class="form-control" id="inputAddress" value=" ">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Province</label>
                                <input type="text" class="form-control" id="inputAddress2" value=" ">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="inputCity" value=""><br>
                            </div>
                            <h4 class="form-label text-dark">Tax Types</h4> 
                            <div class="row mt-2 me-4 text-dark">
                                <div class="col-6 col-md-4 "><input class="me-2" type="checkbox" name="tax[]" value="Income tax">Income Tax</div>
                                <div class="col-6 col-md-4 "><input class="me-2" type="checkbox" name="tax[]" value="Registration Fee">Registration Fee</div>
                                <div class="col-6 col-md-4 "><input class="me-2" type="checkbox" name="tax[]" value="VAT">VAT<br/></div>
                                <div class="col-6 col-md-4 "><input class="me-2" type="checkbox" name="tax[]" value="With Holding Compensation">With Holding Compensation</div>
                                <div class="col-6 col-md-4 "><input class="me-2" type="checkbox" name="tax[]" value="With Holding Expanded">With Holding Expanded</div>
                            </div>


                            <h4 class="form-label text-dark mt-3">Upload File</h4> 
                            <div class="input-group mt-2">
                              <input type="file" class="form-control" id="inputGroupFile02">
                              <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                           
                            <div class="btn">
                            <button type="submit" class="btn btn-primary pt-3 mt-5 mb-3 pb-2" style="float:right;">Cancel</button>
                            <a class="btn btn-primary pt-3 mb-3 mt-5 pb-2 me-2" value="Update" style="float:right;" href="">Update</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@stop


<!-- 
<div class="siderbar_main toggled">
<main class="page-content">
<table class="table data">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Number</th>
      <th>Actions <button class="add">Add new</button></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="data">John Doe</td>
      <td class="data">johndoe@john.com</td>
      <td class="data">666-666-666</td>
      <td>
        <button class="save">Save</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </td>
    </tr>
    <tr>
      <td class="data">John Doe</td>
      <td class="data">johndoe@john.com</td>
      <td class="data">666-666-666</td>
      <td>
        <button class="save">Save</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div> -->



