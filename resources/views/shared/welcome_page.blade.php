<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title> Bulano Accounting & Auditing Firm</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<style>
.logo-img {
    margin-top: 1%;
    margin-left: 1%;
}
.link {
  position: relative;
}
.link:after {
  content: '';
  position: absolute;
  bottom: -.4em;
  left: 50%;
  right: 50%;
  height: 1px;
  background: white;
  -webkit-transition: all ease .2s;
  transition: all ease .2s;
}
.link:hover:after {
  left: 0;
  right: 0;
  height: 2px;
}
nav ul li {
  float: left;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  padding: 15px;
  list-style-type: none;
}
nav ul {
  float: right;
  display: block;
  padding: 15px;
}
nav ul li a {
  text-decoration: none;
  color: white;
}
.heading_line {
    margin-top: 11%;
    margin-left: 30%;
}
.section4{
width:100%;
display:flex;
align-items:top;
}

.section4 section{
width:100%;
padding:2rem;
}

.section4 section .title{
font-size:3em;
}

.section4 section p{
color:rgba(1,1,1,0.7);
}

.section4 section img{
-webkit-transform: scaleX(-1);
transform: scaleX(-1);
}

.section4 span{
width:100%;
display:block;
margin:10px 0;
background-color:#f4f8f7;
border-radius:10px;
display:flex;
align-items:center;
padding:0rem 1rem;
}

.section4 span .fa{
margin:0 10px;
font-size:2em;
}

.section4 span b{
color:var(--pink);
}

@media (max-width:920px){
.section4{
flex-wrap:wrap;
}
.section4 section{
padding:1rem;
}
.section4 section .title{
font-size:1.5em;
}
}

    .service-title h4 {
    position: relative;
    display: inline-block;
}
.service-icon {
    position: relative;
}
.service-title p {
    padding: 0 190px;
    margin-bottom: 10px;
}

.service-icon i {
    font-size: 40px;
    color: #e8bc00;
    margin-bottom: 20px;
    display: inline-block;
}
.service-wrap {
    border: 1px solid #e6e6e6;
    padding: 50px 30px;
      position: relative;
}

.service-wrap p{
      position: relative;
}

.service-wrap:hover {
    background-image: url(https://i.ibb.co/mykzQks/services1.jpg);
    background-size: cover;
    background-position: center center;
    background-attachment: local;
    transition: all .5s;
}

.service-wrap:hover:before {
    background: rgba(0, 0, 0, 0.2901960784313726);
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0px;
    content: "";
    top: 0;
    opacity: 1;
}

.service-wrap:hover h4,.service-wrap:hover p{
    color: #fff;
}
.service-wrap h4 {
    font-weight: 600;
    color: #1e2331;
    margin-bottom: 17px;
    font-size: 18px;
    text-transform: capitalize;
      position: relative;
}
.fixed-top {
    background-color: #333;
    height: 15%;
}

.fixed-top ul li a link {
  overflow-y: auto;
}

</style>
<body background="images/welcome_pg.jpg" style=" background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <nav class="fixed-top">
        <img class="logo-img" src="images/bulano.png" width="55" height="55" ALT="company logo">
        <ul>
            <li> <a class="link" href="#HOME"> Home </a> </li>
            <li> <a class="link" href="#ABOUT"> About </a></li>
            <li> <a class="link" href="#SERVICES"> Services </a></li>
            <li> <a class="btn btn-dark fw-900" href="{{route('login')}}">LOGIN</a></li>
        </ul>  
    </nav>

    <div class="welcome_pg_content pt-5 mt-5" id="HOME">
        <h1 class="heading_line">BE PART OF OUR TEAM</h1>
        <a class="btn btn-outline-dark" href="{{route('register')}}" style="margin-left: 40%;">REGISTER</a>
        <button type="button" class="btn btn-dark">Learn More.</button>
    </div>
    <!-- ABOUT -->
    <div class="About_content" id="ABOUT" style="margin-top:20%;">
        <div class="section4" style="background-color: white;">
            <section>
                <img src="images/about_img.png" alt="" loading="lazy">
                <img src="images/aboutt_img.jpg" width="650" height="450" alt="" loading="lazy">
            </section>
            <section>
                <h1 class="title">About Us</h1>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="introduction ms-3 me-2">
                            <h5 class="about_heading text-center">COMPANY PROFILE</h5>

                                <p>   
                                    <b>Diosdado C. Bulano, CPA </b>founded Bulano Accounting and Auditing Office (‘the Firm’) on 
                                    <b> August 18, 1996</b>. The Firm is duly existing and registered under the Republic of the Philippines through
                                    Department of Trade and Industry as a sole proprietorship entity under the name and management of
                                    <b>Diosdado C. Bulano</b>.
                                </p> 
                            </div>
                        </div><!-- /.tab-pane -->
                        <div class="body ms-3">
                            <p>
                    The Firm is a multidisciplinary professional services firm offering<br>
                    (1) Accounting and Tax Services,<br>
                    (2) Business Services, <br>
                    (3) Audit Services and, <br>
                    (4) Management Services. Diosdado C. Bulano is an 
                    accredited practitioner by <b>B</b>oard <b>o</b>f <b>A</b>ccountancy (BOA), <br>
                    <b>P</b>hilippine <b>C</b>ontractors <b>A</b>ccreditation <b>B</b>oard (PCAB), <br>
                    <b>B</b>ureau of <b>I</b>nternal <b>R</b>evenue (BIR) and <br>
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
            </section>
        </div>
    </div>
    <!-- SERVICES -->
    <div class="row" id="SERVICES">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card card-dark card-outline me-2 ms-2 mt-2">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3"><b>SERVICES</b></h3>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            <section class="service-grid pb-5 pt-5">
                                <div class="container">
                
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1 text-center mb-3">
                                            <div class="service-wrap">
                                                <h4>Accounting and Tax Services</h4>
                                                <hr>
                                                <p>
                                                    * Assist companies in the application of accounting policies for compliance with acceptable accounting standards 
                                                      and appropriate accounting procedures for recording, classifying and summarizing and reporting of financial 
                                                      transactions. At the same time, providing awareness of new developments in accounting and tax standards.<br>
                                                    * Preparation and filing of annual income tax returns and annual financial statements in
                                                      accordance with acceptable accounting standards and framework.<br>
                                                    * Compliance with regulatory bodies through preparation and filing of all tax types
                                                      registered under the Bureau of Internal Revenue (BIR) as specified in the Certificate of
                                                      Registration covering monthly, quarterly and annual tax returns and reports in compliance
                                                      with National Internal Revenue Code, Revenue Regulations, Revenue Memorandum
                                                      Orders and Revenue Memorandum Circulars.<br>
                                                    * Regular review and monitoring, even as requested by management, of status of
                                                      compliance of the Company with the regulatory bodies particularly Securities and
                                                      Exchange Commission (SEC) and BIR.<br>
                                                    * Conduct trainings and seminars regarding accounting procedures and regulatory updates<br>
                                                </p> 
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center mb-3">
                                            <div class="service-wrap">                         
                                                <h4>Management Services</h4>
                                                <hr>
                                                <p>
                                                    * Assists in the negotiations with BIR examinations and assessments<br>
                                                    * Agreed-upon procedures<br>
                                                    * Assists in the negotiations with Business Bureau of Davao City and other regulatory
                                                      bodies during examinations and assessments<br>
                                                    * Provides business process review and recommendations on internal control procedures of
                                                      the financial operations of the Company<br>
                                                    * Performs agreed-upon procedures involving review, compilation<br>
                                                    * Provides verification or certification of financial information of an entity for reporting
                                                      requirement<br>
                                                    * Assists entities in setting-up manual accounting system<br>
                                                 </p>                             
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center mb-3">
                                            <div class="service-wrap">                         
                                                <h4>Business Services</h4>
                                                <hr>
                                                <p>
                                                    * Assists new entities in the preparation and submission of regulatory requirements and
                                                      registration of the business with Business Bureau of Davao City, SEC or Department of
                                                      Trade and Industry (DTI) and BIR <br>
                                                    * Assists entities in obtaining business requirements with Business Bureau of Davao City,
                                                      SEC or DTI and BIR for branching out, change in business information, dividend
                                                      declarations, increase in authorized share capital and any other changes or amendments,
                                                      etc. <br>
                                                    * Assists retiring companies in the preparation and submission of regulatory requirements
                                                      with Business Bureau of Davao City, SEC or DTI and BIR for the retirement of business <br>
                                                </p>                   
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 text-center mb-3">
                                            <div class="service-wrap">                         
                                                <h4>Audit Services</h4>
                                                <hr>
                                                <p>
                                                    1. Financial statements audit <br>
                                                </p>                  
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 text-center mb-3">
                                            <div class="service-wrap">                         
                                                <h4>Audit Services</h4>
                                                <hr>
                                                <p>
                                                    2. Internal audit <br>
                                                </p>                  
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 text-center mb-3">
                                            <div class="service-wrap">                         
                                                <h4>Audit Services</h4>
                                                <hr>
                                                <p>
                                                    3. Management audit <br>
                                                </p>                  
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            
                        </div><!-- /.tab-pane -->
                    </div>
                </div> 
                
            </div>
        </div>
    </div>

</body>

</html>