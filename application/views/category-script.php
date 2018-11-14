<script type="text/javascript">
  $('input[name="meta_img"]').on('change',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $(this).closest('.form-group').find('.filename').text(label);
    readURL(this)
  });

  function readURL(input) {
    var object = $(input)
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        object.closest('.form-group').find('.media-object').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
