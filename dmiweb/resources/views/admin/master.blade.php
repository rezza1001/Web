<!DOCTYPE html>
<html>
  <head>
      @include('admin.partial.meta')
      <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{csrf_token()}}";
      </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('admin.partial.header')
      <aside class="main-sidebar">
        @include('admin.partial.sidebar')
      </aside>
      <div class="content-wrapper">
          @include('flash::message')
          @yield('content')
      </div><!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2017 All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
      });
    </script>
      @include('admin.partial.footer')
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.tinyeditor",
     image_description: true,
    image_caption: true,
    extended_valid_elements : "a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,

        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }

  };

  tinymce.init(editor_config);
$('.btnImg').click(function(){
      $(this).find("input[name='image']").trigger('click');
      var image = [];
        $.each($("input[name='image']:checked"), function(){
            image.push($(this).val());
        });
      var id = image.join(",");
      $('#id-img').val(id);
  });
    $('.updateImage').click(function(){
        var media_id = $('#id-img').val();
        var post_id = $(this).attr('post-id');
        var data = {
            _token: $(this).data('token'),
            media_id: media_id,
            post_id: post_id,
        }
        $.ajax({
          method: "POST",
          url: base_url+"/backend/store-media",
          data: data
        }).done(function(data) {
              console.log(data);
              data.forEach(function(media) {
                var newImage = '<div class="col-md-3 media-'+media.id+'">'
                          +'<div class="img-preview text-center">'
                              +'<img src="'+base_url+'/media/'+media.media_id+'/conversions/small.jpg" class="media-'+media.media_id+'">'
                              +'<a href="#" class="deleteImage" data-token="'+token+'" media-id="'+media.media_id+'"  data-id="'+media.id+'">'
                              +'<i class="fa fa-trash"></i></a>'
                          +'</div>'
                      +'</div>';
                $(newImage).prependTo("#imageList");
            });
              var magnificPopup = $.magnificPopup.instance;
              magnificPopup.close();
               deleteImage();
        });
    });
      function deleteImage(){
        $('.deleteImage').click(function(){
            var data_id = $(this).attr("data-id");
            var data = {
                _token: $(this).data('token'),
                data_id: data_id,
            }
            $.ajax({
              method: "POST",
              url: base_url+"/backend/destroy-media",
              data: data
            }).done(function(data) {
                  $('.media-'+data).remove();
                  $('#image_upload_preview').attr('src','');
                  console.log(data);
            });
        });
        return false;
    }
  deleteImage();
    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $('#image_upload_preview').attr('src', e.target.result);
               $('#imageValue').val(e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
       }
   }
   $("#image").change(function () {
       readURL(this);
   });
</script>
  </body>
</html>
