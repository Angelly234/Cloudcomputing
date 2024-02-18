@extends('layout.master_three')

@section('dynamic_content')

<div class="nav-empty" style="padding: 55px">
</div>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 50vh;">
            <div class="col-md-4" style="text-align: left; background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;">
                  <h4>User Login</h4><hr>
                  <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                     {{-- display when error message when user get banned --}} 
                     @if(Session('error'))
                     <div class="alert alert-danger">
                         {{ Session('error') }}
                     </div>
                     @endif
                  {{--  --}}

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Login</button>
                      </div>

                      <a href="{{ route('user.register') }}">Create new Account</a>

                  </form>
            </div>
        </div>
    </div>

@endsection