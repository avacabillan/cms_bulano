@extends('layout.master')

@section('title')
    Client ITR
@endsection

@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')
<div class="siderbar_main toggled">
 
<div class="page-content pt-5 mt-5" style="margin: top 180px;">
  
  <div class="container mt-3" style="height:50%">
        <table id="files-list" class="table table-bordered"  style="width:100% ">
                <thead >
                    <tr>
                    <th class="Client-th text-dark text-center">File Name</th>
                    <th class="Client-th text-dark text-center">Description</th>
                    <th class="Client-th text-dark text-center">File type</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($itrs as $itr)
                    <tr>
                        
                        
                        <td>{{$itr->file_name}}</td>
                        <td>{{$itr->description}}</td>
                        <td>{{$itr->file_type}}</td>                      
                        
                    </tr>
                @endforeach
                </tbody>
              
            </table>
    </div>
    </div>
</div>
@stop