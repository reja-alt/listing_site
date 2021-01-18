@extends('layouts.frontend_layout')
@section('front_content')
<div class="container p-10">
    <div class="myaccount-login-form light-shadow-bg">
        <div class="light-box-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-box login-form" >
                        <h3 class="item-title">Login</h3>
                        <form method="POST" action="{{ route('login') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Username or E-mail</label>
                                <input type="text" class="form-control" name="email" id="login-username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" id="login-password">
                            </div>
                            <div class="form-group d-flex">
                                <input type="submit" class="submit-btn" value="Login">
                                <div class="form-check form-check-box">
                                    <input class="form-check-input" type="checkbox" id="check-password">
                                    <label for="check-password">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="#" class="forgot-password">Forgot your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-box registration-form">
                        <h3 class="item-title">Register</h3>
                        @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @endisset
                        @csrf
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" class="form-control" name="name" id="registration-username">
                                <div class="help-block">Username cannot be changed.</div>
                            </div>
                            <div class="form-group">
                                <label>Email address *</label>
                                <input type="email" class="form-control" name="email" id="registration-email">
                            </div>
                            <div class="form-group">
                                <label>Address *</label>
                                <input type="text" class="form-control" name="address" id="registration-email">
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                    <input id="password" type="password" class="form-control"  name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password *</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="number" class="form-control" name="phone_number" id="registration-password">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="submit-btn" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>         
</div>

@endsection