@extends('layout.master')
@section('title')
@stop

@section('content')
<div class="card bg-light sticky-top justify-content-sm-center pr-5 pl-5 mb-5 pb-5" style="width: 40rem;">
    <div class="text-center">
        <h3 class="text-dark mt-1">Create New User</h3> 
    </div>
    <div class="form mt-3">
    <div class="input-group inputbox"> <input type="text" placeholder="First name" class="form-control"> <input type="text" placeholder="Last name" class="form-control"> </div><br>
        <div class="inputbox"> <input type="text" class="form-control" placeholder="Username"> </div><br>
        <div class="inputbox"> <input type="password" class="form-control" placeholder="Password"> </div><br>
        <div class="inputbox"> <input type="text" class="form-control" placeholder="Role"> </div><br>
    </div>
    <div class="mt-4 proceed"> <button class="btn btn-primary btn-block d-flex flex-row justify-content-between align-items-center">
            <div class="text-center"> <span>Create Account</span> </div>
            <div class="text-right"> <span><i class="fa fa-long-arrow-right align-items-center"></i></span> </div>
        </button> </div>
    
</div>
@stop