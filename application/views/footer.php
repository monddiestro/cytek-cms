</div>

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
  $(document).ready(function() {
    $('#showNavbar').on('click', function() {
      $('#navbarCustom').addClass('show');     
      $('#nav-backdrop').addClass('show');
   });
        
    $('#nav-backdrop').on('click', function() {
      $(this).removeClass('show'); 
      $('#navbarCustom').removeClass('show');
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
  // $('tr td.td-header')on('keyup',function() {
  //   if ($(this).hasClass('expand')) {
  //     $('.expand span .fa-chevron-down').removeClass('fa-chevron-down').addClass('fa-chevron-up');
  //   } else {
  //     $('.expand span .fa-chevron-up').removeClass('fa-chevron-up').addClass('fa-chevron-down');
  //   }
  // });
  $('.collapse').on('shown.bs.collapse', function(){
    $(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
    }).on('hidden.bs.collapse', function(){
    $(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
  });
</script>
</body>
</html>
