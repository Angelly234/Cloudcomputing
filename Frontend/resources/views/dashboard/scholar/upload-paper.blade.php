@extends('layout.master_two')

@section('dynamic_content')

  {{-- content --}}
  <div class="container-upload">
    {{-- main content --}}
    <div class="main-content">

      <form method="post" enctype="multipart/form-data" action="{{ url('/scholar/upload-papers') }}">
        @csrf
        <div class="form-group">
          <label for="title">Publication Title:</label>
          <input type="text" id="title" name="title">
        </div>
        
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" id="description" name="description">
        </div>

        <div class="form-group">
          <label for="website">Website:</label>
          <input type="text" id="website" name="website">
        </div>

        <div class="upload-file" style="margin-bottom: 10px">
          <label for="file" class="form-label">Upload your files here</label>
          <input class="form-control" type="file" name="file" placeholder="Upload your pdf here" aria-describedby="helpId">
        </div>

        <div class="date">
          <label for="publish_date">Enter the publication date: </label> 
          <input type="date" name="publish_date" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
        </div> 

        <button class="btn-upload">Upload</button>
      </form>
    </div>

    {{-- right-sidebar --}}
    {{-- <div class="right-sidebar hover-underline" style="text-align: center">
      <div class="pre-upload">
        <a href="{{ url('scholar/home') }}">go back to dashboard</a>
      </div>
    </div> --}}
  {{-- content --}}
  </div>

@stop