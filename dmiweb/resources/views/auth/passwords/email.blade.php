@component('layouts.app')
<section class="section flex-center">
  <div class="boxForm">
       <div class="big-title center">
        <h2 class="title">Reset Password</h2>
      </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="login-form" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <button type="submit" class="button btn-primary">
                    Send Password Reset Link
                </button>
            </div>
        </form>
  </div> {{-- .container --}}
</section>
@endcomponent
