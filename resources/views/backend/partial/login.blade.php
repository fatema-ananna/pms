<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<form action="{{route('do.login')}}" method="post">

@if(session()->has('message'))
            <p class="alert alert-danger">{{session()->get('message')}}</p>
        @endif

        @csrf

        <div class="form-group col-md-6">
  <label > <b>Email</b></label>
  <input type="email" class="form-control" name="email">
</div>
<div class="form-group col-md-6">
  <label > <b>Password</b></label>
  <input type="password" class="form-control" name="password">
</div>
 
  <button type="submit" name="submit" value="Log In" class="btn btn-primary">Submit</button>
</form>


       

        
          