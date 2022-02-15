
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<div class="d-flex p-4 mt-3" style="margin-right: 20rem;" id="assocprofile" >
  <div class="col-sm-4 user-profile" > 
    <input class="form-control" type="hidden" value="{{$associate->id}}" name="associate_id">
    <div class="card-block text-center text-white">      
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block bg-light"> 
      <a type="button" class="btn btn-primary" href="{{route('edit',$associate->id)}}"><i class="fas fa-edit">Edit</a></i>
        
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
        <hr>
        <h2 class="f-w-600">{{$associate->name}}</h2>
        <p id="name" value="name">{{$associate->email}}</p>

        <div class="row mt-5">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->contact_number}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">BirthDate</p>
            <h6 class="text-muted ms-2 f-w-400 text-dark">{{$associate->birth_date}}</h6>
          </div>
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Address</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->address}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">SSS Number</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->sss_no}}</h6>
          </div>

          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Department</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->departments->department_name}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Position</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->positions->position_name}}</h6>
          </div>
                
      
      </div> 
    </div>

  </div>
</div>

