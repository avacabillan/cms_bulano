@extends('layout.master')
@section('title')
    
@endsection 
@section('content')
<div class="col-md-8 offset-md-2 mt-5">

    <table class="table table-light table-striped mt-5">
        <thead>
            <tr>
                <th  class="text-center text-dark" scope="col">File name</th>
                <th  class="text-center text-dark" scope="col">File type</th>
                <th  class="text-center text-dark" scope="col">Description</th>
                <th  class="text-center text-dark" scope="col">Delete_at</th>
                <th  class="text-center text-dark" scope="col">Restore</th>
            </tr>
        </thead>
        <tbody>
        @foreach($onlySoftDeleted as $onlySoftDeleteds)
            <tr class="text-center" >
                <td>{{  $onlySoftDeleteds->file_name }}</td>
                <td>{{  $onlySoftDeleteds->file_type }}</td>
                <td>{{ $onlySoftDeleteds->description }}</td>
           
                <td>{{ date_format($onlySoftDeleteds->deleted_at, 'jS M Y') }}</td>
                <td>
                
                   <a class="text-dark" href="{{ route('restore', $onlySoftDeleteds->id) }}" title="restore project"> Restore</a>
                
                </td>
            </tr>
            <tr>
            
            </tr>
        @endforeach
        </tbody>
    </table>  
</div> 
@endsection