@extends('layouts.blank')

@section('content')
<div class="animate form login_form">
    <section class="login_content">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h1>Log in | CoffeeSign Admin</h1>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required email autofocus />
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group" style="text-align: left; padding: 0 0 5px 0;">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
            <div class="">
                <input type="submit" class="btn btn-primary submit" style="width: 40%;" href="javascript:;" value="Log in">
            </div>
        </form>
    </section>
</div>

<!-- jQuery -->
<script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js') }}"></script>

<script>

</script>

@endsection
