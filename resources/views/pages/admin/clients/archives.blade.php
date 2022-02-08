
@extends('layout.master')

@section('title')
    Archive
@endsection

@section('content')

<div class="siderbar_main toggled">
  <div class="page-content mt-5" style="margin-top:;10%;">
   <div class="container mt-3" style="height:50%">
   <div style="width:90%;">
    <button class="btn btn-info" onClick="window.location.reload();"><i class="fa fa-sync-alt"></i> Refresh Page</button>
            <form action="{{route('fetch_date')}}" method="post">
                @csrf      
                @method('get')        
                <div class="col-md-9 offset-md-2">
                    <div class="input-group mb-3" style="width:60%; margin-left: 60%;">
                    <input type="date" class="form-control" id="value1" name="fromDate">
                    <span class="input-group-text">to</span>
                    <input type="date" class="form-control" id="toDate" name="toDate">
                    <button class="btn btn-success" type="submit" name="search" Title="Search"><i class="fas fa-search"></i></button>
                    </div> 

                </div>
                
                
                </form>
    </div>
    <table id="assoc-list" class="table table-bordered mt-5"  style="width:100% ">

                <thead >
                    <tr>
                    <th class="text-center text-dark" scope="col">Client ID</th>
                    <th class="text-center text-dark" scope="col">File name</th>
                    <th  class="text-center text-dark" scope="col">File type</th>
                    <th  class="text-center text-dark" scope="col">Description</th>
                    <th  class="text-center text-dark" scope="col">Delete_at</th>
                    <th  class="text-center text-dark" scope="col">aCTION</th>  
                    </tr>
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
                
                   <center><a class="btn" href="{{ route('restore', $onlySoftDeleteds->id) }}" title="restore file"> <i class="fas fa-trash-restore"></i></a>
                   </center>    
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
@stop


