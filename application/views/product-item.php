<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product'); ?>">Products</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/category?id='.$cat_id); ?>"><?php echo ucwords($cat_title) ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/category/subcategory?id='.$subcat_id); ?>"><?php echo ucwords($subcat_title) ?></a></li>
        <li class="breadcrumb-item active"><?php echo ucwords($prod_title) ?></li>
    </ol>
    <div class="row">
        <!-- submenu -->
        <div class="col-lg-3 col-md-3">
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
        <div class="col-lg-6 col-md-6">
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
                                    <img src="<?php echo base_url($b->image_path) ?>" alt="">
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
            <div class="card">
                <div class="card-body">
                    <!-- tablist -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#features"><strong>Features</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#specs">Specification</a>
                        </li>
                    </ul>
                    <!-- tab panes -->
                    <div class="tab-content">
                        <div id="features" class="container tab-pane active"><br>
                           
                        </div>
                        <div id="specs" class="container tab-pane fade"><br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <!-- contact form -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6><strong>Inquire Now</strong></h6>
                    <p>Bacon ipsum dolor amet rump swine meatloaf ribeye beef ribs. </p>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="name" id="" class="form-control" placeholder="ex. Juan Dela Cruz">
                    </div>
                    <div class="form-group">
                      <label for="">Contact Number</label>
                      <input type="text" name="contact" id="" class="form-control" placeholder="ex. 091234567890 or 1234567">
                    </div>
                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea name="message" id="" rows="5" class="form-control" placeholder="Your message to us"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">SEND INQUIRY</button>
                </div>
            </div>
        </div>
    </div>
</div>