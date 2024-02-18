@extends('layout.master_two')

@section('dynamic_content')

@if ($v_profile)
  @if (session('success'))
      <!-- Alert for success -->
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session('success') }}
          <!-- Success message -->
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <!-- Button to close the alert -->
      </div>
  @elseif (session('error'))
      <!-- Alert for error -->
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ session('error') }}
          <!-- Error message -->
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <!-- Button to close the alert -->
      </div>
  @endif

  <div class="card">
    <div class="card-header text-center">
      <h5>User Account Information</h5>
    </div>
    <div class="card-body">  
      <div class="card-body p-4 text-black scholar-profile">
        <div class="mb-5">
          <table class="table table-profile">
            <thead>
              <div class="mb-3">
                <label>Name: {{$v_profile->first_name}}  {{$v_profile->last_name}}</b></label>
              </div>
            </thead>
            <tbody>
              <tr>
                <td class="field">Bio</td>
                <td class="value">
                  <div class="m-b-5">
                    <p>{{$v_profile->bio}}</p>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="field">Email</td>
                <td class="value">
                  <div class="m-b-5">
                    <p>{{$v_profile->email}}</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="edit-button">
            <button class="edit-button btn" style="border-radius: 5px; background-color: rgb(1, 1, 36);" type="submit"><a href="/user/edit-profile/{{$v_profile->users_profile_id}}" style="color:white;">Edit</a></button>
          </div>
        </div> 
      </div>
    </div>
  </div>
  @else
  <span class="text-danger">No user found</span>
  @endif
@endsection