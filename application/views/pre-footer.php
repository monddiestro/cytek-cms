<footer>
  <div class="container-fluid footer-section">
    <div class="row">
      <div class="col-lg-7 pr-0 text-white">
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
      <div class="col-lg-3">
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
      <div class="col-lg-2 pl-4 mb-4">
        <p class="footer-title">Inquire now</p>
        <p class="footer-content">If you have question you can reach us. Just fill up the form below.</p>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-footer" style="display:none">
          <strong>Thank you!</strong> We received your inquiry we will contact you soon.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="form-group">
          <input type="text" id="footer-name" class="form-control" name="name" placeholder="Enter your name*" required>
        </div>
        <div class="form-group">
          <input type="text" id="footer-contact" class="form-control" name="contact" placeholder="Enter your contact number*" required>
        </div>
        <div class="form-group">
          <input type="text" id="footer-email" name="email" class="form-control" placeholder="Enter your email address">
        </div>
        <div class="form-group">
          <input type="text" name="company_name" id="footer-company" class="form-control" placeholder="Enter your company name">
        </div>
        <div class="form-group">
          <input type="text" name="department" id="footer-department" class="form-control" placeholder="Enter your department designation">
        </div>
        <div class="form-group">
          <input type="text" name="position" id="footer-position" class="form-control" placeholder="Enter your position">
        </div>
        <div class="form-group">
          <textarea name="message" id="footer-message" class="form-control" cols="10" rows="5" placeholder="Enter your message here"></textarea>
        </div>
        <button type="submit" id="footer-inquire" class="btn btn-warning text-white mw-100">INQUIRE</button>
      </div>
    </div>
  </div>
</footer>

