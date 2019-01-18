</div>
<footer>
  
</footer>
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

  $(document).ready(function() {
    $('#showMenu').on('click', function() {
      $('.cytek-sidebar').addClass('show');
      $('#nav-backdrop').addClass('show');
   });
        
    $('#nav-backdrop').on('click', function() {
      $(this).removeClass('show'); 
      $('.cytek-sidebar').removeClass('show');
    }).focus(function() {
      $(this).removeClass('show');
      $('#sidenav').removeClass('show');
      $('.sidebar').removeClass('show');
    });
  }); 

  $('tr td.td-header').click(function() {
    if ($(window).width() < 600 ) {
      $(this).toggleClass('expand').nextUntil('tr td.row-title').css('display' , function(i,v) {
           return this.style.display === 'block' ? 'none' : 'block';
      });
    }
  });  
</script>
</body>
</html>
