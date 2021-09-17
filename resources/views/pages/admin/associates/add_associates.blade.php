
@extends('layout.master')
@section('title')
  
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

        <div class="card bg-light" style="width: 25rem;">
       
            <div class="card-body">
                <div class="form-goup">
                <form action="" method="post">
                    @csrf
                    @method('post')
                        <div class="form-group">
                        <h4 class="form-label text-dark">Personal Information</h4> 
                                    <div ><br><br>
                                        <label class="form-label">Name</label> 
                                        <input type="text" class="form-control" value=""   name="clientname"  >
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="">         
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" value="" > <br>
                                        <label class="form-label">SSS Number/Government ID no.</label>
                                        <input type="text" class="form-control" value="" > <br>
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" value="" > <br>
                                    </div>
                                   
                              
                                    <div>
                                        <label for="inputEmail4" class="form-label">Unit/House No. & Street</label>
                                        <input type="text" value="" class="form-control" id="inputEmail4">
                                    </div>
    
                                    <div >
                                        <label for="inputAddress" class="form-label">City/Municipality</label>
                                        <input type="text" class="form-control" id="inputAddress" value=" ">
                                    </div>
                                    <div >
                                        <label for="inputAddress2" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="inputAddress2" value=" ">
                                    </div>
                                    <div >
                                        <label for="inputCity" class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" id="inputCity" value=""><br>
                                    </div>
                                </div>  
                                <h4 class="form-label text-dark">JOB Information</h4><br><br>
                                    <div >
                                        <label class="form-label">Title</label> 
                                        <input type="text" class="form-control" value=""   name="clientname"  >
                                        <label class="form-label">Title</label> 
                                        <input type="text" class="form-control" value=""   name="clientname"  >
                                        <label class="form-label">Employee ID</label>
                                        <input type="text" class="form-control" value="">         
                                        <label class="form-label">Departmment</label>
                                        <input type="text" class="form-control" value="" > <br>
                                        <label class="form-label">Supervisor</label>
                                        <input type="text" class="form-control" value="" > <br>
                                        <label class="form-label">Work Location</label>
                                        <input type="date" class="form-control" value="" > <br>
                                        <label class="form-label">Start Date</label>
                                        <input type="date" class="form-control" value="" > <br>
                                    </div> -->

                                <h4 class="form-label text-dark">Emergency Contact Information</h4> 
                                    <div class="col">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control me-1" name="regdate"   value=""><br>
                                        <label class="form-label">Address</label> 
                                        <input type="text" class="form-control" name="tname"   value=""><br>
                                        <label class="form-label">Cell Phone Number</label> 
                                        <input type="text" class="form-control" name="linebus"   value=""><br>
                                        <label class="form-label">Relationship</label> 
                                        <input type="text" class="form-control" name="linebus"   value=""><br>
                                    </div> 

                        
                            <button class="btn btn-primary mt-4" style="float: right">Cancel</button>
                            <button class="btn btn-success mt-4 me-2" type="submit" value="add" style="float: right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

@stop 

