@extends('layout.master')
@section('title')
    
@endsection 
@section('content')
@include('pages.associate.sidebar')
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
                @foreach($datas as $pay)
                    <tr>
                        
                        
                        <td>{{$pay->file_name}}</td>
                        <td>{{$pay->description}}</td>
                        <td>{{$pay->file_type}}</td>                       
                        
                    </tr>
                @endforeach
                </tbody>
              

   </table>
   </div>
</div>
</div>
@stop

                       
                       