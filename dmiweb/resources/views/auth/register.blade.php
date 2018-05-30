@component('layouts.app')
<section class="section flex-center">
  <div class="boxForm">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
       <div class="big-title center">
        <h2 class="title">Register</h2>
      </div>
       <form class="login-form" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

     
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input id="name" type="text" class="form-control" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          
            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>

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
          <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <input id="checkbox" type="checkbox" required>
            <span>Saya menyetujui <a href="{{url('/')}}/page/syarat-ketentuan">"Syarat dan ketentuan"</a></span>
        </div>

        <div class="form-group">
           
                <button type="submit" class="button btn-primary">
                    Register
                </button>
        </div>
    </form>
  </div> {{-- .container --}}
</section>
@endcomponent