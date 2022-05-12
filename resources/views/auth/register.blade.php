<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">  
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
<!-- 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- ADMIN -->
    <!-- <link rel="stylesheet" href="{{asset('css/admin_login.css')}}"> -->

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
</head>
<body class="hold-transition register-page">

    <div class="register-box" style="width:50%; margin-top: 30%; padding-bottom: 5%;">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>BULANO</b></a>
            </div>
            <div class="card-body" >
                <p class="login-box-msg">Register a new membership</p>
                <form method="POST" action="{{ route('store-requestee') }}" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full name" value="{{old('name')}}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="inquiry" placeholder="Leave a inquiry here" id="floatingTextarea2" style="height: 100px" required></textarea>
                       
                    </div>
                    <div class="input-group mb-3">
                       
                        <select name="mode" placeholder="Choose mode of filing" class="form-control" required>
                          <option value="">--Select Mode of Filing--</option>
                          @foreach($modes as $mode)
                            <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                      </div>
                    <div class="input-group mb-3">
                        <input type="file" name="cor" class="form-control pb-2" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-paperclip"></span>
                            </div>
                        </div>
                    </div>
                  
                      <input type="checkbox" name="checked" id="" required> I have read this form and understand its content and voluntarily give my consent for the collection, use, processing, storage and retention of my personal data or information to Bulano Accounting&Auditing Firm for the purpose(s) described in this document. I also understand  that my consent does not prevent the existence of other criteria for lawful processing of personal data and does not waive any of my rights under RA 10173 – Data Privacy Act of 2012 and other applicable laws.
                      <br><a href="" data-bs-toggle="modal" data-bs-target="#dataprivacy">Read Data Privacy Act</a>

                    <div class="row"><br>
                        <div class="d-grid gap-2 col-6 mx-auto mt-5">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <a class="btn btn-primary readme" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Read Me
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-outline card-primary card-body bg-light mt-2">
                            <div class="container"> 
                                <h5>Read Instruction</h5>
                                <hr>
                                <li>Please Provide Name</li>
                                <li>Phone Number for verification purposes</li>
                                <li>Specify registration purpose</li>
                                <li>Exact Email Address for approval purposes</li>
                                <li>Please attach image format of the Certificate of Registration (COR) for tax review purposes</li>
                            </div> 
                        </div>
                    </div>
                </div>
               
                <br><br><a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered? ') }}
                </a>
            </div>
        </div>
    </div>
       
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$error}}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        @endif
        
{{-- DATA PRIVACY MODAL --}}
<div class="modal" id="dataprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4>Client/Customer Data Privacy Consent Form</h4> <br>
            Bulano Accounting&Auditing Firm is committed to ensuring the confidentiality, security and protection of personal data. This document gives details on how the Company uses and protects personal data for the purpose of obtaining the consent of data subjects, in pursuant with RA 10173 also known as the Data Privacy Act (DPA) of 2012, its Implementing Rules and Regulation (IRR), and other relevant laws of the Philippines. <br><br>
            
            Bulano Accounting&Auditing Firm is committed to ensuring the confidentiality, security and protection of personal data. This document gives details on how the Company uses and protects personal data for the purpose of obtaining the consent of data subjects, in pursuant with RA 10173 also known as the Data Privacy Act (DPA) of 2012, its Implementing Rules and Regulation (IRR), and other relevant laws of the Philippines.<br><br>
            
            As a participant in one of our Training, Seminars and Workshops,  you are considered as a data subject. Please read the details of this document carefully to ensure informed consent.<br><br>
            
             <b>I. About Personal Data </b><br>
            
            Personal data refers to all types of : <br>
            
           <ul><b>Personal Information</b>  – Referring to any data or information  recorded in a material form or not, from which the identity of the individual is evident or can be reasonably and directly ascertained by the entity holding the information, or when put together with other data or information would directly and certainly identify an individual.</ul>
           <ul><b>Privileged Information </b>– Referring to any and all forms of personal data which under the Rules of the Court and other pertinent laws constitute a privileged communication.</ul><br>
           <b>II. Collection and Use of Personal Data: </b>  Bulano Accounting&Auditing Firm generally do not collect personal data unless it is provided to us voluntarily by you directly. We may use the personal data or information in order to perform business processes effectively and efficiently in conformity with corporate policies. In this regard, the company may collect your personal data in order to: <br>
            
           <li>Provide you information of new training programs and services that the company offers.</li>
          <li>Provide you with the information schedules of upcoming training, seminars and workshops that you may be interested to join.</li>
          <li>For updating of the Company Official Websites and Social Media Channels   (e.g Training. Seminar or Workshop Group Photos will be uploaded to Bulano Accounting&Auditing Firm Official Website and Facebook Page).</li> <br>
           <b>III. Type of Personal Data Collected: </b>  The company may collect the following personal data:<br><br>
            
            <li>Name</li>
            <li>Company</li>
            <li>Contact Number</li>
            <li>Email Address</li>
            <li>Position</li>
            <li>Signature</li>
            <li>Photo</li><br><br>
          <b>  IV. Confidentiality of Data:</b> Bulano Accounting&Auditing Firm  shall operate and hold personal data under strict confidentiality. The company shall not disclose or share personal information in its possession other entities without your expressed written consent. <br>
            
           <b> V. Data Protection: </b>Bulano Accounting&Auditing Firm shall implement appropriate organizational, physical and technical security measures in order to ensure the privacy and protection of personal data in its possession. The security shall aim to protect and secure data from loss, misuse, unauthorized modification, unauthorized access or disclosure , alteration or destruction. The following are the company safeguards: <br><br>
            
            <li>Strict implementation of information security policies</li>
            <li>Access Restriction to unauthorized personnel</li>
            <li>Use of secured servers and firewalls</li>
            <li>Data encryption on computing devices</li><br><br>
           <b> VI. Data Retention: </b>All personal data or information that the company had obtained shall not be retained for a period as specified by law and after the period, all hard and soft copies of personal data or information shall be disposed of and destroyed, through secured means. <br><br>
            
           <b> VII. Rights of Data Subjects :</b> As a data subject you have the following rights under Data Privacy Act of 2012: Right to be informed, Right to object, Right to access, Right to rectify or correct erroneous data, Right to erase or block, Right to secure data portability, Right to indemnified for damages, Right to file a complaint.<br><br>
            
           <b>VIII. Contact Information : </b> If you have questions or concerns or would want to lodge a complaint,  you may reach our Data Protection Officer through the following details:<br><br>
            
            Company Address : Block 27, Lot 2, Jacinto St., Davao City, Davao Del Sur, 8000 <br>
            Telephone Number: (082) 287 7859<br>
            Email Address : bulano.compliance@gmail.com<br><br>
            You may also lodge a complaint in the National Privacy Commission (NPC). For further details please refer to the NPC website: https://privacy.gov.ph<br><br><br>
            
           
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     
        </div>
      </div>
    </div>
  </div>
</body>
</html>