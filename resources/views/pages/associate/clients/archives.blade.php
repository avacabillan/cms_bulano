@extends('layout.master')

@section('title')
    Archive
@endsection

@section('content')

@include('shared.sidebar')
<div class="siderbar_main toggled">
  <button class="btn btn-danger d-none mt-5 pt-5 mb-2" id="deleteallClients" style="float: right;">Delete All</button>
  <!-- <button type="button" class="btn btn-primary mt-5 mb-5 me-2" data-toggle="modal" data-target="#addClient" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Client</button> -->
  <div class="page-content mt-5 pt-3 " style="margin: top 160px;">
  
    <div class="container mt-5" style="height:50%">
      <table id="clients-list" class="table table-bordered"  style="width:100% ">
        <thead >
          <tr>
            <!-- <th>
              <input type="checkbox" id="selectAll" value="id" name="Archivecheckbox"><label></label>               
            </th> -->
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
  </div>
</div>


@endsection