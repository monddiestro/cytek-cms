<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url('utilities/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('utilities/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('utilities/js/bootstrap-select.min.js') ?>"></script>
<script src="<?php echo base_url('utilities/js/lightslider.js') ?>"></script>
<script src="<?php echo base_url('utilities/js/gijgo.min.js') ?>"></script>
<script>
  $('input[name="meta_img"]').on('change',function() {
    var input = $(this);
    numFiles = input.get(0).files ? input.get(0).files.length : 1;
    label = input.val().replace(/\\/g,'/').replace(/.*\//,'');
    input.trigger('fileselect',[numFiles,label]);
    $(this).closest('.modal-body').find('.filename').text(label);
    readURL(this)
  });

  function readURL(input) {
    var object = $(input)
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        object.closest('.modal-body').find('.media-object').attr('src', e.target.result);
        object.closest('.card-body').find('.media-object').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
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

  $(document).ready(function(){
    $('#product-gallery').lightSlider({
      gallery:true,
      item:1,
      thumbItem:4,
      slideMargin: 0,
      speed:300,
      auto:true,
      loop:true,
      onSliderLoad: function() {
          $('#product-gallery').removeClass('cS-hidden');
      }
    });
    $('#date').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        maxDate: function () {
            return $('#enddate').val();
        }
    });
  });
</script>