
@extends('layout.master')
@section('title')
    Positions
@endsection
@section('content')


<div class="container-fluid">
    
<div class="row">
  
  <div class="col-10">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">    
        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addpost" style="float: right;">
        <i class="fas fa-plus-circle"></i>Add Position
        </button>
        <table id="assoc-list" orderable="false" class="table table-bordered mt-5" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Position</th>  
              <th class="Client-th text-dark text-center">Action</th>                                                          
            </tr>
          </thead> 
          <tbody> 
            @foreach($positions as $position)
              <tr>                     
              <td>{{$position->position_name}}</td>  
              <td><a href="{{route('deletePost', $position->id)}}"  onclick="return confirm(`Are you sure  you want to delete this data? `)" class="edit btn btn-danger btn-sm">Delete</a></td>                                       
              </tr>
            @endforeach 
            
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
    <div class="modal" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Position</h5>
                </div>
                    <form action="{{route('add_position')}}" method="PUT">
                        
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Position</label>
                                    <input type="text" name="postname" class="form-control mb-5" placeholder="Enter Position Name">
                            </div>
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-secondary mt-5" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary mt-5">Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@include('sweetalert::alert')
@include('sweetalert::alert')
@include('sweetalert::alert')
@endsection