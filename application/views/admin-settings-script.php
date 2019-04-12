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
        } else {
        match = false;
        alert.removeClass('text-success');
        alert.addClass('text-danger')
        alert.html('Pasword did not match');
        alert.show();
        }
    }
</script>