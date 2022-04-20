
@extends('layout.master')
@section('title')
    Form 
@endsection 
@section('content')

<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card card-dark card-outline">

          <div class="card-header">
            <h3 class="card-title">Forms</h3>
          </div><!-- /.card-header -->

          <table class="table table-bordered yajra-datatable">
            <thead>
              <tr>
              <th>File Name</th> 
                <th>Description</th>
                <th>File Type</th>
                <th>Action</th>                  
              </tr>
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

@stop