@extends('layout.master')
@section('title')
    Type of taxes
@stop
@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card card-dark card-outline me-2 ms-2">
                    <div class="card-header">
                        <h3 class="card-title">Type of Taxes</h3><br>
                        <hr>
                        
                        <table class="table table-bordered yajra-datatable" >
                            <thead>
                                <th class="text-center">File Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">File type</th>
                            </thead> 
                            <tbody>
                                @foreach($datas as $pay)
                                    <tr>                       
                                        <td>{{$pay->file_name}}</td>
                                        <td>{{$pay->description}}</td>
                                        <td>{{$pay->file_type}}</td>                       
                                        <td><a class="btn btn-lg" href="{{route('archive' ,$pay->id)}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Archive"><i class="fas fa-archive"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @include('sweetalert::alert')
</div>
@endsection