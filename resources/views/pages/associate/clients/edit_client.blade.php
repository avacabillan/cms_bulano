@extends('layout.master')
@section('title')
   Edit Client
@stop
@section('content')


   <div class="col-md-8 offset-md-2 bg-light mt-4 pt-3" style="border-radius: 5px;">
        <div class="card-body">
            <div class="form-goup">
                <div class="row">
                    <div class="col-9 col-sm-4 ms-3">
                        <form  class="row action=" method="post">
                            @csrf
                            @method('PUT')
                               
                            </div> 

                            <label class="form-label text-dark" id="assoc_edit_client"><strong>Name</strong></label> 
                            <input type="text" class="form-control" value="Binca Pangilinan"   name="clientname" >
                                
                            <div class="row g-3">

                                <div class="col">
                                    <label class="form-label text-dark"><strong>Email</strong></label>
                                    <input type="text" class="form-control" value="biancaP@gmail.com" aria-label="First name">
                                </div>

                                <div class="col">
                                    <label class="form-labe text-dark"><strong>Contact Number</strong></label>
                                    <input type="text" class="form-control" value="09121943675" aria-label="Last name"><br>
                                </div>

                            </div>

                                <label class="form-label text-dark"><strong>Registration Date</strong></label>
                                <input type="date" class="form-control" name="regdate"   value="6/8/1996">
                                <label class="form-label text-dark mt-3"><strong>Trade Name</strong></label> 
                                <input type="text" class="form-control" name="tname"   value="VB Columna Const Corp">
                                <label class="form-label text-dark mt-3"><strong>Line of Business</strong></label> 
                                <input type="text" class="form-control" name="linebus"   value="4520 Building of Constructions or Parts, Civil Engineering">
                                <br><br>


                                <h3 class="form-label text-dark mt-3"><strong>Address</h3>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="inputEmail4" class="form-label text-dark"><strong>Unit/House No.</strong></label>
                                        <input type="text" value="33" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="col">
                                        <label for="inputPassword4" class="form-label text-dark"><strong>Street</strong></label>
                                        <input type="text" value="Azucena St. Violeta Village" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label text-dark mt-3"><strong>City/Municipality</strong></label>
                                    <input type="text" class="form-control" id="inputAddress" value=" Sta Cruz Guiguinto">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label text-dark mt-3"><strong>Province</strong></label>
                                    <input type="text" class="form-control" id="inputAddress2" value=" Bulacan">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label text-dark mt-3"><strong>Postal Code</strong></label>
                                    <input type="text" class="form-control" id="inputCity" value="3015">
                                </div>
                                
                                <div><br>
                                <button type="submit" value="Update" class="btn btn-primary" style="float: right;">Cancel</button>
                                <a class="btn btn-primary g-5 me-2" href="" style="float: right;">Update</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    
@stop