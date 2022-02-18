@extends('layout.master')
@section('title')
    Sent messages
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">
    <div class="page-content"><br><br><br>
        <div class="mx-auto col-md-10 offset-md-1 bg-light mt-5" style="margin-top: 25px;">
            <div class="row mt-3">
                <h3 class="text-center mt-2 mb-4"><strong>Sent Messages</strong></h3>
                <div class="col-sm-3 col-md-2">
                    <div class="" style="width:25%;right:0;"> 
                        <button class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#compose_msg">COMPOSE</button><br>
                        <a href="#" class="text-decoration-none text-dark mt-5">Inbox<span class="badge pull-right">42</span></a>
                        <a href="#" class="text-decoration-none text-dark">Sent</a>
                        <a href="#" class="text-decoration-none text-dark">DeleteAll</a>
                    </div>
                </div>
                
                <div class="col-sm-9 col-md-10">
                    <div class="mail-box">
                        <div class="inbox-body">
                            <table class="table table-inbox table-hover">
                                <tbody>
                                    <tr class="unread">
                                        <td class="inbox-small-cells">
                                            <input type="checkbox" class="mail-checkbox">
                                        </td>
                                        <!-- <td class="inbox-small-cells"><i class="fa fa-star"></i></td> -->
                                        <td class="view-message  dont-show"><b>Sender</b></td>
                                        <td class="view-message ">the message</td>
                                        <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                        <td class="view-message  text-right">Date/Time</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells">
                                            <input type="checkbox" class="mail-checkbox">
                                        </td>
                                        <!-- <td class="inbox-small-cells"><i class="fa fa-star"></i></td> -->
                                        <td class="view-message  dont-show"><b>Sender</b></td>
                                        <td class="view-message ">the message</td>
                                        <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                        <td class="view-message  text-right">Date/Time</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells">
                                            <input type="checkbox" class="mail-checkbox">
                                        </td>
                                        <!-- <td class="inbox-small-cells"><i class="fa fa-star"></i></td> -->
                                        <td class="view-message  dont-show"><b>Sender</b></td>
                                        <td class="view-message ">the message</td>
                                        <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                                        <td class="view-message  text-right">Date/Time</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.admin.messages.compose')
        @include('sweetalert::alert')
    </div>
</div>