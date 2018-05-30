<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title','Title:') !!}
                 {!! Form::text('title',null, ['class'=>'form-control titlePost']) !!}
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('summary') ? ' has-error' : '' }}">
                  {!! Form::label('summary','Summary:') !!}
                  {!! Form::textarea('summary',null, ['class'=>'textarea form-control']) !!}
                 @if ($errors->has('summary'))
                     <span class="help-block">
                         <strong>{{ $errors->first('summary') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description','Description:') !!}
                  {!! Form::textarea('description',null, ['class'=>'message form-control tinyeditor','id'=>'editor']) !!}
                 @if ($errors->has('description'))
                     <span class="help-block">
                         <strong>{{ $errors->first('description') }}</strong>
                     </span>
                 @endif
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
                <div class="form-group {{ $errors->has('published_at') ? ' has-error' : '' }}">
                  {!! Form::label('published_at','Published On:') !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                    {!! Form::input('text','published_at',$post->published_at, ['class'=>'form-control pull-right']) !!}
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  {{ Form::checkbox('featured', 1, null, ['class' => 'field','id'=>'featured']) }}
                  <strong>Set As Headline</strong>
                </div> <!-- /.form group -->
                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                  {!! Form::label('type','Type:') !!}
                  {!! Form::select('type',['default' => 'Default','photo' => 'Photo'],null, ['class'=>'form-control select2','id'=>'type']) !!}
                  @if ($errors->has('type'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type') }}</strong>
                      </span>
                  @endif
                </div> <!-- /.form group -->
                <div class="form-group {{ $errors->has('categoryList') ? ' has-error' : '' }}">
                    {!! Form::label('categoryList','Categories:') !!}
                    {!! Form::select('categoryList[]',$categories ,null, ['class'=>'form-control select2','id'=>'category']) !!}
                </div> <!-- /.form group -->
                @if(count($post->getMedia('posts')))
               <div class="form-group {{ $errors->has('image_upload') ? ' has-error' : '' }} allmedia">
                   <div class="row" id="imageList">
                     @foreach($post->getMedia('posts') as $image)
                     <div class="col-md-3 media-{{$image->id}}">
                       <div class="img-preview text-center">
                       <img class="media-{{$image->id}}" src="{{ url('/') }}/media/{{$image->id}}/conversions/small.jpg" alt="" />
                        <a href="#" class="deleteImage" data-token="{{ csrf_token() }}" media-id="{{$image->id}}"  data-id="{{ $image->id }}"><i class="fa fa-trash"></i></a>
                       </div>
                     </div>
                     @endforeach
                   </div>
               </div><!-- /.form group -->
                @endif
               <div class="boxfooter">
                    <div class="row">
                      @if ($post->id)
                        <div class="col-md-6">
                            <a href="#UploadForm" id="UploadImaged" post-id="{{$post->id}}" class="showPopup btn bg-olive btn-flat btn-block">Upload Image</a>
                        </div>
                      @else
                        <div class="col-md-12">
                          <div class="form-group">
                           {!! Form::label('image','Image:') !!}<br>
                           <input type="file" name="image_upload" value="">
                           </div><!-- /.form group -->
                          <div class="form-group">
                  {!! Form::text('caption',null, ['class'=>'form-control', 'placeholder'=>'Caption Image', 'required'=>'required']) !!}
                           </div><!-- /.form group -->
                        </div>
                      @endif
                      <div class="col-md-6">
                        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
                      </div>
                    </div>
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
