<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title','Title:') !!}
                 {!! Form::text('title',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('subtitle') ? ' has-error' : '' }}">
                 {!! Form::label('subtitle','Sub Title:') !!}
                 {!! Form::text('subtitle',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('subtitle'))
                     <span class="help-block">
                         <strong>{{ $errors->first('subtitle') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                 {!! Form::label('url','Url:') !!}
                 {!! Form::text('url',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('url'))
                     <span class="help-block">
                         <strong>{{ $errors->first('url') }}</strong>
                     </span>
                 @endif
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
               <div class="form-group {{ $errors->has('image_upload') ? ' has-error' : '' }}">
            
                   @if (count($banner->getMedia('banners')))
                   <label for="">Current Image</label>
                   <div class="row">
                   @foreach($banner->media as $media)
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$media->id}}" src="{{ url('/') }}/media/{{$banner->getMedia('banners')->first()->id}}/conversions/small.jpg" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$media->id}}" data-token="{{ csrf_token() }}" media-id="{{$media->id}}"  data-id="{{ $banner->id }}">Remove Image</a><br>
                   </div>
                   @endforeach
                   </div>
                   <a href="#UploadForm" class="UploadFile showPopup btn bg-olive btn-flat">Upload New Image</a>
                   @elseif($banner->id)
                    <a href="#UploadForm" class="showPopup btn bg-olive btn-flat">Upload Image</a>
                   @else
                       {!! Form::label('image','Image:') !!}<br>
                       <input type="file" name="image_upload" value="">
                   @endif
               </div>
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
