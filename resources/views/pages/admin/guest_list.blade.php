@extends('layout.master')
@section('title')
Admin Guest List
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">

    <div class="page-content">

        <div class="guest_list">
       
        <a href="#" class="btn btn-info" role="button">Link Button</a>
            <table class="table_guest">
            <button type="button" class="btn btn-outline-dark">Dark</button>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                        <th>File</th>
                        <th>Associates</th>
                        <th>Action</th>       
                    </tr>                                                                                                                        
                </thead>
                <tbody>
                    <tr>
                        <td>Bianca Mae Cortez</td>
                        <td>Sto Nino Agdao Davao City</td>
                        <td>biancacortz123@gmail.com</td>
                        <td>cor.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Ava Joy Mahinay</td>
                        <td>Talisay Buhangin Davao City</td>
                        <td>avajoymahinay@gmail.com</td>
                        <td>cor1.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Jean Jay Daniel</td>
                        <td>52-D Boulevard Davao City</td>
                        <td>jeandaniel99@gmail.com</td>
                        <td>cor2.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Mitz Mia Cruz</td>
                        <td>Maya-maya St. Jerome Davao City</td>
                        <td>mitzmiaC@gmail.com</td>
                        <td>cor3.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Genelyn Joy Padilla</td>
                        <td>Maya-maya St. Jerome Davao City</td>
                        <td>genelynpadilla@gmail.com</td>
                        <td>cor4.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Marc Gabriel Harrid</td>
                        <td>21-A Boulevard Davao City</td>
                        <td>marcgabriel00@gmail.com</td>
                        <td>cor5.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>Ana Rose Nola</td>
                        <td>21-C Southbay Davao City</td>
                        <td>anarosenola@gmail.com</td>
                        <td>cor6.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Abriera</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                </tbody> 
            </table>
        </div>

    </div>
</div>


@stop