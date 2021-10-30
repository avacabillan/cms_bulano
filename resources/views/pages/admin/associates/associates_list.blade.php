@extends('layout.master')

@section('title')
    Associates List
@endsection

@section('content')
@include('shared.sidebar')

 
<div class="siderbar_main toggled">

        <button type="button" class="btn btn-primary mt-5 mb-5 me-2" data-toggle="modal" data-target="#addAssoc" style="float: right;"><i class="fas fa-plus-circle"></i>Add Associate</button>
  <div class="page-content "style="margin: top 160px;">
    <div class="container mt-5" style="height:50%">
        
    
        <table id="assoc-list" class="table table-bordered"  style="width:100% ">
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
                         <a  class="btn btn-success btn-sm "  href="{{route('associate.show',$associate->id)}}"><i class="fas fa-eye"></a></i>
                        
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
@stop