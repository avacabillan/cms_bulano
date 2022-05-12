
@extends('layout.master')
@section('title')
    Companies
@endsection
@section('content')


<div class="container-fluid">
    
<div class="row">
  
  <div class="col-10">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">
      
        
        <hr>
        <table id="assoc-list" orderable="false" class="table table-bordered mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Trade Name</th>
              <th class="Client-th text-dark text-center">Industry Type</th>  
              <th class="Client-th text-dark text-center">Group</th>          
              <th class="Client-th text-dark text-center">Registration Date</th>                                          
    
            </tr>
          </thead> 
          <tbody> 
            @foreach($companies as $company)
            

              <tr>                     
              <td>{{$company->trade_name}}</td>
              <td>{{$company->corporate_name}}</td>
              <td>{{$company->group_name}}</td>
              <td>{{ \Carbon\Carbon::parse($company->registration_date)->format('F d, Y')}}</td>
                                       
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
@include('sweetalert::alert')
@include('sweetalert::alert')
@endsection