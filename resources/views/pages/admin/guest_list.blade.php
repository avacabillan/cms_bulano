@extends('layout.master')
@section('title')
 GUEST LIST
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">

    <div class="page-content">
    
  <div class="d-grid gap-2 d-md-block me-5 mt-5 pt-5 mb-3" style="float: right;">
        <button class="btn btn-primary" type="button"><a href="javascript:window.print()">
    <span>Print List</span>

  </a></button>
        <button class="btn btn-danger" type="button"><i class="fas fa-minus-circle"></i> Delete</button>
      </div>
        <div class="guest_list">
            <table class="table_guest">
 
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                        </th>
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
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Bianca Mae Cortez</td>
                        <td>Sto Nino Agdao Davao City</td>
                        <td>biancacortz123@gmail.com</td>
                        <td>cor.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Ava Joy Mahinay</td>
                        <td>Talisay Buhangin Davao City</td>
                        <td>avajoymahinay@gmail.com</td>
                        <td>cor1.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Jean Jay Daniel</td>
                        <td>52-D Boulevard Davao City</td>
                        <td>jeandaniel99@gmail.com</td>
                        <td>cor2.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Mitz Mia Cruz</td>
                        <td>Maya-maya St. Jerome Davao City</td>
                        <td>mitzmiaC@gmail.com</td>
                        <td>cor3.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Genelyn Joy Padilla</td>
                        <td>Maya-maya St. Jerome Davao City</td>
                        <td>genelynpadilla@gmail.com</td>
                        <td>cor4.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Marc Gabriel Harrid</td>
                        <td>21-A Boulevard Davao City</td>
                        <td>marcgabriel00@gmail.com</td>
                        <td>cor5.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
                            <option value="3">Polinio</option>
                            </select></td>
                            <td>
                                <button type="button" class="btn btn-success">Approve</button>
                                <button type="button" class="btn btn-danger">Declined</button>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>Ana Rose Nola</td>
                        <td>21-C Southbay Davao City</td>
                        <td>anarosenola@gmail.com</td>
                        <td>cor6.png</td>
                        <td><select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Associates</option>
                            <option value="1">Galendez</option>
                            <option value="2">Sasil</option>
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