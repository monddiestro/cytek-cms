<footer>
  <div class="container footer-section">
    <div class="row">
      <div class="col-lg-8 pr-0 text-white">
        <div class="row">
          <?php foreach($categories as $c): ?>
          <div class="col-lg-4 col-md-6">
            <p class="footer-title"><a href="<?php echo base_url('product/category?id='.$c->cat_id) ?>"><?php echo ucwords($c->cat_title) ?></a></p>
            <ul class="list-unstyled">
              <?php foreach($subcategories as $s): ?>
                <?php if($s->cat_id == $c->cat_id): ?>
                  <li><a href="<?php echo base_url('product/category/subcategory?id='.$s->subcat_id) ?>"><?php echo ucwords($s->subcat_title) ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pl-5 mb-4">
        <p class="footer-title">Inquire now</p>
        <p class="footer-content">Send your inquiries to us and we will contact you</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your name*">
        </div>
        <div class="form-group">
          <textarea name="" id="" class="form-control" cols="10" rows="5" placeholder="Enter your message here*"></textarea>
        </div>
        <a href="" class="btn btn-warning text-white mw-100">INQUIRE</a>
        <div class="row">
          <div class="col-lg-6">
            <p class="footer-title">About</p>
            <ul class="list-unstyled">
              <li><a href="">About us</a></li>
              <li><a href="">Events</a></li>
              <li><a href="">Blogs</a></li>
              <li><a href="">Terms and Conditions</a></li>
              <li><a href="">Privacy Policy</a></li>
              <li><a href="">Cookies</a></li>
              <li><a href="">Sitemap</a></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <p class="footer-title">Connect with us</p>
            <span><a href="" class="mr-1"><img src="https://i.imgur.com/GvxcSKF.png" alt="" width="25"></a></span>
            <span><a href="" class="mr-1"><img src="https://i.imgur.com/QJzodYC.png" alt="" width="25"></a></span>
            <span><a href="" class="mr-1"><img src="https://i.imgur.com/HhXQZm5.png" alt="" width="25"></a></span>
          </div>
        </div>
        <p class="footer-title">contact us</p>
        <ul class="list-unstyled">
          <li><span>(02)-123-4567 / (63)9123-456-7890</span></li>
          <li><span>#123 Lorem Ipsum St. Lorem Ipsum City, Metro Manila Philippines </span></li>
          <li><span>Monday - Saturday (9:00 AM - 6:30PM)</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

