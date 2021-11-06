@extends('layout.master')

@section('title')
    Due Date
@endsection

@section('content')
@include('shared.navbar')
@include('shared.sidebar')


<div class="siderbar_main toggled">
    <div class="page-content mt-5 pt-3">

    
    <div class="container">
        <div class="row">

            <div class="col mt-5 pt-4">
                <h2>INVOICE</h2>
                <p class="heading_text pt-2 ms-4">Bulano Accounting and<br>
                    Auditing Firm<br> 3rd Floor Block. 27 Lot 2,<br>
                    Jacinto street<br> DAVAO CITY DAVAO DEL <br> SUR 8000<br>
                    PHILIPPINES
                </p>
            </div>

            <div class="col-md-auto mt-5 pt-5">
                <h5>Invoice Date</h5>
                <p>1 November 2021</p>
                <h5>Invoice Number</h5>
                <p>INV-2466</p>
            </div>

            <div class="col col-lg-2">
                <a class="duedate_form">
                    <img src="images/Logo.png" width="80" height="80">
                </a>
                <p class="heading_text pt-2">Bulano Accounting<br>
                    and Auditing Firm<br> 3rd Flr Block. 27 <br> Lot 2,
                    Jacinto street<br> DAVAO CITY DAVAO DEL SUR 8000<br>
                    PHILIPPINES
                </p>
            </div>

        </div>
    </div>

    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-dark">Description</th>
                    <th class="text-dark">Quantity</th>
                    <th class="text-dark">Unit/Price</th>
                    <th class="text-dark">TAX</th>
                    <th class="text-dark">Amount PHP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Tax Compliance Retainership</th>
                    <th>1 pc</th>
                    <th>P 5,000.00</th>
                    <th>Tax on Sales</th>
                    <th>5,000.00</th>
                </tr>
                <tr>
                    <th>Tax Compliance Retainership</th>
                    <th>1 pc</th>
                    <th>P 5,000.00</th>
                    <th>Tax on Sales</th>
                    <th>5,000.00</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="col-6 col-md-4" style="float: right;">
            <h6 style="float: right;">Subtotal 5,000.00</h6>
            <hr>
            <h5 style="float: right;">TOTAL PHP 5,000.00</h5>
        </div>
    </div>

    <div class="container">
        <div class="col-6 col-md-4 mt-5 pt-5" style="float: left;">
            <h5>Due Date: 10 November 2021</h5>
            <p>Please issue check payable to<br>Diosdado C. Bulano</p>
        </div>
    </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
@stop

