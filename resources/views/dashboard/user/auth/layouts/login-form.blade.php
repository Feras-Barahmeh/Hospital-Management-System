{{-- login form user --}}
<section class="panel-form d-none" panel-form id="user">
    <h5 class="font-weight-semibold mb-4 mt-4">{{ trans('dashboard/login.hint_user') }}</h5>
    <form method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ trans('dashboard/login.email') }}</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autofocus placeholder="{{ trans('dashboard/login.enter_email') }}" >
        </div>

        <div class="form-group">
            <label for="password">{{ trans('dashboard/login.password') }}</label>
            <input id="password" name="password" class="form-control" show-password="{{ trans('dashboard/login.show') }}"  placeholder="{{ trans('dashboard/login.enter_password') }}" type="password">
        </div>

        <button type="submit" class="btn btn-main-primary btn-block">{{ trans('dashboard/login.signin') }}</button>

    </form>
</section>

{{-- login form admin --}}
<section class="panel-form d-none" panel-form id="admin">
    <h5 class="font-weight-semibold mb-4 mt-4">{{ trans('dashboard/login.hint_admin') }}</h5>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ trans('dashboard/login.email') }}</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autofocus placeholder="{{ trans('dashboard/login.enter_email') }}" >
        </div>
        <div class="form-group">
            <label for="password">{{ trans('dashboard/login.password') }}</label>
            <input id="password" name="password" class="form-control" show-password="{{ trans('dashboard/login.show') }}"  placeholder="{{ trans('dashboard/login.enter_password') }}" type="password">
        </div>
        <button type="submit" class="btn btn-main-primary btn-block">{{ trans('dashboard/login.signin') }}</button>

    </form>
</section>

