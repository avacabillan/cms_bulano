

<div class="add_associate_form">
  
    <div class="assoc_header col-xs-12 col-sm-6 col-md-8 offset-md-1 rounded">
        <div class="assoc_header_text text-white">
            <h3 class="mb-0"><strong>NEW</strong> ASSOCIATE</h3>
        </div>
    </div>
    <div class="add_assoc_data col-xs-12 col-sm-6 col-md-8 offset-md-1 rounded">
        <form action="">
        @csrf
        @method('post')
            <div class="form-group" id="associate_personalinfo" style="background-color: white;">

                <h3 class="assoc_head_title ms-4 pt-4">PERSONAL INFORMATION</h3>
                <div class="col-md-3 ml-md-auto form-group pb-2" style="float:right;">
                    <label class="assoc_govIdno"><b>SSS Number/Government ID no.</b></label>
                    <input type="number" class="form-control" name="assoc_govIdno">
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <div class="form-group mt-5">
                            <label for="name" class=""><b>Name</b></label>
                            <input type="text" class="form-control" name="assoc_name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mt-5">
                            <label for="contact_number" class=""><b>Contact Number</b></label>
                            <input type="number" class="form-control" style="width: 275px" name="assoc_contact_number">
                        </div>
                    </div>
                </div>                                                     
                <div class="row">
                    <div class="col">
                        <div class="form-group ms-3">
                            <label for="email" class=""><b>Email</b></label>
                            <input type="email" class="form-control" style="width: 73%;" name="assoc_email">
                        </div>
                    </div>
                    <div class="col-md-3" style="right: 240px;">
                        <div class="form-group" >
                            <label for="birthday" class=""><b>Date of Birth</b></label>
                            <input type="birthday" class="form-control" name="assoc_birthday">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group  ms-3">
                            <label for="Unit_number" class=""><b>Unit/House No. & Street</b></label>
                            <input type="text" class="form-control" name="assoc_Unit_number">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="city" class=""><b>City/Municipality</b></label>
                            <input type="text" class="form-control" name="assoc_city">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group me-4">
                            <label for="province" class=""><b>Province</b></label>
                            <input type="text" class="form-control" name="assoc_province">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-9">
                        <div class="form-group  ms-3">
                            <label for="address" class=""><b>Complete Address</b></label>
                            <input type="text" class="form-control" name="assoc_address">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group me-4">
                            <label for="postal_number" class=""><b>Postal Number</b></label>
                            <input type="tel" class="form-control" name="assoc_postal_number">
                        </div>
                    </div>
                </div><br>
                <!-- END OF ASSOCIATE'S PERSONAL INFO -->
                <hr class="hrJi me-2">
                <h3 class="assoc_head_jobtitle headerhr ms-4 pt-1">JOB INFORMATION</h3><br>
                <div class="col-md-2 form-group mt-4 ms-4">
                    <label for="employeeId" class=""><b>Employee ID</b></label>
                    <input type="number" class="form-control" name="assoc_employeeId">
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group  ms-3">
                            <label for="Unit_number" class=""><b>Title</b></label>
                            <input type="text" class="form-control" name="assoc_Unit_number">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="city" class=""><b>Supervisor</b></label>
                            <input type="text" class="form-control" name="assoc_city">
                        </div>
                    </div>
                     <div class="col">
                        <div class="form-group me-4">
                            <label for="province" class=""><b>Start Date</b></label>
                            <input type="text" class="form-control" name="assoc_province">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-9">
                        <div class="form-group  ms-3">
                            <label for="address" class=""><b>Work Location</b></label>
                            <input type="text" class="form-control" name="assoc_address">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group me-4">
                            <label for="postal_number" class=""><b>Department</b></label>
                            <input type="tel" class="form-control" name="assoc_postal_number">
                        </div>
                    </div>
                </div><br>
                <!-- END OF ASSOCIATE'S JOB INFO -->
                <hr class="hrIoe me-2">
                <h3 class="assoc_head_ioe ms-4 pt-1">INCASE OF EMERGENCY</h3><br>
                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="form-group ms-3">
                            <label for="Ioename" class=""><b>Name</b></label>
                            <input type="text" class="form-control" name="Ioename">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group me-4">
                            <label for="Ioerelationship" class=""><b>Relationship</b></label>
                            <input type="text" class="form-control" name="Ioerelationship">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-9">
                        <div class="form-group ms-3">
                            <label for="Ioeaddress" class=""><b>Address</b></label>
                            <input type="text" class="form-control" name="Ioeaddress">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group me-4">
                            <label for="Ioecontactno" class=""><b>Contact Number</b></label>
                            <input type="number" class="form-control" name="Ioecontactno">
                        </div>
                    </div>
                </div>
                <!-- END OF ASSOCIATE'S IOE -->
            </div>

            <div class="d-grid gap-2 d-md-block mb-3 pb-3" style="float: right;"> 
                <button class="btn btn-primary" type="button">Submit</button>
                <button class="btn btn-primary" id="close_assocprofile" type="button">Cancel</button>
            </div>
            
        </form>
    </div>
</div>
 



