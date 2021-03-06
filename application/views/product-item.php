<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product'); ?>">Products</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/category?id='.$cat_id); ?>"><?php echo ucwords($cat_title) ?></a></li>
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url('product/category/subcategory?id='.$subcat_id); ?>"><?php echo ucwords($subcat_title) ?></a></li>
        <li class="breadcrumb-item active"><?php echo ucwords($prod_title) ?></li>
    </ol>
    <div class="row">
        <!-- submenu -->
        <div class="col-lg-3 d-lg-block d-none">
            <div class="card">
                <div class="card-header">
                    <span class="card-title"><strong><?php echo $subcat_title ?></strong></span>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled fw-light">
                        <?php foreach($data as $p): ?>
                        <li>
                            <a href="<?php echo base_url('product/category/subcategory/item?id='.$p->prod_id) ?>"><?php echo $p->prod_title ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- body -->
        <div class="col-lg-6 col-md-8">
            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4><strong><?php echo ucwords($prod_title) ?></strong></h4>
                                <h6><?php echo ucwords($subcat_title) ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul id="product-gallery" class="list-unstyled cS-hidden">
                                <?php foreach($banners as $b): ?>
                                <li data-thumb="<?php echo base_url($b->image_path) ?>">
                                    <img class="img-pro" src="<?php echo base_url($b->image_path) ?>" alt="">
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><?php echo ucfirst($description) ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <h6><strong>Features</strong></h6>
                        <div id="accordion">
                            <?php foreach($features as $f): ?>
                            <div class="card">
                                <div class="card-header">
                                    <strong>
                                    <a class="d-flex collapse" data-toggle="collapse" href="#collapse<?php echo $f->feature_id ?>">
                                        <div class="col-sm-11 p-0"><?php echo ucwords($f->title) ?></div>
                                        <div class="col-sm-1 p-0 text-right text-primary">
                                        <i class="fa fa-plus-circle"></i>
                                        </div> 
                                    </a>
                                    </strong>
                                    <div id="collapse<?php echo $f->feature_id ?>" class="collapse" data-parent="#accordion">
                                        <div class="row py-3">
                                            <?php foreach($feature_img as $img): ?>
                                            <?php if($img->feature_id == $f->feature_id): ?>
                                            <div class="col-lg-4 col-sm-12">
                                                <img width="100%" src="<?php echo base_url($img->img) ?>" alt="">
                                                <small><?php echo ucwords($img->title) ?></small>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <div><?php echo str_replace('\\','',$f->description) ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <h6><strong>Specification</strong></h6>
                        <div style="width:100%;">
                            <div class="table-responsive">
                                <?php echo $specs ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <!-- contact form -->
        <div class="col-lg-3 col-md-4">
            <div class="card sticky-form">
                <div class="card-body">
                    <h6><strong>Inquire Now</strong></h6>
                    <p>If you have question you can reach us. Just fill up the form below.</p>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="inquire-success" style="display:none">
                        <strong>Thank you!</strong> We received your inquiry we will contact you soon.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="name" id="inquire-name" class="form-control" placeholder="ex. Juan Dela Cruz">
                    </div>
                    <div class="form-group">
                      <label for="">Contact Number</label>
                      <input type="text" name="contact" id="inquire-contact" class="form-control" placeholder="ex. 091234567890 or 1234567">
                    </div>
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" name="contact" id="inquire-email" class="form-control" placeholder="ex. juandelacruz@email.com">
                    </div>
                    <div class="form-group">
                      <label for="">Company Name</label>
                      <input type="text" name="company_name" id="inquire-company" class="form-control" placeholder="ex. Cytek Group Inc.">
                    </div>
                    <div class="form-group">
                      <label for="">Department</label>
                      <input type="text" name="department" id="inquire-department" class="form-control" placeholder="ex. Marketing">
                    </div>
                    <div class="form-group">
                      <label for="">Position</label>
                      <input type="text" name="position" id="inquire-position" class="form-control" placeholder="ex. Marketing Officer">
                    </div>
                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea name="message" id="inquire-message" rows="5" class="form-control" placeholder="Your message to us"></textarea>
                    </div>
                    <input type="hidden" value="<?php echo $prod_title ?> Product Page" id="inquire-source">
                    <button type="submit" id="inquire-send" class="btn btn-primary btn-lg btn-block">SEND INQUIRY</button>
                </div>
            </div>
        </div>
    </div>
</div>