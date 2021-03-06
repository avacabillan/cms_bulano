
@extends('layout.master')

@section('title')
    Archive
@endsection

@section('content')


  <div class="page-content mt-5"style="margin: top 160px;">

    <div class="container mt-3 pt-5" style="height:50%">
        <div>
            <h2>List of <strong>Archives</strong></h2><hr>
        </div>

        <table id="assoc-list" class="table table-bordered mt-5">

                <thead >
                    <tr>
                    <th class="text-center text-dark" scope="col">Client ID</th>
                    <th class="text-center text-dark" scope="col">File name</th>
                    <th  class="text-center text-dark" scope="col">File type</th>
                    <th  class="text-center text-dark" scope="col">Description</th>
                    <th  class="text-center text-dark" scope="col">Archived At</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($onlySoftDeleted as $onlySoftDeleteds)
                    <tr class="text-center" >
                        <td>{{  $onlySoftDeleteds->client_id }}</td>
                        <td>{{  $onlySoftDeleteds->file_name }}</td>
                        <td>{{  $onlySoftDeleteds->file_type }}</td>
                        <td>{{ $onlySoftDeleteds->description }}</td>
                
                        <td>{{ date_format($onlySoftDeleteds->deleted_at, 'jS M Y') }}</td>
                        
                    </tr>
                
                @endforeach
                </tbody>
              
            </table>
    </div>
  </div>

@stop


