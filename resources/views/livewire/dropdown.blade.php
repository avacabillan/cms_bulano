<div class="col">
    <label for="validationCustom17" class="form-label">Select Group</label>
        <select name="corporate" class="form-control" wire:model="selectedGroup" id="validationCustom17" value="Mark" required>
            <option value="">--Select a Group--</option>
            @foreach ($groups as $item)
            <option value="{{ $item->id }}">{{ $item->group_name }}</option>
            @endforeach
        </select>
        
  
        @if (!is_null($corporates))
        <label for="validationCustom18" class="form-label">Select a Corporate</label>
            <select name="corporate" class="form-control" wire:model="selectedCorp" id="validationCustom18" value="Mark" required>
                <option value="">--Select a Corporate--</option>
                @foreach ($corporates as $item)
                <option value="{{ $item->id }}">{{ $item->corporate_name }}</option>
                @endforeach
            </select>
            <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please select group and corporate.
              </div>
            </div>
         @endif
 
</div>
 


