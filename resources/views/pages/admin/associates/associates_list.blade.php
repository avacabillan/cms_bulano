@extends('layout.master')

@section('title')
    Associates List
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
                    <th class="Assoc-th text-dark text-center">ID</th>
                    <th class="Assoc-th text-dark text-center">Name</th>
                    <th class="Assoc-th text-dark text-center">Contact Number</th>
                    <th class="Assoc-th text-dark text-center">Email</th>
                    <th class="Assoc-th text-dark text-center">Action</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach($associates as $associate)
                    <tr>
                        
                        <td>{{$associate->id}}</td>
                        <td>{{$associate->name}}</td>
                        <td>{{$associate->contact_number}}</td>
                        <td>{{$associate->email}}</td>
                        
                        
                        
                        <td>
                        <a  class="btn btn-success btn-sm viewbtn" href="{{route('assoc-profile',$associate->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"><i class="fas fa-eye"></a></i>
                        
                         
                        </td>                                               
                    </tr>
                @endforeach
                </tbody>
              
            </table>
    </div>
  </div>
</div>

<!--Add Assoc Modal -->
<div class="modal fade" id="addAssoc" tabindex="-1" role="dialog" aria-labelledby="headingsModal" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
        </div>
      
        <div class="modal-body">

           
        @include('pages.admin.associates.add_associate')    
                        

        </div>  
      </div>
    </div>
  </div>
</div>
<!--End Assoc Modal -->
@section('scripts')
 
    <!-- DATATABLE  EXTENTIONS-->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.2.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
@endsection
@stop