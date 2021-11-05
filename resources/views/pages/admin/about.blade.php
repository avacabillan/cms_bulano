@extends('layout.master')
@section('title')
About
@stop

@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')

<div class="siderbar_main toggled">
    <div class="page-content"><br><br><br>
        <div class="mx-auto col-md-10 offset-md-1 bg-light mt-5" style="margin-top: 25px;">
            <div class="row mt-3">
                <h3 class="text-center mt-2 mb-4"><strong>Inbox</strong></h3>
                <div class="col-sm-3 col-md-2">
                    <div class="" style="width:25%;right:0;"> 
                        <button class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#compose_msg">COMPOSE</button><br>
                        <a href="#" class="text-decoration-none text-dark mt-5">Inbox<span class="badge pull-right">42</span></a>
                        <a href="" class="text-decoration-none text-dark">Sent</a>
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
        <!-- <div class="admin_about ms-3 me-3">
            <div class="about_heading ms-3">COMPANY PROFILE</div>
            <hr class="breakline ms-2 me-2" style="width: 98%">
            <div class="introduction ms-3 me-2">
                <p>   
                    Diosdado C. Bulano, CPA founded Bulano Accounting and Auditing Office (‘the Firm’) on 
                August 18, 1996. The Firm is duly existing and registered under the Republic of the Philippines through
                Department of Trade and Industry as a sole proprietorship entity under the name and management of
                Diosdado C. Bulano.
                </p> 
            </div>
            <div class="body ms-3">
                <p>
                    The Firm is a multidisciplinary professional services firm offering<br>
                    (1) Accounting and Tax Services,<br>
                    (2) Business Services, <br>
                    (3) Audit Services and, <br>
                    (4) Management Services. Diosdado C. Bulano is an 
                    accredited practitioner by Board of Accountancy (BOA), <br>
                    Philippine Contractors Accreditation Board (PCAB), <br>
                    Bureau of Internal Revenue (BIR) and <br>
                    Cooperative Development Authority (CDA). <br>
                    He is a member in good standing of the Philippine Institute of Certified Public Accountants (PICPA).
                </p>
            </div>
            <div class="conclusion ms-3 me-2">
                <p>
                        The Firm has ever since grown, starting with 5 clients in 1996 to more than 200 clients at present. It
                    caters to clients in varied industries both in nonprofit and profit organizations such as cooperatives,
                    schools, foundations, religious institutions, professionals, advertising, lending and financing, tourism,
                    warehousing, agriculture, food and restaurant, manufacturing, real estate, construction, trading in
                    retail and wholesale, hardware, entertainment and amusement, transportation: land, water and air,
                    services, energy and petroleum, pawnshops, security services and etc.
                    The Firm is affiliated with several schools in the region in providing on the job training for business
                    students, including: Ateneo de Davao University, University of Mindanao, Jesus Maria College of
                    Davao City, Norte Dame of Marbel University, Christian College of Southeast Asia, Holy Cross of
                    Davao College and Davao Central College.
                </p>
            </div>
        </div> -->

        <!--- END OF COMPANY PROFILE --->

        <!--- COMPANY VMG --->
        <!-- <div class="admin_vmg ms-3 me-3">
            <div class="vmg_heading ms-3">VISION, MISSION, KEYS TO SUCCESS AND VALUES</div>
            <hr class="breakline ms-2 me-2" style="width: 98%">
            <div class="vmg_vision ms-3 me-2">
                <p><strong>Vision</strong></p>
                <p class="vmg_vision_text">
                        To be a partner of our clients in their business growth development and partner of the Republic of the
                    Philippines in nation building.
                </p> 
            </div>
            <div class="vmg_mission ms-3 me-2">
                <p><strong>Mission</strong></p>
                <p class="vmg_mission_text">
                    * Building a better working world by helping small and medium scale entrepreneurs grow by
                    providing value added and quality services while nurturing responsible associate, and
                    educating and inspiring every Filipino to love the country by paying the right taxes.<br>
                    * Providing best training and experience to accounting, tax and audit associates and apprentices
                    in order to contribute good and competent people to the Philippine business environment. The
                    legacy we give are the quality of leaders we bring to the world.
                </p> 
            </div>
            <div class="vmg_Key_to_Success ms-3 me-2">
                <p><strong>Key to Success</strong></p>
                <p class="vmg_Key_to_Success_text">
                    * Creating high performing teams of people that are knowledgeable and able to excel and
                    render highest quality service; <br>
                    * Making economic and financial resources available and utilizing them wisely; and, <br>
                    * Sustainable management and driven leadership. <br>

                </p> 
            </div>
            <div class="vmg_Our_values ms-3 me-2">
                <p><strong>Our Values</strong></p>
                <p class="vmg_Our_values_text">
                    * Integrity: Leading and pressing forward by choosing to do the right thing<br>
                    * Confidence and confidentiality: Protecting our client’s interests <br>
                    * Teamwork: Building trust and relationship among our people <br>
                    * Learning and Innovation: Constantly seeking for improvement and opportunities for learning and growth.

                </p> 
            </div>
        </div> -->

        <!--- END OF VMG --->

    </div>
</div>  
        


@stop