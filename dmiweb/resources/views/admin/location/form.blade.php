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
              <div class="form-group {{ $errors->has('location_category_id') ? ' has-error' : '' }}">
                  {!! Form::label('location_category_id','Category:') !!}
                  {!! Form::select('location_category_id',$categories ,null, ['class'=>'form-control select2','id'=>'location_category_id']) !!}
              </div> <!-- /.form group -->
               <div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }}">
                 {!! Form::label('longitude','Longitude:') !!}
                 {!! Form::text('longitude',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('longitude'))
                     <span class="help-block">
                         <strong>{{ $errors->first('longitude') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }}">
                 {!! Form::label('latitude','Latitude:') !!}
                 {!! Form::text('latitude',null, ['class'=>'form-control']) !!}
                 @if ($errors->has('latitude'))
                     <span class="help-block">
                         <strong>{{ $errors->first('latitude') }}</strong>
                     </span>
                 @endif
               </div>
               <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  {!! Form::label('address','Address:') !!}
                  {!! Form::textarea('address',null, ['class'=>'message form-control tinyeditor','id'=>'editor']) !!}
                 @if ($errors->has('address'))
                     <span class="help-block">
                         <strong>{{ $errors->first('address') }}</strong>
                     </span>
                 @endif
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-8 -->
 <div class="col-md-4">
         <div class="box box-primary">
               <div class="boxfooter">
                   {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary btn-block btn-flat']) !!}
               </div>
             </div><!-- /.box-body -->
         </div><!-- /.box -->
 </div><!-- .col-md-4 -->
