@extends('layout.master_three')

@section('dynamic_content')

<div class="nav-empty" style="padding: 55px">
</div>

<div class="container my-5 login-option-page">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                @guest
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Login option</h5> <!-- Card title -->
                    <div class="d-grid gap-2 mb-3">
                        <a class="btn btn-primary" href="{{ route('user.login')}}">
                            Login for User
                        </a>
                        <!-- Button for student signup -->
                        <a class="btn btn-primary" href="{{ route('scholar.login')}}">
                            Login for Scholar
                        </a>
                        <!-- Button for scholar signup -->
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>

@stop