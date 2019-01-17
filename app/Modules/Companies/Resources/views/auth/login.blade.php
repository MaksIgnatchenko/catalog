@extends('layouts.auth')

@section('content')
    <h4 class="text-muted text-center font-18"><b>@lang('auth.sign_in')</b></h4>

    <div class="p-3">
        <form class="form-horizontal m-t-20" method="post" action="{{ route('companyLogin') }}">
            @csrf
            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-12">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="email" type="text" name="email" class="form-control" required autofocus
                           placeholder="@lang('auth.email_placeholder')" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-12">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="password" class="form-control" type="password" name="password" required
                           placeholder="@lang('auth.password_placeholder')">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                        <input type="checkbox" class="custom-control-input"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">@lang('auth.remember_me')</span>
                    </label>
                </div>
            </div>

            <div class="form-group text-center row m-t-20">
                <div class="col-12">
                    <button class="btn btn-primary btn-block waves-effect waves-light"
                            type="submit">@lang('auth.login')</button>
                </div>
            </div>
        </form>

        <div class="form-group text-center row m-t-20">
            <div class="col-12">
                @if (Route::has('password.request'))
                    <a class="btn btn-primary btn-block waves-effect waves-light" href="{{ route('register') }}">
                        {{ __('Registration') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="form-group text-center row m-t-20">
            <div class="col-12">
                @if (Route::has('password.request'))
                    <a class="btn btn-primary btn-block waves-effect waves-light" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

    </div>
@endsection

