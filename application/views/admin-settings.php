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
                        <img style="width:100%" src="<?php echo base_url($s->img) ?>" alt="">
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
                  <label for="">About</label>
                </div>
                <div class="col-2 text-right">
                  <a data-toggle="modal" data-target="#about" class="text-success"><span class="fa fa-edit"></span></a>
                </div>
              </div>
            </div>
            <div class="card-header">
            <?php foreach($about as $a): ?>
              <div class="row">
                <div class="col-sm">
                  <label>Image</label>
                  <img src="<?php echo empty($a->meta_image) ? base_url('utilities/images/no-image.png') : base_url($a->meta_image) ?>" style="width:100%;margin-bottom:10px" alt="">
                </div>
                <div class="col-sm">
                  <label>Title</label>
                  <p><?php echo $a->title ?><p>
                </div>
                <div class="col-sm">
                  <label>Keywords</label>
                  <p><?php echo $a->meta_keywords ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <label>Description</label>
                  <p><?php echo $a->meta_description ?></p>
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
                <div class="col-10"><label>Company Details</label></div>
                <div class="col-2 text-right"><a data-toggle="modal" data-target="#company" class="text-success"><span class="fa fa-edit"></span></a></div>
              </div>
            </div>
            <?php foreach($company_settings as $c): ?>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Contact</label>
                    <p><?php echo $c->contact ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Email Address</label>
                    <p><?php echo $c->email ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Office Hours</label>
                    <p><?php echo $c->office_hours ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <p><?php echo $c->address ?></p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Facebook</label>
                    <p><?php echo $c->facebook ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Twitter</label>
                    <p><?php echo $c->twitter ?></p>
                  </div>
                  <div class="form-group">
                    <label for="">Instagram</label>
                    <p><?php echo $c->instagram ?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <label for="">Description</label>
                  <br/>
                  <?php echo $c->description ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10"><label>Careers</label></div>
                <div class="col-2 text-right"><a data-toggle="modal" data-target="#career" class="text-primary"><span class="fas fa-plus"></span></a></div>
              </div>
            </div>
            <div class="card-body">
              <table class="table tbl-mobile mb-0 ">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date Posted</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($careers as $c): ?>
                  <tr>
                    <td><?php echo $c->title ?></td>
                    <td><?php echo $c->description ?></td>
                    <td><?php echo date('F d, Y',strtotime($c->date_created)); ?></td>
                    <td>
                    <span data-toggle="tooltip" data-placement="top" title="Edit">
                      <a class="text-success" data-toggle="modal" data-target="#modify-career-<?php echo $c->career_id ?>">
                        <i class="fa fa-edit mr-1"></i>
                      </a>
                    </span>
                    <span data-toggle="tooltip" data-placement="top" title="Delete">
                      <a class="text-danger" data-toggle="modal" data-target="#delete-career-<?php echo $c->career_id ?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-12">
          <h6 class="fw-bold">Account Settings</h6>
        </div>
      </div>
      <div class="row mt-3 mb-4">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-10">
                  <label for="">Personal Info</label>
                </div>
                <div class="col-2 text-right">
                  <a data-toggle="modal" data-target="#updatepwd" class="text-primary"><span class="fas fa-shield-alt"></span></a>
                  <a data-toggle="modal" data-target="#account" class="text-success"><span class="fa fa-edit"></span></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php foreach($user as $u): ?>
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <img style="width:100%" src="<?php echo empty($u->img) ? base_url('utilities/images/no-image.png') : base_url($u->img) ?>" alt="">
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" value="<?php echo $u->f_name ?>" name="f_name" placeholder="ex. Juan"/>
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $u->l_name ?>" name="l_name" placeholder="ex. Dela Cruz"/>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?php echo $u->email ?>" name="email" placeholder="ex. juandelacruz@email.com"/>
                  </div>
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" value="<?php echo $u->contact ?>" name="contact" placeholder="ex. Dela Cruz"/>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<div id="account" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/update_user')); ?>
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
          <textarea name="description" placeholder="Add your product description here .." class="form-control" rows="10"><?php echo $p->meta_description ?></textarea>
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
<!-- about setting -->
<?php foreach($about as $a): ?>
<div id="about" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/modify_about')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">About Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="<?php echo $a->title ?>" placeholder="ex. Company Name"/>
          <small>Title for About Us</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add your slider description here .." class="form-control" rows="10"><?php echo $a->meta_description ?></textarea>
          <small>Description for your page</small>
        </div>
        <div class="form-group">
          <input type="text" placeholder="Add keywords here separated by comma" name="keywords" value="<?php echo $a->meta_keywords ?>" class="form-control">
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
<?php foreach($company_settings as $c): ?>
<div id="company" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open_multipart(base_url('admin/modify_company')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Company Details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <input name="contact" class="form-control" type="form-control" value="<?php echo $c->contact ?>" placeholder="ex. (+63)912-3456-7891 / (+63)2-345-6789"/>
              <small>Contact Number</small>
            </div>
            <div class="form-group">
              <input name="email" class="form-control" type="form-control" value="<?php echo $c->email ?>" placeholder="ex. company.email@mail.com"/>  
              <small>Email Address</small>
            </div>
            <div class="form-group">
              <input name="office_hours" class="form-control" type="form-control" value="<?php echo $c->office_hours ?>" placeholder="ex. Monday - Friday (8:30 AM - 6:00 PM)"/>  
              <small>Office Hours</small>
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
          <div class="col-sm-6">
            <div class="form-group">
              <input name="facebook" class="form-control"  value="<?php echo $c->facebook ?>" placeholder="ex. facebook.com/companypage"/>  
              <small>Facebook</small>
            </div>
            <div class="form-group">
              <input name="twitter" class="form-control" type="form-control" value="<?php echo $c->twitter ?>" placeholder="ex. twitter.com/companyname"/>  
              <small>Twitter</small>
            </div>
            <div class="form-group">
              <input name="instagram" class="form-control" type="form-control" value="<?php echo $c->instagram ?>" placeholder="ex. instagram.com/companyname"/>  
              <small>Instagram</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <textarea name="address" cols="30" rows="2" class="form-control" placeholder="Add company address here .."></textarea>  
              <small>Address</small>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <textarea class="form-control" name="description" id="" cols="30" rows="15" placeholder="ex. Add your company description here.."><?php echo $c->description ?></textarea>
              <small>Company Description (accept html tag)</small>
            </div>
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
<!-- new career -->
<div id="career" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/add_career')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Job Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input name="title" class="form-control" type="form-control" value="" placeholder="ex. Marketing Assistant"/>
          <small>Job Title</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add the job description here (accept HTML tags) .." class="form-control" rows="10"></textarea>
          <small>Job Description</small>
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
<!-- modify and delete -->
<?php foreach($careers as $c): ?>
<div id="modify-career-<?php echo $c->career_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/update_career')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Job Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="career_id" value="<?php echo $c->career_id ?>">
          <input name="title" class="form-control" type="form-control" value="<?php echo $c->title ?>" placeholder="ex. Marketing Assistant"/>
          <small>Job Title</small>
        </div>
        <div class="form-group">
          <textarea name="description" placeholder="Add the job description here (accept HTML tags) .." class="form-control" rows="10"><?php echo $c->description ?></textarea>
          <small>Job Description</small>
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
<div id="delete-career-<?php echo $c->career_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/update_career')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Job Post</h4>
      </div>
      <div class="modal-body">
        Are you sure to delete <strong><?php echo $c->title; ?></strong> job post? 
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-default">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php endforeach; ?>