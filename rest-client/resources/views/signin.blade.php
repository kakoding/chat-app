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
                        <h5>Berhasil</h5>
                      </div> 
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-success" role="alert">
                      Akun baru anda berhasil dibuat!
                    </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
