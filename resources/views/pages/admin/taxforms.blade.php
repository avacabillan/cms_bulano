@extends('layout.master')
@section('title')
    Tax Forms
@stop 
@section('content')



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#addforms" type="button"><i class="fas fa-plus-circle me-2"></i> Add Form</button>
               
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <h5 class="mb-2">Tax Forms</h5>
        <p class="infor-text ms-4">These are the BIR Tax Forms....</p>
        <div class="row">
         @foreach($taxForms as $taxForm)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-lg">
                    <span class="info-box-icon bg-success"><i class="fas fa-folder-open"></i></span>
                    <div class="info-box-content">
                        <h2 class="info-box-text ms-4"><b>{{$taxForm}}</b></h2>
                    </div> 
                </div>
            </div>
           @endforeach

        </div>
    </div>
</div>

@include('pages.admin.addtaxforms')

@include('sweetalert::alert')
@stop
