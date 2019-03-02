<main class="cytek-main">
  <div class="wrapper">
    <div id="page-content-wrapper">
      <div class="container px-5">
        <ol class="breadcrumb pt-5">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/products') ?>">Products</a></li>
          <li class="breadcrumb-item active"><?php echo ucwords($product["prod_title"])?></li>
        </ol>
        <span class="header-text mb-2">Edit <?php echo ucwords($product["prod_title"]) ?> Details</span>
        <br/>
        <small>Don't forget to click update button to save your changes</small>
        <div class="row mt-3">
          <div class="col-sm-12">
            <!-- alert -->
            <?php
              $flash = $this->session->flashdata('result');
              if(!empty($flash)) {
                $display = 'block';
                $class = $flash["class"];
                $message = $flash["message"];
              } else {
                $display = 'none';
                $class = $message = '';
              }
            ?>
            <div class="alert alert-<?php echo $class ?> alert-dismissible" style="display:<?php echo $display ?>">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $message; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card mb-3">
              <div class="card-header">
                 <strong>Gallery</strong> 
              </div>
              <div class="card-body">
                <div class="row">
                <?php if (!empty($banners)): ?>
                  <?php foreach ($banners as $b): ?>
                    <div class="col-sm-3">
                      <div style="border:1px solid #ddd;">
                        <div class="gallery-box">
                          <img class="gallery-img" src="<?php echo base_url($b->image_path) ?>" alt="">
                        </div>
                        <div style="padding:10px;">
                          <a href="<?php echo base_url('admin/drop_banner?id='.$b->banner_id) ?>"  class="btn btn-danger btn-block">DELETE</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </div>
                  <?php else: ?>
                  <span class="text-muted">No image available</span>
                  <?php endif; ?>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pull-right">
                      <button type="button" data-toggle="modal" data-target="#new-banner" class="btn btn-primary">Add Image</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- details -->
          <div class="col-sm-12">
            <?php echo form_open_multipart(base_url('admin/update_product_details')) ?>
            <div class="card mb-3">
              <div class="card-header">
                <strong>Product Details</strong>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"]; ?>">
                    <div class="form-group">
                      <label for="">Image</label>
                      <img class="media-object" style="width:100%;" src="<?php echo base_url($product["img"]) ?>" alt="">
                      <br/>
                      <label class="btn btn-default shadow mt-2" id="btn_browse">
                          <input type="file" name="meta_img" id="img" accept="image/*" style="display:none;">
                          BROWSE
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted filename">No File Selected</span>
                    </div>
                    <div class="form-group">
                      <label for="">Category</label>
                      <select class="form-control selectpicker" title="Select Category" id="cat_id" name="cat_id" required>
                        <?php foreach ($categories as $cat): ?>
                          <option value="<?php echo $cat->cat_id ?>" <?php echo ($cat->cat_id == $product["cat_id"] ? 'selected' : '') ?>><?php echo $cat->cat_title ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Sub Category</label>
                      <select class="form-control selectpicker" title="Select Sub Category" id="subcat_id" name="subcat_id" required>
                        <?php foreach ($subcategories as $subcat): ?>
                          <?php if ($subcat->cat_id == $product["cat_id"]): ?>
                            <option value="<?php echo $subcat->subcat_id ?>" <?php echo ($subcat->subcat_id == $product["subcat_id"]) ? 'selected' :'' ?>><?php echo $subcat->subcat_title ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" placeholder="Add product name" name="prod_title" value="<?php echo $product["prod_title"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Featured</label>
                      <label class="form-check-label" style="padding-left:25px;">
                        <input type="radio" class="form-check-input" value="yes" name="featured" <?php echo $product["featured"] == 'yes' ? 'checked' : '' ?>>Yes
                      </label>
                      <label class="form-check-label" style="padding-left:25px;">
                        <input type="radio" class="form-check-input" value="no" name="featured" <?php echo $product["featured"] == 'no' ? 'checked' : '' ?>>No
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea placeholder="Add your product description here" name="description" class="form-control" rows="13"><?php echo $product["description"] ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Keywords (<small>separated by comma</small>)</label>
                      <textarea class="form-control" name="keyword" id="" placeholder="Add product meta keywords here separated by comma" rows="6"><?php echo $product["keyword"] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pull-right">
                      <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
        <div class="row">
          <!-- feature  -->
          <div class="col-sm-6">
            <div class="card mb-3">
              <div class="card-header">
                <strong>Product Features</strong>
              </div>
              <div class="card-body p-0">
                  <?php if (!empty($features)): ?>
                    <div id="accordion">
                      <?php foreach($features as $f): ?>
                        <div>
                        </div>
                        <div class="card-header">
                          <strong>
                            <div class="row">
                              <div class="col-sm-2 p-0 text-center">
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                  <a class="text-success mr-1" data-toggle="modal" data-target="#modify-feature-<?php echo $f->feature_id ?>">
                                    <span class="fa fa-edit"></span>
                                  </a>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Drop">
                                  <a class="text-danger" data-toggle="modal" data-target="#drop-feature-<?php echo $f->feature_id ?>">
                                    <span class="fa fa-trash"></span>
                                  </a>
                                </span>
                              </div>
                              <div class="col-sm-10 p-0">
                                <a class="d-flex collapse" data-toggle="collapse" href="#collapse<?php echo $f->feature_id ?>">
                                  <div class="col-sm-9 p-0"><?php echo ucwords($f->title) ?></div>
                                  <div class="col-sm-3 p-0 text-right text-primary">
                                    <span class="text-primary">
                                      <i class="fa fa-plus-circle"></i>
                                    </span>
                                  </div> 
                                </a>
                              </div>
                            </div>
                            
                          </strong>
                          <div id="collapse<?php echo $f->feature_id ?>" class="collapse" data-parent="#accordion">
                            <div class="row pt-3">
                            <?php foreach ($feature_img as $img): ?>
                              <?php if($img->feature_id == $f->feature_id): ?>
                              <div class="col-sm-4">
                                <div style="border:1px solid #ddd;">
                                  <div style="padding:10px">
                                    <img style="width:100%;" src="<?php echo base_url($img->img) ?>" alt="">
                                    <p><?php echo ucwords($img->title) ?></p>
                                  </div>
                                  <div style="padding:10px;">
                                    <a href="<?php echo base_url('admin/drop_feature_img?id='.$img->img_id) ?>"  class="btn btn-danger btn-block text-white">DELETE</a>
                                  </div>
                                </div>
                              </div>
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                            <button type="button" data-toggle="modal" data-target="#feature_img_<?php echo $f->feature_id ?>" class="btn btn-primary my-2">Add Image</button>
                            <br>
                            <?php echo $f->description ?>
                          </div>
                        </div>
                        <div id="feature_img_<?php echo $f->feature_id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <?php echo form_open_multipart(base_url('admin/add_feature_img')); ?>
                            <input type="hidden" name="feature_id" value="<?php echo $f->feature_id ?>">
                            <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Feature Image</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" class="form-control" placeholder="Image title">
                                </div>
                                <div class="form-group">
                                  <span class="form-label">Select Image</span>
                                  <br/>
                                  <label class="btn btn-default shadow" id="btn_browse">
                                      <input type="file" name="meta_img" accept="image/*" style="display:none;">
                                      BROWSE
                                  </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="button" class="btn btn-default">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php else: ?>
                    <span class="text-muted">No feature available</span>
                  <?php endif; ?>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pull-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-feature">New Feature</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- specs -->
          <div class="col-sm-6">
            <?php echo form_open('admin/update_specs') ?>
            <div class="card mb-3">
              <div class="card-header">
                <strong>Product Specification (<small>In HTML Table format</small>)</strong>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
                  <textarea name="prod_specs" rows="15" cols="80" class="form-control" placeholder="HTML Table format accepted"><?php echo $specification ?></textarea>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="pull-right">
                      <button type="submit" class="btn btn-primary">Update Specs</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- new banner -->
<div id="new-banner" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <?php echo form_open_multipart(base_url('admin/add_banner')); ?>
    <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Product Image</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <span class="form-label">Select Image</span>
          <br/>
          <label class="btn btn-default shadow" id="btn_browse">
              <input type="file" name="meta_img" accept="image/*" style="display:none;">
              BROWSE
          </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-default">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<!-- new feature  -->
<div id="new-feature" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/add_feature')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Feature Details</span>
      </div>
      <div class="modal-body">
        <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
        <div class="form-group">
          <span class="form-label">Title</span>
          <input type="text" class="form-control" name="title" value="">
        </div>
        <div class="form-group">
          <span class="form-label">Description</span>
          <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-default">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php foreach($features as $f): ?>
<div id="modify-feature-<?php echo $f->feature_id ?>" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/mod_feature')) ?>
    <input type="hidden" name="feature_id" value="<?php echo $f->feature_id ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Feature</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <span class="form-label">Title</span>
          <input type="text" name="title" class="form-control" value="<?php echo $f->title ?>" placeholder="Input here the feature title of the product" required>
        </div>
        <div class="form-group">
          <span class="form-label">Description</span>
          <textarea name="description" class="form-control" laceholder="Input here description. HTML also accepted" rows="20" required><?php echo $f->description ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="button" class="btn btn-default">Save</button>
      </div>
    </div>
    <?php echo form_close(); ?>  
  </div>
</div>
<div class="modal fade" role="dialog" aria-hidden="true" id="drop-feature-<?php echo $f->feature_id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Drop Feature</div>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete <strong><?php echo $f->title ?></strong> feature? If yes all componets will be deleted.</p>
      </div>
      <div class="modal-footer">
      <button class="btn btn-deafault" type="button" data-dismiss="modal">No</button>
        <a href="<?php echo base_url('admin/drop_feature?id='.$f->feature_id) ?>" class="btn btn-default">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>