 
<div id="carouselExampleIndicators" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="<?php echo base_url('utilities/images/meta/test.jpg') ?>" alt="First slide">
      <div class="carousel-caption 1st-slide">
        <h4>LOREM IPSUM DOLOR</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        <a href="" class="btn btn-primary text-white px-4 py-2"><b>READ MORE</b></a>
      </div>
    </div>
    <div class="carousel-item">
      <img  src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img  src="https://www.w3schools.com/bootstrap/la.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container home-page ">
    <!-- Products -->
    <div class="row center">
      <div class="col-sm-12 center-title mt-4">
        <h4>Our Products</h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</h5>
      </div>
    </div>
    <div class="row">
      <?php foreach($categories as $category): ?>
      <div class="col-sm-4 mb-4">
        <div class="card">
          <div class="card-header p-0">
            <img src="<?php echo empty($category->img) ? base_url('utilities/images/no-image.png') : base_url($category->img) ?>" alt="" class="product-img">
          </div>
          <div class="card-body">            
            <h5><strong><?php echo $category->cat_title ?></strong></h5>
            <p><?php echo mb_strimwidth($category->description, 0, 100, " ...") ?></p>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('category?q='.$category->cat_id) ?>" class="btn btn-primary text-white px-4"><b>VIEW ALL</b></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
<div style="background:#f0f0f0;">  
  <div class="container home-page">   
    <!-- Events -->
    <div class="row pb-4">
      <div class="col-lg-7">
        <div class="section-title">
          <h4>News and Events</h4>
        </div>
        <div class="col-lg-12 card mb-3">
          <div class="row">
            <div class="col-md-4 px-0">
              <img src="<?php echo base_url('utilities/images/meta/test.jpg')?>" alt="" class="product-img">
            </div>
            <div class="col-md-8 py-3">
              <div class="col-event">
                <h5><strong>Bacon ipsum dolor amet biltong</strong></h5>
                <p>Boudin venison cupim t-bone tri-tip. Short loin frankfurter filet mignon swine. Pork belly beef sausage ham hock tri-tip. Filet mignon ball tip pork swine ground round.</p>
              </div>
              <a href="<?php echo base_url('event?q=event_id') ?>" >READ MORE</a>
            </div>
          </div>
        </div>  
        <div class="col-lg-12 card mb-3">
          <div class="row">
            <div class="col-md-4 px-0">
              <img src="<?php echo base_url('utilities/images/meta/test.jpg')?>" alt="" class="product-img">
            </div>
            <div class="col-md-8 py-3">
              <div class="col-event">
                <h5><strong>Bacon ipsum dolor amet biltong</strong></h5>
                <p>Boudin venison cupim t-bone tri-tip. Short loin frankfurter filet mignon swine. Pork belly beef sausage ham hock tri-tip. Filet mignon ball tip pork swine ground round.</p>
              </div>  
              <a href="<?php echo base_url('event?q=event_id') ?>" >READ MORE</a>
            </div>
          </div>
        </div>
      </div>
      <!-- What's New -->
      <div class="offset-lg-1 col-lg-4">
        <div class="section-title ">
          <h4>What's New?</h4>
        </div>
        <div class="line">
        </div>
        <div class="col-lg-12 pb-3 mb-3 border-bottom">
          <div class="row">
            <div class="col-md-4 px-0">
              <img src="<?php echo base_url('utilities/images/meta/pulag.jpg')?>" alt="" class="product-img">
            </div>
            <div class="col-md-8 px-2">
              <div class="col-blog"> 
                <span>Bacon ipsum dolor amet biltong buffalo boudin venison prosciutto burgdoggen</span>
              </div>
              <div class="section-footer text-right">
                <a href="">READ MORE</a>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-lg-12 pb-3 mb-3 border-bottom">
          <div class="row">
            <div class="col-md-4 px-0">
              <img src="<?php echo base_url('utilities/images/meta/pulag.jpg')?>" alt="" class="product-img">
            </div>
            <div class="col-md-8 px-2">
              <div class="col-blog">
                <span>Bacon ipsum dolor amet biltong buffalo boudin venison prosciutto burgdoggen</span>
              </div>
              <div class="section-footer text-right">
                <a href="">READ MORE</a>
              </div>
            </div>
          </div>
        </div>      
      </div>      
    </div>
  </div> 
</div>     
    
