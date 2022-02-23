
@extends('layout.master')

@section('title')
    Deadlines
@endsection

@section('content')


  <div class="page-content mt-5"style="margin: top 160px;">

    <div class="container mt-3 pt-5" style="height:50%">
        <div>
            <h2>List of <strong>Deadlines</strong></h2><hr>
        </div>

        <table id="assoc-list" class="table table-bordered mt-5">

                <thead >
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
                      <td>{{$deadline->start_date}}</td>
                      @if($deadline->status == 0)
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-danger btn-sm">Pending</a></td>
                      @else 
                        <td><a href="{{route('update-status', $deadline->id)}}" class="btn btn-success btn-sm" >Processed</a></td>
                      @endif
                    <td><button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#declarationModal">Attach Computation</button></td>

                      
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
<!--Declaration Attachment Modal -->
<div class="modal" id="declarationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attach File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
            <label for="">Attach Declaration Tax</label><br>
            <input type="file" name="" id=""><br><br>
            <button type="submit" class="btn btn-success" style="float: right;">Upload</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
    </div>
  </div>

@stop


