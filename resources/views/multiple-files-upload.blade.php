<!DOCTYPE html>
<html>
<head>
  <title>Multiple File Upload in Laravel 8</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
 
<div class="container mt-5">
 
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
 
      <h2 class="text-center">Laravel 8 Multiple File Upload With Validation - Tutsmake</h2>
 
 
    <div class="text-center">
 
        <form name="save-multiple-files" method="POST"  action="{{ url('save-multiple-files') }}" accept-charset="utf-8" enctype="multipart/form-data">
 
          @csrf
                   
            <div class="row">
                <!-- Name -->
            <div class="form-group">
                
                <x-input style="width:20rem;" class="form-control form-control-sm" id="requestee"  type="text" name="requestee" placeholder="Name" :value="old('name')" required autofocus />
            </div>
            
           
            <!-- Email Address -->
            <div class="form-group">
              
                <x-input style="width:20rem;" class="form-control form-control-sm" id="email"  type="email" placeholder="Email" name="email" :value="old('email')" required />
            </div>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="files[]" placeholder="Choose files" multiple >
                    </div>
                    @error('files')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
 
</div>  
</body>
</html>