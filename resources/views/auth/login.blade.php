@extends(layout())

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('auth.email')}}</label>
{{--                            <label for="email" class="col-md-4 control-label">{{trans('teste.teste')}}</label>--}}

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('auth.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('auth.rememberme')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{trans('auth.forgot-password')}}
                                </a>
                            </div>
                        </div>
                    </form>

                    {{--socialite--}}
                    <form class="form-inline" method="post" action="{{ url('/login/social') }}">
                        {{csrf_field()}}
                        <dic class="col-md-12 text-center">

                            <button class="btn btn-danger" type="submit" value="google" name="social_type">
                                Login com Google
                            </button>

                            <button class="btn" type="submit" value="github" name="social_type">
                                Login com Github
                            </button>

                        </dic>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
