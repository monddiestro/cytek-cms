<main class="cytek-main">
  <div class="wrapper">
    <div id="page-content-wrapper">
      <div class="container px-5 pt-5">
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
      <div class="row">
          <div class="col-lg-4">
            <div class="header-text header-mt">
              <span>PRODUCT</span>
            </div>
          </div>
          <div class="col-lg-8 ctg-function">
            <div class="row header-mt">
              <div class="col-md-8">
                <input type="text" class="form-control form-shadow" placeholder="Product name">
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-product"><b>New Product</b></button>
              </div>
            </div>            
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow">
            <table class="table tbl-mobile mb-0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $p): ?>
                  <tr>
                    <td data-title="Name" class="td-header"><?php echo $p->prod_title ?></td>
                    <td data-title="Category"><?php echo $p->cat_title ?></td>
                    <td data-title="Sub Category"><?php echo $p->subcat_title ?></td>
                    <td>
                      <span data-toggle="tooltip" data-placement="top" title="Edit">
                        <a href="<?php echo base_url('admin/config_product?id='.$p->prod_id) ?>"  class="text-success mr-3" style="text-decoration:none;">
                          <span> <i class="fa fa-edit"></i></span>
                        </a>
                      </span>
                      <span data-toggle="tooltip" data-placement="top" title="Delete">
                        <a  data-toggle="modal" data-target="#drop-product-<?php echo $p->prod_id ?>" class="text-danger">
                          <span> <i class="fa fa-trash"></i></span>
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
    </div>
  </div>
</main>
<!-- new product -->
<div id="new-product" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/new_products')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">New Product</span>
      </div>
      <div class="modal-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label" for="cat_id">Category</label>
                <select class="selectpicker form-control" title="Select Category" id="cat_id" name="cat_id" required>
                  <?php foreach ($categories as $c): ?>
                    <option value="<?php echo $c->cat_id ?>"><?php echo $c->cat_title ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label" for="cat_id">Sub-Category</label>
                <select class="selectpicker form-control" title="Select Sub Category" id="subcat_id" name="subcat_id" required>

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="well">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label" for="meta_title">Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="form-label" for="meta_desc">Description</label>
                <textarea name="meta_desc" rows="4" cols="80" class="form-control" required></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label" for="meta_keywords">Keywords</label>
                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="" required/>
              </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="meta_img">Image</label>
                <br/>
                <label class="btn btn-default shadow mt-2" id="btn_browse">
                    <input type="file" name="meta_img" id="meta_img" accept="image/*" style="display:none;">
                    <b>BROWSE</b>
                </label>&nbsp;&nbsp;<span class="text-muted filename small">No File Selected</span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label for="">Featured</label>
              <label class="form-check-label" style="padding-left:25px;">
                <input type="radio" class="form-check-input" value="yes" name="featured" checked>Yes
              </label>
              <label class="form-check-label" style="padding-left:25px;">
                <input type="radio" class="form-check-input" value="no" name="featured">No
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<!-- delete product -->
<?php foreach ($products as $p): ?>
  <div id="drop-product-<?php echo $p->prod_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <span class="form-label">Are you sure to delete you want to delete <?php echo $p->prod_name; ?>?</span>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('admin/drop_product?id='.$p->prod_id) ?>" class="btn btn-default">Yes</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
