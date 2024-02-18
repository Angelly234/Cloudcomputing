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
  {{-- @foreach ($v_profile as $profiles) --}}

    <div class="card">
      <div class="card-header text-center">
        <h5>Scholar Account Information</h5>
      </div>
      <div class="card-body">  
        <div class="card-body p-4 text-black scholar-profile">
          <div class="mb-5">
            <table class="table table-profile">
              <thead>
                <div class="mb-3">
                  <label><b>Name: {{$v_profile->first_name}}  {{$v_profile->last_name}}</b></label>
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
                <tr>
                  <td class="field">Work</td>
                  <td class="value">
                    <div class="m-b-5">
                      <p>{{$v_profile->work}}</p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="field">Education</td>
                  <td class="value">
                    <div class="m-b-5">
                      <p>{{$v_profile->education}}</p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="field">Experiences</td>
                  <td class="value">
                    <div class="m-b-5">
                      <p>{{$v_profile->experience}}</p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="edit-button">
              <button class="edit-button btn" style="border-radius: 5px; background-color: rgb(1, 1, 36);" type="submit"><a href="/scholar/edit-profile/{{$v_profile->scholars_profile_id}}" style="color:white;">Edit</a></button>
            </div>

            <div class="article-links">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0"><b>Recent Research Paper Uploaded</b></p>
                {{-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> --}}
              </div>
              @foreach ($v_profile->papers as $papers)
              <div class="container-feedback">
                <div class="row1">
                      <div class="feedback-content">
                        <h3>{{$papers->title}}</h3><br>
                        <p>{{$papers->description}}</p><br>
                        <p>{{$papers->publish_date}}</p><br>
                        <p>Visit website: <a class="hover-underline" style="color:black" href="{{$papers->website}}">{{$papers->website}}</a><br>
                      </div>
                      <div class="contact">
                        <p>Published by: {{$v_profile->first_name}} {{$v_profile->last_name}}</p><br>
                        <p>Contact: {{$v_profile->email}}</p>
                      </div>
                  </div>
                </div>
                @endforeach  
              </div>
          
          </div> 
        </div>
      </div>
    </div>
  @else
  <span class="text-danger">No user found</span>
  @endif
@endsection
