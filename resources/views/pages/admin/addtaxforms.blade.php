


<div class="modal" id="addforms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Tax Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addtaxforms')}}">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tax Form No</label>
                                <input type="text" class="form-control" id="" name="tax_form_no" >
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <h6 style="width: 100;"><b>Select Tax Type<b></h6>

                            <div class="form-group">
                                <select name="department" class="form-control" >
                                    <option value=""> Select Tax Type</option>
                                    @foreach($taxTypes as $taxType)
                                        <option class="ml-3 text-sm"  value="{{$taxType->id}}" >{{ $taxType->tax_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="department" class="form-control" >
                                    <option> Select Deadline</option>
                                    @foreach($schedules as $schedule)
                                        <option class="text-sm" value="{{$schedule->id}}"  >{{ $schedule->declaration}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    
                </form>
            </div>
            
        </div>
    </div>
</div>