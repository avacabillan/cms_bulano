@extends('layout.master')

@section('title')
   try
@endsection

@section('content')
@include('shared.sidebar')

 
<div class="siderbar_main toggled">

  <div class="page-content mt-5"style="margin: top 160px;">
  <button type="button" class="btn btn-primary mt-3 mb-2 me-3" data-toggle="modal" data-target="#addAssoc" style="float: right;"><i class="fas fa-plus-circle"></i>Add Associate</button>

    <div class="container mt-3" style="height:50%">

        <table id="assoc-list" class="table table-bordered mt-5"  style="width:100% ">

                <thead >
                    <tr>
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

@section('scripts')
 
    <!-- DATATABLE  EXTENTIONS-->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.2.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
@endsection


