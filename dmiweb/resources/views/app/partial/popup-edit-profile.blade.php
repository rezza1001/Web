 <div class="popup">
      <div class="popup-container" id="popup-edit-profile">
        <div class="popup-header">
            <h3>Edit Your Profile</h3>
        </div><!-- /.popup-header -->
        <div class="popup-body">
        <form id="update-profile" class="form-register" role="form" method="POST"  enctype="multipart/form-data" action="{{ url('/update-profile') }}" >
            {!! csrf_field() !!}
                <div class="boxforms">
                      @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                      @endif
                      <div class="rows {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="Username" name="name" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="Full Name" name="fullname" value="{{ $user->fullname }}">
                            @if ($errors->has('fullname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('age') ? ' has-error' : '' }}">
                          <div class="input-group date" data-provide="datepicker">
                              <input type="text" class="form-control" placeholder="Birth Date" name="age" value="{{ $user->age }}">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                            @if ($errors->has('age'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('gender') ? ' has-error' : '' }}">
                          {!! Form::select('gender',['Male' => 'Male','Female' => 'Female'],$user->gender , ['class'=>'select']) !!}
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="Email" name="email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control"  placeholder="Password" id="password" name="password"  value="">
                      </div>
                      <div class="rows {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control"  placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" value="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <span id="passerror" class="help-block" style="display:none;">
                                <strong>Password not match</strong>
                            </span>
                      </div>
                      <div class="rows {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" value="{{ $user->phone }}">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows {{ $errors->has('address') ? ' has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="Address" name="address" value="{{ $user->address }}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                      </div>
                      <div class="rows ">
                        <div class="row">
                          <div class="col-md-6">
                              <button type="button" class="button btn-primary">
                                CANCEL
                              </button>
                          </div>
                          <div class="col-md-6">
                              <button type="submit" class="button fr">
                                UPDATE
                              </button>
                          </div>
                        </div>
                      </div>
                </div><!-- .boxform -->
        </form>
        </div><!-- /.popup-body -->
      </div><!-- /.popup-container -->
    </div><!-- /.popup -->