@component('layouts.app')
  @slot('webtitle')
    BREAKING NEWS -  {{$user->name}}
  @endslot
  @include('app.user.header-profile')
  @include('app.user.nav-profile')
  <section id="section-body" class="section mt20">
    <div class="container">
      <div class="row">
        @include('app.widget.sidebar')
        <div class="col-md-8 theContent">
            <div class="widget">
              <div class="box-head">
                <div class="titlebox title-arrow-right">
                  <h2 class="title"><span><i class="ion-edit"></i> CREATE ARTICLE</span></h2>
                </div>
               </div>{{-- .box-head--}}
               {!! Form::model($post = new\App\Post,['url' => 'create-post', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
                   <div class="box-content">
                     <!-- form start -->
                         <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                           {!! Form::text('title',null, ['class'=>'form-post titlePost','placeholder'=>'Title']) !!}
                           @if ($errors->has('title'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('title') }}</strong>
                               </span>
                           @endif
                         </div>
                         <div class="form-group {{ $errors->has('keyword') ? ' has-error' : '' }}">
                           {!! Form::text('keyword',null, ['class'=>'form-post','placeholder'=>'Keyword']) !!}
                           @if ($errors->has('keyword'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('keyword') }}</strong>
                               </span>
                           @endif
                         </div>
                         <div class="form-group {{ $errors->has('video_id') ? ' has-error' : '' }}">
                            {!! Form::text('video_id',null, ['class'=>'form-post', 'placeholder'=>'Youtube ID, Ex. O8wauTSDYrU']) !!}
                           @if ($errors->has('video_id'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('video_id') }}</strong>
                               </span>
                           @endif
                         </div>
                         <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                            {!! Form::textarea('summary',null, ['class'=>'textarea form-post','placeholder'=>'Summary']) !!}
                           @if ($errors->has('summary'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('summary') }}</strong>
                               </span>
                           @endif
                         </div>
                         <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::textarea('description',null, ['class'=>'message form-post tinyeditor','id'=>'editor','placeholder'=>'Description']) !!}
                           @if ($errors->has('description'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('description') }}</strong>
                               </span>
                           @endif
                         </div>
                          <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            {!! Form::label('type','Type:') !!}
                            {!! Form::select('type',['default' => 'Default','video' => 'Video','photo' => 'Photo'],null, ['class'=>'form-post select2']) !!}
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="form-group {{ $errors->has('categoryList') ? ' has-error' : '' }}">
                              {!! Form::label('categoryList','Select Categories:') !!}
                              {!! Form::select('categoryList[]',$categories ,null, ['id'=>'select-categories','class'=>'form-post','required'=>'required','multiple']) !!}
                          </div>
                          <div class="form-group {{ $errors->has('tags') ? ' has-error' : '' }}">
                              {!! Form::text('tags',$tag, ['class'=>'form-post tags','id'=>'tags']) !!}
                              @if ($errors->has('tags'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('tags') }}</strong>
                                  </span>
                              @endif
                          </div>
                         <div class="form-group {{ $errors->has('image_upload') ? ' has-error' : '' }} allmedia">

                               <div >
                                <input type="file" name="image_upload" value="" placeholder="UPLOAD IMAGE">
                               </div>
                         </div>
                         <div class="boxfooter">
                              <div class="row">
                                <div class="col-md-6">
                                  {!! Form::submit('SUBMIT', ['class'=>'btn btn-primary']) !!}
                                </div>
                              </div>
                         </div>
                   </div><!-- /.box -->
                 {!! Form::close() !!}
            </div>{{-- .widget --}}
         </div>{{-- .col --}}
      </div>{{-- .row --}}
    </div>{{-- .container --}}
  </section>
@include('app.partial.popup-edit-profile')
@include('app.partial.popup-upload-photo')

@endcomponent
