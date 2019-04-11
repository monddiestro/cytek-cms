<script type="text/javascript">
    var notif = $('#match_password');
    var match = false;
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;

    $('#confirm').on('keyup', function() {
        var new_pwd = $('#newpwd').val();
        clearInterval(_changeInterval);
        _changeInterval = setInterval(function(){
            clearInterval(_changeInterval);
            var confirm_pwd = $('#confirm').val();
            password_match(new_pwd,confirm_pwd);
        },100);
    });

    funcion password_match(new_pwd,confirm_pwd) {
        if(new_pwd == confirm_pwd) {
            match = true;
            notif.removeClass('text-danger');
            notif.addClass('text-success')
            notif.html('Pasword match');
            notif.show(); 
        } else {
            match = false;
            notif.removeClass('text-success');
            notif.addClass('text-danger')
            notif.html('Pasword did not match');
            notif.show();  
        }
    }
</script>