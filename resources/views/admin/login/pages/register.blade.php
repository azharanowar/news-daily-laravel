@extends('admin.login.master')

@section('title')
    Register
@endsection

@section('main-content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url('{{ asset("admin/img/admin-register-img.jpg") }}'); background-size: cover; background-position: top left;"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            @if (session('status'))
                                <h4 class="my-3 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </h4>
                            @endif
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="user">

                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                       placeholder="Your Name" required autofocus autocomplete="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                       placeholder="Email Address" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="password_confirmation" name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            <hr>
                            <a href="" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
