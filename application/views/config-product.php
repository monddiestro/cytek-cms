<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h3>Configure Product Page</h3>
    </div>
  </div>
  <div class="row">
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
      <div class="panel panel-default">
        <div class="panel-heading">
            Banners
        </div>
        <div class="panel panel-body">
          <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $b): ?>
              <div class="col-sm-3">
                <div style="border:1px solid #ddd;">
                  <div style="padding:10px">
                    <img style="width:100%;" src="<?php echo base_url('utilities/images/banners/'.$b->image_path) ?>" alt="">
                  </div>
                  <div style="padding:10px;">
                    <a href="<?php echo base_url('admin/drop_banner?id='.$b->banner_id) ?>"  class="btn btn-danger btn-block">DELETE</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-12">
              <div class="pull-right">
                <button type="button" data-toggle="modal" data-target="#new-banner" class="btn btn-primary">Add Banner</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- details -->
    <div class="col-sm-6">
      <?php echo form_open(base_url('admin/update_product_details')) ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Product Details</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"]; ?>">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Add product name" name="prod_name" value="<?php echo $product["prod_name"] ?>">
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select class="form-control selectpicker" title="Select Category" id="cat_id" name="cat_id" required>
                  <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat->cat_id ?>" <?php echo ($cat->cat_id == $product["cat_id"] ? 'selected' : '') ?>><?php echo $cat->cat_desc ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Subcategory</label>
                <select class="form-control selectpicker" title="Select Sub Category" id="subcat_id" name="subcat_id" required>
                  <?php foreach ($subcategories as $subcat): ?>
                    <?php if ($subcat->cat_id == $product["cat_id"]): ?>
                      <option value="<?php echo $subcat->subcat_id ?>" <?php echo ($subcat->subcat_id == $product["subcat_id"]) ? 'selected' :'' ?>><?php echo $subcat->subcat_desc ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Description</label>
                <textarea placeholder="Add your product description here" name="prod_desc" class="form-control" rows="9" cols="80"><?php echo $product["prod_desc"] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
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
    <!-- meta  -->
    <div class="col-sm-6">
      <?php echo form_open_multipart(base_urL('admin/update_product_meta')); ?>
      <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
      <div class="panel panel-default" id="product_details">
        <div class="panel-heading">
          <strong>Meta Content</strong>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Image</label>
                <img class="image_preview" style="width:100%;" src="<?php echo base_url('utilities/images/meta/'.$product["meta_img"]) ?>" alt="">
                <br/>
                <label class="btn btn-default" id="btn_browse">
                    <input type="file" name="meta_img" id="meta_img" accept="image/*" style="display:none;">
                    Browse ..
                </label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted filename">No File Selected</span>
              </div>
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="meta_title" placeholder="Add product meta title here" value="<?php echo $product["meta_title"] ?>" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="">Keywords (<small>separated by comma</small>)</label>
                <input type="text" name="meta_keyword" placeholder="Add product meta keywords here separated by comma" value="<?php echo $product["meta_keyword"] ?>" class="form-control"/>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="meta_desc" class="form-control" rows="15" cols="80" placeholder="Add product meta desciption here"><?php echo $product["meta_desc"] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-12">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Update Meta's</button>
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Product Features</strong>
        </div>
        <div class="panel-body">
            <?php if (!empty($features)): ?>
              <div class="panel-group" id="feature">
              <?php foreach ($features as $f): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#feature" href="#feature<?php echo $f->feature_id ?>">
                        <?php echo $f->feature_title ?>
                      </a>
                      <a href="<?php echo base_url('admin/drop_feature?id='.$f->feature_id) ?>" data-toggle="tooltip" title="Delete" data-placement="right" class="pull-right">
                        <span class="glyphicon glyphicon-trash text-danger"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="feature<?php echo $f->feature_id ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <img src="<?php echo base_url('utilities/images/product_src/'.$f->feature_img) ?>" alt="<?php echo $f->feature_title ?>">
                        </div>
                        <div class="col-sm-8">
                          <p>
                            <?php echo $f->feature_desc ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
              <?php else: ?>
                <h5 class="text-warning">No feature available</h5>
            <?php endif; ?>
        </div>
        <div class="panel-footer">
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>Product Specification (<small>In HTML Table format</small>)</strong>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
            <textarea name="prod_specs" rows="15" cols="80" class="form-control" placeholder="HTML Table format accepted"><?php echo $product["specs"] ?></textarea>
          </div>
        </div>
        <div class="panel-footer">
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
<!-- new banner -->
<div id="new-banner" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <?php echo form_open_multipart(base_url('admin/add_banner')); ?>
    <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Banner</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Select Image</label>
          <br/>
          <label class="btn btn-default" id="btn_browse">
              <input type="file" name="image" id="banner_img" accept="image/*" style="display:none;">
              Browse ..
          </label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted filename">No File Selected</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-primary">Save</button>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Feature Details</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="prod_id" value="<?php echo $product["prod_id"] ?>">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" class="form-control" name="title" value="">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <br/>
          <label class="btn btn-default" id="btn_browse">
              <input type="file" name="image" id="image" accept="image/*" style="display:none;">
              Browse ..
          </label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted filename">No File Selected</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
