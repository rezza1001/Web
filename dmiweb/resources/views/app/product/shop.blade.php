@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}} - Book Now
  @endslot
<section class="section section-default pad">
  <div class="container">
    <div class="box-head">
      <div class="titleboxs center-title">
        <h2 class="title"><span>Book Now</span></h2>
      </div>
     </div>{{-- .box-head--}}
    <div class="row">
      <div class="col-md-12">
         {!! Form::model($reservation = new\App\Reservation,['url' => 'reservation', 'class' => 'form orderform', 'enctype' => 'multipart/form-data']) !!}
          {{csrf_field()}}

          @include('flash::message')
          <div class="rows">
           {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Full Name']) !!}
           @if ($errors->has('name'))
               <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
               </span>
           @endif
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="rows">
               {!! Form::text('email',null, ['class'=>'form-control','placeholder'=>'Email Address']) !!}
               @if ($errors->has('email'))
                   <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                   </span>
               @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="rows">
               {!! Form::text('phone',null, ['class'=>'form-control','placeholder'=>'Phone Number']) !!}
               @if ($errors->has('phone'))
                   <span class="help-block">
                       <strong>{{ $errors->first('phone') }}</strong>
                   </span>
               @endif
              </div>
            </div>
          </div>
          <div class="rows">
             {!! Form::textarea('address',null, ['class'=>'addresss','placeholder'=>'Address']) !!}
             @if ($errors->has('address'))
                 <span class="help-block">
                     <strong>{{ $errors->first('address') }}</strong>
                 </span>
             @endif
          </div>
          <div class="rows selectstyle">
            {!! Form::select('domisili_id',$domisilies ,null, ['class'=>'form-control select2','id'=>'domisili']) !!}
          </div>
          <div class="rows selectstyle">
            {!! Form::select('product_id',$products ,null, ['class'=>'form-control select2','id'=>'product']) !!}
          </div>
          <div class="rows">
            <div class="flex-center">
                <span class="upload_text">Upload KTP</span>
                <div class="uploadbox">
                 {!! Form::file('ktp',null, ['class'=>'form-control','placeholder'=>'Upload KTP']) !!}
                </div>
            </div>
          </div>
          <div class="rows">
            <div class="flex-center">
                <span class="upload_text">Upload NPWP</span>
                <div class="uploadbox">
                {!! Form::file('npwp',null, ['class'=>'form-control','placeholder'=>'Upload NPWP']) !!}
                </div>
            </div>
          </div>
          <div class="rows">
            <div class="flex-center">
                <span class="upload_text">Quantity</span>
                <div class="uploadbox">
                    <div class="input-group order-qty">
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="qty">
                                  <span class="glyphicon glyphicon-minus"></span>
                              </button>
                          </span>
                          <input type="text" name="qty" class="form-control input-number" value="1" min="1" max="10">
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="qty">
                                  <span class="glyphicon glyphicon-plus"></span>
                              </button>
                          </span>
                      </div>
                </div>
            </div>
          </div>
          <div class="rows">
            <input type="submit" class="button btn-primary" value="SUBMIT">
          </div>
        </form>
      </div>{{-- .col --}}
    </div>{{-- .row --}}
  </div> {{-- .container --}}
</section>
@endcomponent