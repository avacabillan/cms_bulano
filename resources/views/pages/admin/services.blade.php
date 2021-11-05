
@extends('layout.master')
@section('title')
Service
@stop

@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')

<div class="siderbar_main toggled">

    <div class="page-content">

        <div class="admin_about ms-3 me-3">
            <div class="service_heading ms-3">SERVICE</div>
            <hr class="service_breakline ms-2 me-2" style="width: 98%">
            <p class="text_service ms-4">The services offered for each department are as follows:</p>
            <div class="service ms-3 me-2">
                <p class="service_text_title">A. Accounting and Tax Services</p>
                <p class="service_text ms-5">
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
            <div class="service ms-3 me-2">
                <p class="service_text_titleB">B. Management Services</p>
                <p class="service_textB ms-5">
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
            <div class="service ms-3 me-2">
                <p class="service_text_titleC">C. Audit Services</p>
                <p class="service_textC ms-5">
                * Financial statements audit <br>
                * Internal audit <br>
                * Management audit <br>
                </p> 
            </div>
            <div class="service ms-3 me-2">
                <p class="service_text_titleD">D. Business Services</p>
                <p class="service_textD ms-5">
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
    </div>
</div>

@stop