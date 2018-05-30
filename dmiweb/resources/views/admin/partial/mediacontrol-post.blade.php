<div class="modal">
  <div class="modal-primary" id="UploadForm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload New Image</h4>
        </div>
        <form action="{{url('/')}}/backend/{{uploadRoute()}}"  enctype="multipart/form-data" method="POST" id="uploadForm">
        <div class="modal-body">
          <div class="box-body pad">
                <div class="box box-primary">
                    <div class="box-body">
                            {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" id="img_title" name="title" placeholder="Image Title" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" id="img_caption" name="caption" placeholder="Image Caption" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                          <input type="file" id="image"  class="form-control" name="image_upload" value="" required="required">
                          <input type="hidden" name="post_id" value="{{$post->id}}">
                          <small style="color:#000;">Max 1Mb</small>
                          <img src=""  id="image_upload_preview" alt="" />
                          <input type="hidden" name="image" id="imageValue" value="">
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="button" class="btn btn-primary" id="UploadImages">SAVE</button>
        </div>
       </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>