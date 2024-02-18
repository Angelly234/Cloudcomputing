@extends('layout.master_three')

@section('dynamic_content')

<div class="nav-empty" style="padding: 55px"></div>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 50vh;">
        <div class="col-md-4" style="text-align: left; background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;">
            <h4>Scholar Login</h4>
            <hr>
            <form action="{{ route('scholar.check') }}" method="post">

                {{-- Display error message when user gets banned --}}
                @if (Session('scholarError'))
                    <div class="alert alert-danger">
                        {{ Session('scholarError') }}
                    </div>
                @endif

                {{-- Display error message when there is a fail session --}}
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address"
                        value="{{ old('email') }}">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password"
                        value="{{ old('password') }}">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                <div class="form-group">
                    <a href="{{ route('scholar.register') }}">Create new Account</a>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
