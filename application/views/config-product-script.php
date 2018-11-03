<script type="text/javascript">
  $('#new-feature #image').on('change',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $(this).closest('.form-group').find('.filename').text(label);
  });
  $('#meta_img').on('change',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $(this).closest('.form-group').find('.filename').text(label);
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.image_preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#meta_img').on('change',function() {
      readURL(this);
  });
  $('#cat_id').on('change',function(){
    var cat_id = $(this).val();
    $.ajax({
      url: '<?php echo base_url('admin/pull_subcategories') ?>',
      type: 'POST',
      data: { 'cat_id': cat_id },
      success: function(data) {
        $('#subcat_id').html(data);
        $('.selectpicker').selectpicker('refresh');
      }
    });
  });
</script>
