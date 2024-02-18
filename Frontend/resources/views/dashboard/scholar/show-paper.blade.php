@extends('layout.master_two')

@section('dynamic_content')

@if ($data)
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

  <div class="container">
    <table style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black;">Title</th>
            <th style="border: 1px solid black;">Description</th>
            <th style="border: 1px solid black;">Website</th>
            <th style="border: 1px solid black;">File</th>
            <th style="border: 1px solid black;">Download</th>
            <th style="border: 1px solid black;">Publish Date</th>
        </tr>

        @foreach($data as $data)
        <tr>
            <td style="border: 1px solid black; padding: 10px;">{{$data->title}}</td>
            <td style="border: 1px solid black; padding: 10px;">{{$data->description}}</td>
            <td style="border: 1px solid black; padding: 10px;">{{$data->website}}</td>
            <td style="border: 1px solid black; padding: 10px;">{{$data->file}}</td>
            <td style="border: 1px solid black; padding: 10px;"><a href="{{ asset('assets/files/' . $data->file)  }}">Download</a></td>
            <td style="border: 1px solid black; padding: 10px;">{{$data->publish_date}}</td>
        </tr>
        @endforeach
    </table>
    <div class="button" style="text-align: left;">
        <a class="btn btn-success" href="{{url('/scholar/upload-paper')}}" style="background-color: rgb(4, 9, 56); color:white">Upload paper</a>
    </div>
</div>

@else
  <span class="text-danger">You haven't uploaded anything yet :( </span>
@endif
@endsection
