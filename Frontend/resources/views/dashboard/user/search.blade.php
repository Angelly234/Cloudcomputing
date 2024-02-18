@extends('layout.master')

@section('dynamic_content')

<div class="nav-empty" style="padding: 50px">
</div>

<div class="container0">
  <div class="row">
    <div class="caption">
        <h2 style="text-align: center">Discover the world's scientific knowledge</h2>
        <h3 style="text-align: center">With 135+ million publication pages, 20+ million researchers and 1+ million questions, this is where everyone can access science</h3>
        <div class="box">
          <form type="get" action="{{ url('user/search') }}" style="display: flex;">
            <input type="search" id="search" class="form-control" name="query" placeholder="Search for publications, researchers, or questions" style="flex: 1;">
            <button type="submit" class="search btn" style="margin-left: 10px; color: white; border-radius: 5px; background-color:rgb(2, 10, 46);">Search</button>
          </form>
        </div>
      <hr>
    </div>
    <div class="caption1" style="padding:1px">
      <div class="qpub">
        <a class="question" href="#">Research Paper</a>
      </div>
    </div>
</div>
</div>

<div class="article-links">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <p class="lead fw-normal mb-0"><b>Recent Research Paper Uploaded</b></p>
    {{-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> --}}
  </div>
  @foreach ($v_paper as $papers)
  <div class="container-feedback">
    <div class="row1" style="margin-bottom:1px;>
      <div class="feedback-content">
        <h3>{{$papers->title}}</h3><br>
        <p>{{$papers->description}}</p><br>
        <p style="background-color:aliceblue">Published on: {{$papers->publish_date}}</p><br>
        <p style="display:inline-block;">Visit website: <a class="hover-underline" href="{{$papers->website}}" style="color: black; margin-bottom: 0; text-align:left;">{{$papers->website}}</a>
      
        <div class="scholar">
          <p><b>Published by: {{$papers->user->name}} </b></p>
        </div>
      
      <div class="download-file">
        <p>Download pdf here</p>
        <i class="fa-solid fa-hand-point-down fa-bounce"></i><br>
        <a class="download-link" href="{{ asset('assets/files/' . $papers->file)  }}">Download PDF</a>
      </div>
    </div>
    </div>
  </div>     
</div>
@endforeach

@endsection