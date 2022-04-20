<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
                          
<title>
  Form
</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>

  
</head>
<body>



<div class="row">
    <div class="col-12">
      <div class="card card-dark card-outline me-2 ms-2">
        <div class="card-header">
          <h3 class="card-title">List of All <b>Associates</b></h3><br>
          <hr>
          <table class="table table-bordered yajra-datatable" id="yajra-datatable" >
            <thead >
            <th>File Name</th> 
                <th>Description</th>
                <th>File Type</th>
                <th>Action</th>
            </thead> 
            <tbody>
            @foreach($datas as $pay)
                <tr>
                    <td>{{$pay->file_name}}</td>
                    <td>{{$pay->description}}</td>
                    <td>{{$pay->file_type}}</td>
                    {{-- <td><button><a href="{{url('/view',$pay->id)}}">View</a></button></td> --}}
                    <td><a class="btn btn-info" data-fancybox data-type="iframe" data-src="{{url('/view',$pay->id)}}" href="{{url('/view',$pay->id)}}">
                      View 
                  </a></td>
                                    
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
  $('[data-fancybox]').fancybox({
	toolbar  : false,
	smallBtn : true,
	iframe : {
		preload : false,
    css : {
            width : '800px'
            
        }
	}
})
</script>
@extends('layout.master')                
</body>
</html>







@extends('layout.master')
@section('title')
    Associate Dash
@endsection 
@section('content')

<div class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card card-dark card-outline me-2 ms-2">
        <div class="card-header">
          <h3 class="card-title">List of All <b>Associates</b></h3><br>
          <hr>
          <table class="table table-bordered yajra-datatable" id="yajra-datatable" >
            <thead >
            <th>File Name</th> 
                <th>Description</th>
                <th>File Type</th>
                <th>Action</th>
            </thead> 
            <tbody>
            @foreach($datas as $pay)
                <tr>
                    <td>{{$pay->file_name}}</td>
                    <td>{{$pay->description}}</td>
                    <td>{{$pay->file_type}}</td>
                    {{-- <td><button><a href="{{url('/view',$pay->id)}}">View</a></button></td> --}}
                    <td><a class="btn btn-info" data-fancybox data-type="iframe" data-src="{{url('/view',$pay->id)}}" href="{{url('/view',$pay->id)}}">
                      View 
                  </a></td>
                                    
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
  $('[data-fancybox]').fancybox({
	toolbar  : false,
	smallBtn : true,
	iframe : {
		preload : false,
    css : {
            width : '800px'
            
        }
	}
})
</script>
    </div>
</div>
 

  <script>
  $('[data-fancybox]').fancybox({
	toolbar  : false,
	smallBtn : true,
	iframe : {
		preload : false,
    css : {
            width : '800px'
            
        }
	}
})
</script>
@stop


