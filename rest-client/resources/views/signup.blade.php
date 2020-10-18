@extends('layout.app')

@section('description', 'Simple chat sign up page')
@section('title', 'Sign Up - Simple Chat')

@section('container')
    <div class="container sc-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card sc-card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col align-self-center text-center">
                        <h5>Registration</h5>
                      </div> 
                    </div>
                  </div>
                  <div class="card-body">
                    <form method="post" action="/signup">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputText1">Username</label>
                        <input type="text" class="form-control @if(session('msg_username')) is-invalid @endif" id="exampleInputText1" name="username" value="{{ $username ?? '' }}">
                        @if(session('msg_username'))<div class="invalid-feedback">{{ session('msg_username') }}</div>@endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputText2">Full Name</label>
                        <input type="text" class="form-control @if(session('msg_fullname')) is-invalid @endif" id="exampleInputText2" name="fullname" value="{{ $fullname ?? '' }}">
                        @if(session('msg_fullname'))<div class="invalid-feedback">{{ session('msg_fullname') }}</div>@endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control @if(session('msg_email')) is-invalid @endif" id="exampleInputEmail1" name="email" value="{{ $email ?? '' }}">
                        @if(session('msg_email'))<div class="invalid-feedback">{{ session('msg_email') }}</div>@endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @if(session('msg_password')) is-invalid @endif" id="exampleInputPassword1" name="password">
                        @if(session('msg_password'))<div class="invalid-feedback">{{ session('msg_password') }}</div>@endif
                      </div>
                      <button type="submit" class="btn btn-primary mb-3">Register</button>
                      <p>Have an account? <a href="#">Log In</a></p>
                    </form>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
