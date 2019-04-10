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
        <?php $subcat_id = 0; $cnt=0 ?>
        <div class="row">
        <?php foreach($products as $p): ?>
          <?php if($p->subcat_id != $subcat_id):?>
          <?php $cnt+= 1; ?>
            <?php if($cnt > 1): ?>
              </ul>
            </div>
            <?php endif; ?>
          <div class="col-lg-4 col-md-6">
            <p class="footer-title"><a href="<?php echo base_url('product/category/subcategory?id='.$p->subcat_id) ?>"><?php echo ucwords($p->subcat_title) ?></a></p>
            <ul class="list-unstyled">
              <li><a href="<?php echo base_url('product/category/subcategory/item?id='.$p->prod_id) ?>"><?php echo ucwords($p->prod_title) ?></a></li>
          <?php $subcat_id = $p->subcat_id;continue; ?>
          <?php endif; ?>
          <li><a href="<?php echo base_url('product/category/subcategory/item?id='.$p->prod_id) ?>"><?php echo ucwords($p->prod_title) ?></a></li>
          <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-5 pl-4 mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <p class="footer-title">Inquire now</p>
                <p class="footer-content">If you have question you can reach us. Just fill up the form below.</p>
              </div>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-footer" style="display:none">
              <strong>Thank you!</strong> We received your inquiry we will contact you soon.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="row">
              <div class="col-lg-6">
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
              </div>
              <div class="col-lg-6 text-right">
                <div class="form-group">
                  <input type="text" name="position" id="footer-position" class="form-control" placeholder="Enter your position">
                </div>
                <div class="form-group">
                  <textarea name="message" id="footer-message" class="form-control" cols="10" rows="6" placeholder="Enter your message here"></textarea>
                </div>
                <button type="submit" id="footer-inquire" class="btn btn-warning text-white mw-100">INQUIRE</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p class="footer-title">About</p>
            <ul class="list-unstyled">
              <li><a href="<?php echo base_url('about') ?>">About us</a></li>
              <li><a href="<?php echo base_url('events') ?>">Events</a></li>
              <li><a href="<?php echo base_url('article') ?>">Article</a></li>
              <li><a href="<?php echo base_url('about') ?>">Careers</a></li>
              <li><a href="<?php echo base_url('terms_and_conditions') ?>">Terms and Conditions</a></li>
              <li><a href="<?php echo base_url('privacy_policy') ?>">Privacy Policy</a></li>
              <li><a href="<?php echo base_url('cookies') ?>">Cookies</a></li>
              <li><a href="<?php echo base_url('sitemap') ?>">Sitemap</a></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <?php foreach($company as $c): ?>
            <p class="footer-title">Connect with us</p>
            <?php if(!empty($c->facebook)): ?>
            <span><a href="<?php echo $c->facebook ?>" target="_blank" class="mr-1"><img src="https://i.imgur.com/GvxcSKF.png" alt="" width="25"></a></span>
            <?php endif ?>
            <?php if(!empty($c->twitter)): ?>
            <span><a href="<?php echo $c->twitter ?>"  target="_blank" class="mr-1"><img src="https://i.imgur.com/QJzodYC.png" alt="" width="25"></a></span>
            <?php endif ?>
            <?php if(!empty($c->instagram)): ?>
            <span><a href="<?php echo $c->instagram ?>" target="_blank" class="mr-1"><img src="https://i.imgur.com/HhXQZm5.png" alt="" width="25"></a></span>
            <?php endif ?>
            <?php endforeach ?>
          </div>
        </div>
        <p class="footer-title">contact us</p>
        <?php foreach($company as $c): ?>
        <ul class="list-unstyled">
          <li><span><?php echo $c->contact ?></span></li>
          <li><span><?php echo $c->email ?></span></li>
          <li><span><?php echo $c->address ?></span></li>
          <li><span><?php echo $c->office_hours ?></span></li>
        </ul>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</footer>

