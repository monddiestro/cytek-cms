<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url('utilities/js/jquery.min.js') ?>"></script>
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

  $('#footer-inquire').on('click',function(){
    var name = $('#footer-name');
    var contact = $('#footer-contact');
    var email = $('#footer-email');
    var message = $('#footer-message');
    var company = $('#footer-company');
    var department = $('#footer-department');
    var postion = $('#footer-position');
    var notif = $('#success-footer');

    name.val() == '' ? name.addClass('is-invalid') : name.removeClass('is-invalid');
    contact.val() == '' ? contact.addClass('is-invalid') : contact.removeClass('is-invalid');
    
    if(name.val() != '' && contact.val() != '') {
      post_inquire(name.val(),contact.val(),email.val(),company.val(),department.val(),position.val(),message.val(),'Footer Contact Form',notif);
      name.val('');
      contact.val('');
      email.val('');
      message.val('');
    }

  });

  $('#inquire-send').on('click',function(){
    var name = $('#inquire-name');
    var contact = $('#inquire-contact');
    var email = $('#inquire-email');
    var company = $('#inquire-company');
    var department = $('#inquire-department');
    var position = $('#inquire-position');
    var message = $('#inquire-message');
    var source = $('#inquire-source');
    var notif = $('#inquire-success');

    name.val() == '' ? name.addClass('is-invalid') : name.removeClass('is-invalid');
    contact.val() == '' ? contact.addClass('is-invalid') : contact.removeClass('is-invalid');

    if(name.val() != '' && contact.val() != '') {
      post_inquire(name.val(),contact.val(),email.val(),company.val(),department.val(),position.val(),message.val(),source.val(),notif);
      name.val('');
      contact.val('');
      email.val('');
      message.val('');
      company.val('');
      department.val('');
      position.val('');
    }

  });

  function post_inquire(name,contact,email,company,department,position,message,source,notif) {
    $.ajax({
      url: '<?php echo base_url('inquiry/new_lead') ?>',
      type: 'POST',
      data: {
        'name' : name,
        'contact' : contact,
        'email' : email,
        'company_name' : company,
        'department' : department,
        'position' : position,
        'message' : message,
        'source' : source
      },
      success: function(data) {
        notif.show();
      }
    });
  }
</script>