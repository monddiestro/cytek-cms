<script type="text/javascript">
    var alert = $('#match_password');
    var match = false;
    var typingTimer; 
    var _changeInterval = null;               //timer identifier
    var doneTypingInterval = 100;  //time in ms, 5 second for example
    
    $('#confirm').on('keyup',function(){
      var new_pwd = $('#newpwd').val();
      clearInterval(_changeInterval);
      _changeInterval = setInterval(function(){
        clearInterval(_changeInterval);
        var confirm_pwd = $('#confirm').val();
        password_match(new_pwd,confirm_pwd);
      },100);
    });

    function password_match(new_pwd,confirm_pwd) {
        if(new_pwd == confirm_pwd) {
        match = true;
        alert.removeClass('text-danger');
        alert.addClass('text-success')
        alert.html('Pasword match');
        alert.show();
        $('#btn_pwd_save').prop('disabled',false);
        } else {
        match = false;
        alert.removeClass('text-success');
        alert.addClass('text-danger')
        alert.html('Pasword did not match');
        alert.show();
        $('#btn_pwd_save').prop('disabled',true);
        }
    }


    $('#current_pwd').on('keyup', function() {
      clearInterval(_changeInterval);
      _changeInterval = setInterval(function() {
        clearInterval(_changeInterval);
        var password = $('#current_pwd').val();
        check_password(password);
      },50)
    });

    function check_password(password) {
      var user_id = "<?php echo $this->session->userdata('user_id') ?>";
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/check_password/') ?>",
        data: { 'password' : password, 'user_id' : user_id },
        success: function(data) {
          (data == "0") ? $('#password_change').hide() : $('#password_change').show();
        }
      });
    }
</script>