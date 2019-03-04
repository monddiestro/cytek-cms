<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container px-5 pt-5">
      <div class="row">
          <div class="col-lg-4">
            <div class="header-text header-mt">
              <span>SETTINGS</span>
            </div>
          </div>
      </div>
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
          <div class="card">
            <div class="card-header">
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#new-slider" class="btn btn-primary">ADD SLIDER</button>
            </div>
            <div class="card-header">
              <div class="row">
                <?php foreach($sliders as $s): ?>
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <img style="width:100%;" src="<?php echo base_url($s->img) ?>" alt="">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm">
                          <label><?php echo $s->title ?></label>
                        </div>
                        <div class="col-sm text-right">
                          <a data-toggle="modal" data-target="#modify-slider-<?php echo $s->slider_id ?>" class="text-success"><span class="fa fa-edit"></span></a>
                          <a href="<?php echo base_url('admin/drop_slider?id='.$s->slider_id) ?>"  class="text-danger"><span class="fa fa-trash"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>                                
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-12">
          <h6 class="fw-bold">Page Settings</h6>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10">
                  <label for="">Home</label>
                </div>
                <div class="col-2 text-right">
                  <a data-toggle="modal" data-target="#homepage" class="text-success"><span class="fa fa-edit"></span></a>
                </div>
              </div>
            </div>
            <div class="card-header">
            <?php foreach($home as $h): ?>
              <div class="row">
                <div class="col-sm">
                  <label>Image</label>
                  <img src="<?php echo empty($h->meta_image) ? base_url('utilities/images/no-image.png') : base_url($h->meta_image) ?>" style="width:100%;margin-bottom:10px" alt="">
                </div>
                <div class="col-sm">
                  <label>Title</label>
                  <p><?php echo $h->title ?><p>
                </div>
                <div class="col-sm">
                  <label>Keywords</label>
                  <p><?php echo $h->meta_keywords ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <label>Description</label>
                  <p><?php echo $h->meta_description ?></p>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10">
                  <label for="">Product</label>
                </div>
                <div class="col-2 text-right">
                  <a data-toggle="modal" data-target="#product" class="text-success"><span class="fa fa-edit"></span></a>
                </div>
              </div>
            </div>
            <div class="card-header">
            <?php foreach($product as $p): ?>
              <div class="row">
                <div class="col-sm">
                  <label>Image</label>
                  <img src="<?php echo empty($p->meta_image) ? base_url('utilities/images/no-image.png') : base_url($p->meta_image) ?>" style="width:100%;margin-bottom:10px" alt="">
                </div>
                <div class="col-sm">
                  <label>Title</label>
                  <p><?php echo $p->title ?><p>
                </div>
                <div class="col-sm">
                  <label>Keywords</label>
                  <p><?php echo $p->meta_keywords ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <label>Description</label>
                  <p><?php echo $p->meta_description ?></p>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10">
                  <label for="">Account</label>
                </div>
                <div class="col-2 text-right">
                  <a data-toggle="modal" data-target="#account" class="text-success"><span class="fa fa-edit"></span></a>
                </div>
              </div>
            </div>
            <div class="card-header"></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<!-- new slider modal -->
<div id="new-slider" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/add_slider')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Slider Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="" placeholder="ex. Buy one take one"/>
          <small>Title caption over slider</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add your slider description here .." class="form-control" rows="10"></textarea>
          <small>Subtext over the slider</small>
        </div>
        <div class="form-group">
          <input type="text" placeholder="Add URL for the slider" name="url" class="form-control">
          <small>Landing page for the slider promotion</small>
        </div>
        <div class="form-group">
          <label class="form-label">Select Image</label>
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
<!-- modify slider modal -->
<?php foreach($sliders as $s): ?>
<div id="modify-slider-<?php echo $s->slider_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/modify_slider')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Slider Details</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $s->slider_id ?>" name='slider_id'>
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="<?php echo $s->title ?>" placeholder="ex. Buy one take one"/>
          <small>Title caption over slider</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add your slider description here .." class="form-control" rows="10"><?php echo $s->description ?></textarea>
          <small>Subtext over the slider</small>
        </div>
        <div class="form-group">
          <input type="text" placeholder="Add URL for the slider" name="url" value="<?php echo $s->url ?>" class="form-control">
          <small>Landing page for the slider promotion</small>
        </div>
        <div class="form-group">
          <label class="form-label">Select Image</label>
          <br/>
          <label class="btn btn-default shadow" id="btn_browse">
              <input type="file" name="meta_img" accept="image/*" style="display:none;">
              BROWSE
          </label>&nbsp;&nbsp;<span class="text-muted filename small"><?php echo str_replace('utilities/images/slider/',"",$s->img); ?></span>
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
<?php endforeach ?>
<!-- homepage setting -->
<?php foreach($home as $h): ?>
<div id="homepage" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/modify_homepage')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Home Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="<?php echo $h->title ?>" placeholder="ex. Company Name"/>
          <small>Title for Homepage</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add your slider description here .." class="form-control" rows="10"><?php echo $h->meta_description ?></textarea>
          <small>Description for your page</small>
        </div>
        <div class="form-group">
          <input type="text" placeholder="Add keywords here separated by comma" name="keywords" value="<?php echo $h->meta_keywords ?>" class="form-control">
          <small>Keywords that will help to define your home page</small>
        </div>
        <div class="form-group">
          <label class="form-label">Select Image</label>
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
<?php endforeach ?>
<!-- product setting -->
<?php foreach($product as $p): ?>
<div id="product" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/modify_product')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Product Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="<?php echo $p->title ?>" placeholder="ex. Company Name"/>
          <small>Title for Homepage</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add your slider description here .." class="form-control" rows="10"><?php echo $p->meta_description ?></textarea>
          <small>Description for your page</small>
        </div>
        <div class="form-group">
          <input type="text" placeholder="Add keywords here separated by comma" name="keywords" value="<?php echo $p->meta_keywords ?>" class="form-control">
          <small>Keywords that will help to define your home page</small>
        </div>
        <div class="form-group">
          <label class="form-label">Select Image</label>
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
<?php endforeach ?>
