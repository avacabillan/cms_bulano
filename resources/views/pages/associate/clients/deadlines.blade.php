
@extends('layout.master')

@section('title')
    Deadlines
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-dark card-outline">
          <div class="card-header">
            <h3 class="card-title">List of Deadlines</h3><br>
            <hr>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div> -->
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table id="assoc-list" class="table table-bordered mt-5">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Tax Form No</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Tax Declaration</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($reminders as $deadline)
                    <tr>
                      <td>{{$deadline->title}}</td>
                      <td>{{$deadline->tax_form_no}}</td>
                      <td>{{ \Carbon\Carbon::parse($deadline->start_date)->format('F d, Y')}}</td>
                      @if($deadline->status == 0)
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-danger btn-sm">Pending</a></td>
                      @else 
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-success btn-sm" >Processed</a></td>
                      @endif
                      
                      <td>
                    
                      <a type="button" class="btn btn-success btn-sm" data-id="{{$deadline->id}}" data-bs-toggle="modal" data-bs-target="#declarationModal">Attach Computation</a>
                      @endforeach
                    </td>

                      
                    </tr>
                    
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

          </div>
        </div>
      </div>
    </div>    <!-- /.card -->
  </div>
  <?php 
  foreach($reminders as $reminder)
   $id= $reminder->id;
  ?>
  <div class="modal" id="declarationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attach File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
            
            <div class="card-body" >
              <form  action="{{route('attach-declaration', $id)}}" method="POST" enctype="multipart/form-data" id="uploadFile" >
                <input class="form-control" type="hidden" value="{{$deadline->id}}" name="client_id">
                @csrf
                @method('post')
                
                      <div class="input-group ">
                        <input class="form-control mb-5" id="inputGroupFile02" name="file" type="file">
                      </div>
                        <button class="btn btn-success mt-5 saveBtn" type="submit" value="uploadFile" >Save</button>
               
                      </form>  
             
            </div>
        </div>
        
      </div>
    </div>
  </div>
    </div>
  </div>       
</section>
@stop


