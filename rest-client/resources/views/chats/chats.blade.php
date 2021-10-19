@extends('layout.app')

@section('description', 'lorem')
@section('title', 'Simple Chat')

@section('container')
    <div class="container sc-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">

                <div class="card sc-card">
                  <div class="card-header">
                    <div class="row">
                        <div class="col align-self-start mt-1">
                          <a href="#"><i class="far fa-edit"></i></a>
                        </div>
                        <div class="col align-self-center text-center">
                          <h5>Chats</h5>
                        </div>
                        <div class="col align-self-end dropleft">
                            <a class="nav-link float-right" href="#" id="navbarDropdown" data-toggle="dropdown">
                              <i class="fas fa-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">New Broadcast</a>
                              <a class="dropdown-item" href="#">New Group</a>
                              <a class="dropdown-item" href="#">Scan QR Code</a>
                              <a class="dropdown-item text-danger" href="{{ url('/signout') }}">Sign out</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Close</a>
                            </div>
                        </div>  
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item border-0">
                        <div class="media position-relative">
                          <img src="{{ url('/') }}/assets/img/img-profile01122020.jpg" class="mr-3 rounded-circle" alt="avatar contact chat" width="70">
                          <div class="media-body">
                            <div class="d-flex">
                                <h6 class="mt-0">Media link</h6>
                                <small class="form-text text-muted ml-auto">Kemarin</small>         
                            </div>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel.</p>
                            <hr>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item border-0">
                        <div class="media position-relative">
                          <img src="{{ url('/') }}/assets/img/img-profile01122020.jpg" class="mr-3 rounded-circle" alt="avatar contact chat" width="70">
                          <div class="media-body">
                            <div class="d-flex">
                                <h6 class="mt-0">Media link</h6>
                                <small class="form-text text-muted ml-auto">Kemarin</small>         
                            </div>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel.</p>
                            <hr>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item border-0">
                        <div class="media position-relative">
                          <img src="{{ url('/') }}/assets/img/img-profile01122020.jpg" class="mr-3 rounded-circle" alt="avatar contact chat" width="70">
                          <div class="media-body">
                            <div class="d-flex">
                                <h6 class="mt-0">Media link</h6>
                                <small class="form-text text-muted ml-auto">Kemarin</small>         
                            </div>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel.</p>
                            <hr>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer">
                    <ul class="nav justify-content-center">
                      <li class="nav-item mr-lg-5">
                        <a class="nav-link" href="#"><i class="fas fa-user-circle mr-1"></i>Contact</a>
                      </li>
                      <li class="nav-item mr-lg-5">
                        <a class="nav-link" href="#"><i class="fas fa-comments mr-1"></i>Chats</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog mr-1"></i>Settings</a>
                      </li>
                    </ul>
                  </div>
                </div>

            </div>
        </div>
    </div>
@endsection