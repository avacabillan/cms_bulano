<div>
    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1"> Select Groups </label>
            <select class="form-control" name="group" id="group" required>
                <option value=""> Select </option>
                @foreach($groups as $group)
                <option value="group->id">Group{{$group}}</option>
                @endforeach
            </select>
        </div>

            @if (!is_null($sections))
            <div class="form-group">
                <label for="exampleInputEmail1"> Select Corporate </label>
                <select class="form-control" name="subCorporate" id="subCorporate" required>
                    <option value=""> Select </option>
                    @foreach($subCorporates as $subCorporate)
                        <option value="{{$subCorporate->id}}"> {{ $subCorporate }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            {{ $selectedSection }}



        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Add Assignment</button>
            <div wire:loading>
                Hold On...
            </div>
        </div>
        <!-- /.card-footer -->
    </form>
</div>