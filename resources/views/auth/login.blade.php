@extends('layouts.admin_layout')

@section('content')
<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column">
						<!--begin::Aside header-->
						<a href="#" class="text-center">
							<img src="{{ asset('public') }}/assets/media/logos/logo-letter-1.png" class="max-h-70px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Amazing Metronic 
						<br />with great build tools</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/illustrations/login-visual-1.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" method="POST" action="{{ route('login') }}">
                                <!--begin::Title-->
                                @csrf
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Metronic</h3>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="Username or email" required autofocus>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
								<div class="form-group d-flex justify-content-between">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember me</label>
									</div>
									<a href="recover-password.html">Reset password</a>
								</div>
								<button class="btn btn-primary btn-block">Log in</button>
								<hr>
								<p class="text-muted">Login with your social media account.</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-facebook">
											<i class="fab fa-facebook"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-twitter">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-dribbble">
											<i class="fab fa-dribbble"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-linkedin">
											<i class="fab fa-linkedin"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-google">
											<i class="fab fa-google"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-behance">
											<i class="fab fa-behance"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="btn btn-floating btn-instagram">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
								<hr>
								<p class="text-muted">Don't have an account?</p>
								<a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register now!</a>
                                
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_signin_submit" class="btn btn-sm btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3 float-right">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						
						<!--begin::Forgot-->
					
						<!--end::Forgot-->
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
						<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
							<span class="mr-1">2020©</span>
							<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
						</div>
						<a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>
						<a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>
						<a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
</div>
@endsection
