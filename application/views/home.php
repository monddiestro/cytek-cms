 
<div id="carouselExampleIndicators" class="carousel slide">
  <ol class="carousel-indicators">
    <?php $count = 0 ?>
    <?php foreach($slider as $s): ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php $count ?>" class="<?php echo $count == 0 ? 'active' : '' ?>"></li>
    <?php $count += 1; ?>
    <?php endforeach ?>
  </ol>
  <div class="carousel-inner">
    <?php foreach($slider as $s): ?>
    <div class="carousel-item active">
      <img  src="<?php echo base_url($s->img) ?>" alt="First slide">
      <div class="carousel-caption 1st-slide">
        <?php if(!empty($s->title)): ?>
        <h4><?php echo strtoupper($s->title) ?></h4>
        <?php endif ?>
        <?php if(!empty($s->description)): ?>
        <p><?php echo $s->description ?></p>
        <?php endif ?>
        <?php if(!empty($s->url)): ?>
        <a href="<?php echo $s->url ?>" class="btn btn-primary text-white px-4 py-2"><b>READ MORE</b></a>
        <?php endif ?>
      </div>
    </div>
    <?php endforeach ?>
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
            <div class="img-box">
              <img src="<?php echo empty($category->img) ? base_url('utilities/images/no-image.png') : base_url($category->img) ?>" alt="" class="product-img">
            </div>            
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
<?php if(!empty($featured)): ?>
<div style="background:#f0f0f0;">
 <div class="container home-page">
  <div class="row pb-4 pt-4">
    <?php foreach($featured as $f): ?>
    <div class="col-sm-4 mb-4">
      <div class="card">
        <div class="card-header p-0">
          <div class="img-box">
            <img src="<?php echo empty($f->img) ? base_url('utilities/images/no-image.png') : base_url($f->img) ?>" alt="" class="product-img">
          </div>
        </div>
        <div class="card-body">
          <h5><strong><?php echo ucwords($f->prod_title) ?></strong></h5>
          <p><?php echo mb_strimwidth($f->description, 0, 100, " ...") ?></p>
          <a href="<?php echo base_url('product/category/subcategory/item?id='.$f->prod_id) ?>" class="btn btn-primary text-white px-4"><b>VIEW</b></a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="row pb-5 pt-4">
    <div class="col-sm-12 text-center">
      <a class="fw-bold" href="<?php echo base_url('product'); ?>">VIEW ALL PRODUCTS</a>
    </div>
  </div>
 </div>
</div>
<?php endif; ?>
<div style="background:#fff;">  
  <div class="container home-page">   
    <!-- Events -->
    <div class="row pb-4">
      <?php if(!empty($events)): ?>
      <div class="col-lg-7">
        <div class="section-title">
          <h4>News and Events</h4>
        </div>
        <?php foreach($events as $e): ?>
        <div class="col-lg-12 card mb-3">
          <div class="row">
            <div class="col-md-4 px-0">
              <img src="<?php echo empty($e->img) ? base_url('utilities/images/meta/test.jpg') : base_url($e->img) ?>" alt="" class="event-img">
            </div>
            <div class="col-md-8 py-3">
              <div class="col-event">
                <h5><strong><?php echo $e->title ?></strong></h5>
                <p><?php echo mb_strimwidth($e->description, 0, 200, " ...") ?></p>
              </div>  
              <a href="<?php echo base_url('events?id='.$e->event_id) ?>" >READ MORE</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
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
              <img src="<?php echo base_url('utilities/images/meta/pulag.jpg')?>" alt="" class="event-img">
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
              <img src="<?php echo base_url('utilities/images/meta/pulag.jpg')?>" alt="" class="event-img">
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
    
