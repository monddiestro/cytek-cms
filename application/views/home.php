<div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#carousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container">
    <!-- Products -->
    <div class="row center">
      <div class="col-sm-12 center-title">
        <h3>Our Products</h3>
        <h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </h5>
      </div>
    </div>
    <div class="row">
      <?php foreach($categories as $category): ?>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/'.$category->meta_img)?>" alt="">
            <h5><strong><?php echo $category->cat_desc ?></strong></h5>
            <p><?php echo mb_strimwidth($category->meta_desc, 0, 100, " ...") ?></p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('category?q='.$category->cat_id) ?>" class="btn btn-primary">VIEW PRODUCTS</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <!-- Events -->
    <div class="row center">
      <div class="col-sm-12 center-title">
        <h3>Events</h3>
        <h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Blogs -->
    <div class="row center">
      <div class="col-sm-12 center-title">
        <h3>Blogs</h3>
        <h5>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
            <h5><strong>Lorem Ipsum Dolors</strong></h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo base_url('event?q=event_id') ?>" class="btn btn-primary">READ MORE</a>
          </div>
        </div>
      </div>
    </div>
</div>