@extends('layout.master_two')

@section('dynamic_content')
<section class="h-100 gradient-custom-2">
  <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4" style="text-align: left; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px;
    margin: 20px;">
      <div class="text-center text-sm-left mb-2 mb-sm-0">
        <h4>Edit a scholar profile</h4>
      </div>

      <p>
        @if(session('msg'))
        <div class="alert alert-success">
          {{ session('msg') }}
        </div>
        @endif
      </p>

      <form action="/scholar/save-edit-profile" method="POST">
        @csrf
        <div class="container">
          @foreach ($v_profile as $profiles)

              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="hidden" id="scholars_profile_id" name="scholars_profile_id" value="{{$profiles->scholars_profile_id}}">
                <input class="form-control" id="fname" type="text" name="fname" value="{{$profiles->first_name}}">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input class="form-control" id="lname" type="text" name="lname" value="{{$profiles->last_name}}">
              </div>

            <div class="form-group">
              <label for="bio">Bio</label>
              <input class="form-control" id="bio" type="text" name="bio" value="{{$profiles->bio}}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" id="email" type="text" name="email" value="{{$profiles->email}}">
            </div>
            <div class="form-group">
              <label for="work">Work</label>
              <input class="form-control" id="work" type="text" name="work" value="{{$profiles->work}}">
            </div>
            <div class="form-group">
              <label for="education">Education</label>
              <input class="form-control" id="education" type="text" name="education" value="{{$profiles->education}}">
            </div>
            <div class="form-group">
              <label for="experience">Experience/Skills</label>
              <input class="form-control" id="experience" type="text" name="experience" value="{{$profiles->experience}}">
            </div>
          @endforeach
          <div class="row">
            <div class="col d-flex justify-content-end">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
@endsection
