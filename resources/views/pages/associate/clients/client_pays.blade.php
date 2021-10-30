@extends('layout.master')
@section('title')
    
@endsection 
@section('content')

<div class="page-content "style="margin: top 160px;">
    <div class="container mt-5" style="height:50%">
    
        <table id="files-list" class="table table-bordered"  style="width:100% ">
                <thead >
                    <tr>
                    <th class="Client-th text-dark text-center">File Name</th>
                    <th class="Client-th text-dark text-center">Description</th>
                    <th class="Client-th text-dark text-center">File type</th>
                    <th class="Client-th text-dark text-center">Action</th>   
                    </tr>
                </thead>
                <tbody>
                @foreach($pays as $pay)
                    <tr>
                        
                        
                        <td>{{$pay->file_name}}</td>
                        <td>{{$pay->description}}</td>
                        <td>{{$pay->file_type}}</td>
                        
                      
                        
                        
                        <td>
                         
                         <a  class="btn btn-success btn-sm" href="{{ route('archive', $pay->id) }}" >Archive</a>
                         
                        </td>
                       
                       
                        
                    </tr>
                @endforeach
                </tbody>
              
            </table>
    </div>
</div>
@stop