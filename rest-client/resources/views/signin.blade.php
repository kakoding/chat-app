@extends('layout.app')

@section('description', 'Simple chat sign in page')
@section('title', 'Sign In - Simple Chat')

@section('container')
    <div class="container sc-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">

                <div class="card sc-card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col align-self-center text-center">
                        <h5>Sign In</h5>
                      </div> 
                    </div>
                  </div>
                  <div class="card-body">
                    @if (session('success_msg'))
                        <div class="alert alert-success">
                            {{ session('success_msg') }}
                        </div>
                    @endif
                    @if (session('failed_msg'))
                        <div class="alert alert-danger">
                            {{ session('failed_msg') }}
                        </div>
                    @endif
                    <form method="post" action="/signin">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      <button type="submit" class="btn btn-primary mb-3">Sign in</button>
                      <p>Don't have an account? <a href="{{ url('/signup') }}">Sign up</a></p>
                    </form>
                  </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
@endsection
