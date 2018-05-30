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
               <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                 {!! Form::label('position','Position:') !!}
                 {!! Form::text('position',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('position'))
                     <span class="help-block">
                         <strong>{{ $errors->first('position') }}</strong>
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
               <div class="form-group">
                   @if(count($career->getMedia('career')))
                   <label for="">Current Image</label>
                   <div class="row">
                   @foreach($career->getMedia('career') as $media)
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$media->id}}" src="{{ url('/') }}/media/{{$media->id}}/conversions/small.png" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$media->id}}" data-token="{{ csrf_token() }}" media-id="{{$media->id}}"  data-id="{{ $career->id }}">Remove Image</a><br>
                   </div>
                   @endforeach
                   </div>
                   <a href="#UploadForm" class="UploadFile showPopup btn bg-olive btn-flat">Upload New Image</a>
                   @elseif($career->id)
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