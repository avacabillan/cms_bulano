<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
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
</style>
<body background="images/welcome_pg.jpg" style=" background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <nav>
        <img class="logo-img" src="images/Logo.png" width="80" height="80" ALT="company logo">
        <ul>
            <li> <a class="link" href=""> Home </a> </li>
            <li> <a class="link" href="#ABOUT"> About </a></li>
            <li> <a class="link" href=""> Services </a></li>
            <li> <button class="btn btn-dark fw-900"type="submit">LOGIN</button></li>
        </ul>  
    </nav>

    <div class="welcome_pg_content">
        <h1 class="heading_line">BE PART OF OUR TEAM</h1>
        <button class="btn btn-dark" style="margin-left: 40%;" type="submit">REGISTER</button>
        <button type="button" class="btn btn-outline-dark">Primary</button>
    </div>
 
<br><br><br><br><br><br><br><br><br><br><br>
    <div class="About_content" id="ABOUT" >
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
            </section>
        </div>
    </div>

</body>

</html>