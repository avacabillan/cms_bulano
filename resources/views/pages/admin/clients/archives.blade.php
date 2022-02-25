
@extends('layout.master')

@section('title')
    Archive
@endsection

@section('content')

<div class="row me-2 ms-2">
    <div class="col-12">
        <div class="card card-dark card-outline">
            <div class="card-header">
                <h3 class="card-title">List of Archive</h3><br>
                <hr class="mb-2">
                <button class="btn btn-info" onClick="window.location.reload();"><i class="fa fa-sync-alt"></i> Refresh Page</button>
                <form action="{{route('fetch_date')}}" method="post">
                    @csrf      
                    @method('get')        
                    <div class="col-md-9 offset-md-2" >
                        <div class="input-group">
                            <input type="date" class="form-control" id="value1" name="fromDate">
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control" id="toDate" name="toDate">
                            <button class="btn btn-success" type="submit" name="search" Title="Search"><i class="fas fa-search"></i></button>
                         </div> 
                    </div>
                </form><br><br>
                <table id="assoc-list" class="table table-bordered mt-5" >
                    <thead >
                        <th>Client ID</th>
                        <th>File name</th>
                        <th>File type</th>
                        <th>Description</th>
                        <th>Delete_at</th>
                        <th>ACTION</th>
                    </thead> 
                    <tbody>
                        @foreach($onlySoftDeleted as $onlySoftDeleteds)
                            <tr class="text-center" >
                                <td>{{  $onlySoftDeleteds->client_id }}</td>
                                <td>{{  $onlySoftDeleteds->file_name }}</td>
                                <td>{{  $onlySoftDeleteds->file_type }}</td>
                                <td>{{ $onlySoftDeleteds->description }}</td>
           
                                <td>{{ date_format($onlySoftDeleteds->deleted_at, 'jS M Y') }}</td>
                                <td>
                                    <center><a class="btn" href="{{ route('restore-file', $onlySoftDeleteds->id) }}" title="restore file"> <i class="fas fa-trash-restore"></i></a></center>    
                                </td>
                            </tr>
                            <tr>
            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@stop


