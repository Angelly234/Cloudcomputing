@extends('layout.master_two')

@section('dynamic_content')

    <div class="container">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px; text-align:left">
            <div style="text-align: left; background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;">
                 <h4>{{ Auth::guard('scholar')->user()->name }} Dashboard</h4><hr>
                 <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             {{-- <th>Action</th> --}}
                         </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td scope="row">{{ Auth::guard('scholar')->user()->name }}</td>
                                 <td>{{ Auth::guard('scholar')->user()->email }}</td>
                                 {{-- <td>
                                     <a href="{{ route('scholar.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('scholar.logout') }}" id="logout-form" method="post">@csrf</form>
                                 </td> --}}
                             </tr>
                         </tbody>
                 </table>

                 <a class="btn btn-success" href="{{url('/scholar/upload-paper')}}" style="background-color: rgb(4, 9, 56); color:white">Upload paper</a>
                 <a class="btn btn-success" href="{{url('/scholar/create-profile')}}" style="background-color: rgb(4, 9, 56); color:white">Create a profile</a>
            </div>
        </div>
    </div>
    
@endsection