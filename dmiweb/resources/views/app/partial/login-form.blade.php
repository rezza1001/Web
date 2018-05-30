 <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" placeholder="Your Email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                   {{ $errors->first('email') }}
                </span>
            @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                   {{ $errors->first('password') }}
                </span>
            @endif
    </div>
    <div class="form-group">
        <div class="remember-me">
             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="checkbox">
            <label>
                 Remember Me
            </label>
        </div>
    </div>
    <div class="form-group center">
        <button type="submit" class="button">
            Login
        </button>
</form>