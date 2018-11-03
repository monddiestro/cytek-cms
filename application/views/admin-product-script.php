<script type="text/javascript">
  $('#cat_id').on('change',function(){
    var cat_id = $(this).val();
    get_sub_category(cat_id);
  });

  function get_sub_category(cat_id) {
    $.ajax({
      url: "<?php echo base_url('admin/sub_category') ?>",
      type: "POST",
      data: { 'cat_id': cat_id },
      success: function(data) {
        $('#subcat_id').html(data);
        $('.selectpicker').selectpicker('refresh');
      }
    });
  }
  $('#meta_img').on('change',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $('#filename').text(label);
  });
</script>
