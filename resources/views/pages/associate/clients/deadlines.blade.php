
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
                    <td><a type="button" class="btn btn-success btn-sm" data-id="{{$deadline->id}}" data-bs-toggle="modal" data-bs-target="#declarationModal">Attach Computation</a></td>

                      
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
<!--Declaration Attachment Modal -->
<!--  -->

@stop


