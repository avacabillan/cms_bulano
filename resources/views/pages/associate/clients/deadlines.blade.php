
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
                    <!-- <th>QR</th> -->
                  </tr>
                </thead>
                <tbody>
                    @foreach($reminders as $deadline)
                    <tr>
                      <td>{{$deadline->title}}</td>
                      <td>{{$deadline->tax_form_no}}</td>
                      <td>{{$deadline->start_date}}</td>
                      @if($deadline->status == 0)
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-danger btn-sm">Pending</a></td>
                      @else 
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-success btn-sm" >Processed</a></td>
                      @endif
                    <td><a type="button" class="btn btn-success btn-sm" data-id="{{$deadline->id}}" data-bs-toggle="modal" data-bs-target="#declarationModal">Attach Computation</a></td>

                      
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

          </div>
        </div>
      </div>
    </div>    <!-- /.card -->
  </div>       
</section>
@stop


