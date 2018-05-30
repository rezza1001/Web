<div class="col-md-8">
         <div class="box box-primary">
           <!-- form start -->
             <div class="box-body">
              <div class="form-group {{ $errors->has('locale') ? ' has-error' : '' }}">
                {!! Form::label('locale','Language:') !!}
                {!! Form::select('locale',['en' => 'English','id' => 'Indonesia'],null, ['class'=>'form-control select2']) !!}
                @if ($errors->has('locale'))
                    <span class="help-block">
                        <strong>{{ $errors->first('locale') }}</strong>
                    </span>
                @endif
              </div>
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title','Title:') !!}
                 {!! Form::text('title',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('title'))
                     <span class="help-block">
                         <strong>{{ $errors->first('title') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                 {!! Form::label('excerpt','Summary:') !!}
                 {!! Form::textarea('excerpt',null, ['class'=>'textarea form-control']) !!}
                 @if ($errors->has('excerpt'))
                     <span class="help-block">
                         <strong>{{ $errors->first('excerpt') }}</strong>
                     </span>
                 @endif
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
             <div class="box-body">
               <div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
                   @if(count($category->media))
                   <label for="">Current Image</label>
                   <div class="row">
                   @foreach($category->media as $media)
                   <div class="col-md-12">
                     <div class="img-preview text-center">
                     <img class="media-{{$media->id}}" src="{{ url('/') }}/media/{{$media->id}}/conversions/medium.jpg" alt="" />
                     </div>
                     <a href="#" class="removeMedia btn btn-danger btn-flat media-{{$media->id}}" data-token="{{ csrf_token() }}" media-id="{{$media->id}}"  data-id="{{ $category->id }}">Remove Image</a><br>
                   </div>
                   @endforeach
                   </div>
                   <a href="#UploadForm" class="UploadFile showPopup btn bg-olive btn-flat">Upload New Image</a>
                   @elseif($category->id)
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
