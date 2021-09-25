@extends('layout.master')
@section('title')
@stop
@section('content')


<div class="col-md-8 offset-md-2 mt-3">
    <a href="{{route('listClients')}}" class="btn btn-outline-dark me-md-2 mt-3" id="btnclient" >Add Client</a>
        <table class="table table-dark table-striped mt-3">
            <thead>
                    <tr>
                        <th  class="text-center" scope="col">Clients Name</th>
                        <th  class="text-center" scope="col">Archive</th>
                        
                    </tr>
            </thead>
            <tbody>
            @foreach($clients as $client )
                <tr>
                    <td><a href="{{route('clients.show', $client ->id)}}" class="text-white ms-2">{{$client ->client_name}}</a></td>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td>
                            <button type="submit" title="delete" style="border: none; background-color:transparent;"
                                ><i class="fas fa-trash fa-sm text-danger"></i>
                            </button>
                        </td>
                    </form>
                        
                </tr>
                
            @endforeach 
            </tbody>
        </table>  
</div>
 

@stop


