<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <!-- <button class="btn btn-outline-success btn-sm mt-3 mb-2" style="float: right; width:30%;"><i class="fas fa-plus-circle"></i> Add New Folder</button> -->
        <div class="modal-body">
        @livewireStyles
            <div class="col-md-8 offset-md-2 bg-light mt-3 pt-3 mb-3">
                <div class="card-body">
                <div class="form-goup">
                    <div class="row ">
                    <div class="col-9 col-sm-4 ms-3">
                        <form action="{{route('insertClient')}}" class="row" id="addClientForm" name="addClientForm">
                        
                        <h5 class="addClient_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
                    </div>

                        <div class="col-md-3 ml-md-auto form-group mt-5 pb-2">
                            <label class="form-label" style="float: left;"><b>OCN</b></label>
                            <input type="text" class="form-control" value="" name="ocn">
                        </div><br>
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
                                <input type="text" class="form-control" value="" name="client_name">
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label class="form-label" style="float: left;"><b>Email</b></label>
                                <input type="text" class="form-control" value="" name="email">
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label class="form-label" style="float: left;"><b>TIN</b></label>
                                <input type="text" class="form-control" value="" name="tin">
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label class="form-label"><b>Contact No.</b></label>
                                <input type="text" class="form-control" value="" name="client_contact">
                            </div>
                            </div>
                            
                        <div class="row mt-2" style="float: left;" >
                            <div class="col " >
                            <div class="form-group" >
                                <div name="corporate">
                                <b><livewire:dropdown /></b>
                                </div>
                            </div> 
                            </div> 
                        </div><br>
                        </div><br>
                            
                    
                    
                    <div class="AddClient_btn mt-5">
                        <button class="btn btn-primary" type="submit" value="add">Submit</button>
                        <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

                
        @livewireScripts
        </div>  
      </div>
    </div>
  </div>
</div>