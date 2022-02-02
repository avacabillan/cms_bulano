
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

 
    <div class="container mt-3 pt-5" style="height:50%">
      <button type="button" class="btn btn-primary mt-2 mb-2 me-3" data-toggle="modal" data-target="#addAssoc" style="float: right;"><i class="fas fa-plus-circle"></i> Add Associate</button>
      <div>
        <h2>List of <strong>Associates</strong></h2><hr>
      </div>
        <table class="table table-hover table-condensed" id="assoc">
          <thead>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Delete All</button></th>
          </thead>
          <tbody></tbody>
        </table>
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

<script>
  $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                
          //GET ALL COUNTRIES
          var table =  $('#assoc').DataTable({
                processing:true,
                info:true,
                ajax:"{{ route('associates_table') }}",
                columns:[
                  //  {data:'id', name:'id'}
                    {data:'name', name:'name', orderable:false},
                    {data:'department', name:'department', orderable:false},
                    {data:'position', name:'position', orderable:false},
                    {data:'actions', name:'actions', orderable:false, searchable:false},
                ]
        })
      });
</script>
@endsection
