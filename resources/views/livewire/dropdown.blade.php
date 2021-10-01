<div class="col">
    <label for="status">Select Group</label>
        <select class="form-control" wire:model="selectedGroup">
            <option value="">--Select a Group--</option>
            @foreach ($groups as $item)
            <option value="{{ $item->id }}">{{ $item->group_name }}</option>
            @endforeach
        </select>
  
        @if (!is_null($corporates))
        <label for="status">Select a Corporate</label>
            <select name="corporate" class="form-control" wire:model="selectedCorp">
                <option value="">--Select a Corporate--</option>
                @foreach ($corporates as $item)
                <option value="{{ $item->id }}">{{ $item->corporate_name }}</option>
                @endforeach
            </select>
         @endif
 
</div>
 


