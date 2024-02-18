@extends('layout.master_two')

@section('dynamic_content')

<section class="h-100 gradient-custom-2" style="padding-top: 44px;">
  <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4" style="text-align: left; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px;
    margin: 20px;">
      <div class="text-center text-sm-left mb-2 mb-sm-0">
        <h4>Create a user profile</h4>
      </div>

      <p>
        @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif
      </p>

      <form action="/user/save-profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container" style="text-align:left;">
            <div class="form-group">
              <label>FirstName</label>
              <input class="form-control" id="fname" type="text" name="fname" placeholder="First Name">
            </div>
            <div class="form-group">
              <label >LastName</label>
              <input class="form-control" id="lname" type="text" name="lname" placeholder="Last Name" value="">
            </div>

          <div class="form-group">
            <label>Bio</label>
            <input class="form-control" id="bio" type="text" name="bio" placeholder="Bio">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" id="email" type="text" name="email" placeholder="Email">
          </div>
        </div>

        <div class="row">
          <div class="col d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
@stop
