@extends('layout.master_two')

@section('dynamic_content')

    <div class="container">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px; text-align:left">
            <div style="text-align: left; background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;">
                <h4>{{ Auth::guard('web')->user()->name }} Dashboard</h4><hr>
                <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: white;">
                        <td>{{ Auth::guard('web')->user()->name }}</td>
                        <td>{{ Auth::guard('web')->user()->email }}</td>
                        {{-- <td>
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="logout-link">Logout</a>
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                        </td> --}}
                    </tr>
                </tbody>
                </table>

                <a class="btn btn-success" href="{{url('/user/show-paper')}}" style="background-color: rgb(4, 9, 56); color:white">Search paper</a>
                <a class="btn btn-success" href="{{url('/user/create-profile')}}" style="background-color: rgb(4, 9, 56); color:white">Create a profile</a>

        </div>
    </div>
    </div>
    
@endsection