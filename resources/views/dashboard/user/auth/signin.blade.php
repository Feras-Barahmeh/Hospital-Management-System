@extends('dashboard.layouts.master2')
@push('css')
    <link href="{{ asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet" />
@endpush

@section('content')
		<!-- Page -->
		<div class="page">
			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{ asset('dashboard/img/media/login.jpg') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2>Welcome back!</h2>

                                                    <select class="form-control mt-2 mb-2" select-rank autofocus aria-label="Default select example">
                                                        <option selected disabled>Login as....</option>
                                                        <option value="user" >patient</option>
                                                        <option value="doctor">Doctor</option>
                                                        <option value="admin">Admin</option>
                                                    </select>

                                                    {{-- login form user --}}
                                                    <section class="panel-form d-none" panel-form id="user">
                                                        <h5 class="font-weight-semibold mb-4 mt-4">Please sign in as patient.</h5>
                                                        <form method="POST" action="{{ route('user.login') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autofocus placeholder="Enter your email" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input id="password" name="password" class="form-control" placeholder="Enter your password" type="password">
                                                            </div>

                                                            <button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                        </form>
                                                    </section>

                                                     {{-- login form admin --}}
                                                    <section class="panel-form d-none" panel-form id="admin">
                                                        <h5 class="font-weight-semibold mb-4 mt-4">Please sign in as admin.</h5>
                                                        <form method="POST" action="{{ route('admin.login') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autofocus placeholder="Enter your email" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input id="password" name="password" class="form-control" placeholder="Enter your password" type="password">
                                                            </div>
                                                            <button type="submit" class="btn btn-main-primary btn-block">Sign In</button>

                                                        </form>
                                                    </section>



													<div class="main-signin-footer mt-5">
														<span class="d-block"><a href="">Forgot password?</a></span>
														<span class="d-block">Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>
		</div>
		<!-- End Page -->
@endsection
