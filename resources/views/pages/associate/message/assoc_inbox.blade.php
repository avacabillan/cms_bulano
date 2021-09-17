@extends('layout.master')
@section('title')
@stop

@section('content')
<div class="card col-md-6 offset-md-3 mt-5 rounded show-message">
    <div class="cardheader">
        Irish Bulano (Supervisor)
        <a href="#" class="btn-back"><i class="fas fa-times-circle"></i></a>
    </div>
    <div class="card-body">
        <p style="width: 50%"><strong>Subject: </strong>New Approved Client</p>
        <div class="img-msg mt-4">
                <p>Hello,</p>
                <br>
                <p>Kindly update new client with an Client ID: 123, See attachments below</p>
                <br>
                
                <br>
                <p><strong>Regards</strong>,<br> Irish Bulano</p>
        </div>
        <div class="title">Attachments <span>(3 files, 12,44 KB)</span></div>
                <ul>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Reference.zip <span class="text-muted tx-11">(5.10 MB)</span></a></li>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Instructions.zip <span class="text-muted tx-11">(3.15 MB)</span></a></li>
                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Team-list.pdf <span class="text-muted tx-11">(4.5 MB)</span></a></li>
                </ul>
              </div>
    </div>
</div>
@stop