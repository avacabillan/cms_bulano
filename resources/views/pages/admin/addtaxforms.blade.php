
<!-- Modal -->
<div class="modal" id="addforms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Tax Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addtaxforms')}}">
                    <div class="form-group">
                        <label for=""><b>Tax Form No</b></label><br>
                        <input type="text" name="tax_form_no" id=""><br>
                        <label class="form-label"><b>Select Tax Type</b></label>
                       
                            <select name="tax_type_id" class="form-control">
                                <option> Select Tax Type</option>
                                @foreach($taxTypes as $taxType)
                                <option class="ml-3 text-sm"  value="{{$taxType->id}}" >{{ $taxType->tax_type }}</option>
                                @endforeach
                            </select>
                            
                  
                    </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
