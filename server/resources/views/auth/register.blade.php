@extends('layouts.blank')

@section('content')
<div class="animate form login_form">
    <section class="login_content">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <h1>Register | CoffeeSign Admin</h1>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required email autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
            </div>

            <div class="">
                <input type="submit" class="btn btn-primary submit" style="width: 40%;" href="javascript:;" value="Register" disabled>
            </div>
        </form>
    </div>
</div>
@endsection
