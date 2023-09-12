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
                                                {{-- start messages --}}
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                                @endif

                                                @if ($errors->has('password'))
                                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                                {{-- End messages --}}

                                                <div class="main-signup-header">
													<h2 class="mb-6">{{ trans('dashboard/login.welcome') }}</h2>

                                                    <select class="form-control mt-2 mb-2" select-rank autofocus aria-label="Default select example">
                                                        <option selected disabled>{{ trans('dashboard/login.login_as') }}</option>
                                                        <option value="user" >{{ trans('dashboard/login.user') }}</option>
                                                        <option value="doctor">{{ trans('dashboard/login.doctor') }}</option>
                                                        <option value="admin">{{ trans('dashboard/login.admin') }}</option>
                                                    </select>

                                                    {{-- start forms --}}
                                                    @include('dashboard.user.auth.layouts.login-form')
                                                    {{-- end forms --}}

													<div class="main-signin-footer mt-5">
														<span class="d-block"><a href="">{{ trans('dashboard/login.forgot_pass') }}</a></span>
														<span class="d-block">{{ trans('dashboard/login.has_account') }}<a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login.create_account') }}</a></span>
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
