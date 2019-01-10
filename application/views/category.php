<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container px-5">
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
          <div class="col-lg-6">
            <div class="header-text header-mt">
              <span>Product Categories</span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row header-mt">
              <div class="col-lg-8">
                <input type="text" class="form-control" placeholder="Category name">
              </div>
              <div class="col-lg-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-category"><i class="fa fa-plus"></i>&nbsp;&nbsp;Category</button>
              </div>
            </div>            
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="card shadow">
              <table class="table mb-0 pro-table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Category</th>
                          <th></th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($categories as $cat): ?>
                        <tr>
                          <td><?php echo $cat->cat_id ?></td>
                          <td><?php echo $cat->cat_desc ?></td>
                          <td width="35%">
                            <div class="border">
                              <button class="btn btn-link w-100 " type="button" data-toggle="collapse" data-target="#subCollapse<?php echo $cat->cat_id ?>" aria-expanded="false" aria-controls="subCollapse">
                              Sub Categories
                              </button>
                              <div id="subCollapse<?php echo $cat->cat_id ?>" class="collapse" aria-labelledby="headingOne">
                                <div class="">
                                  <table class="table mb-0">
                                    <?php foreach ($subcategories as $subcat): ?>
                                      <?php if ($subcat->cat_id == $cat->cat_id): ?>
                                        <tr>
                                          <td>
                                            <?php echo $subcat->subcat_desc ?>
                                          </td>
                                          <td width="10">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                              <a class="text-success" data-toggle="modal" data-target="#modify-subcategory-<?php echo $subcat->subcat_id ?>">
                                                <i class="fa fa-pencil"></i>
                                              </a>
                                            </span>
                                          </td>
                                          <td width="10">
                                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                              <a class="text-danger" data-toggle="modal" data-target="#delete-subcategory-<?php echo $subcat->subcat_id ?>">
                                                <i class="fa fa-trash"></i>
                                              </a>
                                            </span>
                                          </td>
                                        </tr>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                    </table>
                                </div>
                              </div>
                            </div>                            
                          </td>
                          <td class="text-center">
                            <span data-toggle="tooltip" data-placement="top" title="Edit Category">
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modify-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-edit"></span>
                              </button>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="New Sub Category">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-sub-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-plus"></span>
                              </button>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Delete Category">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-trash"></span>
                              </button>
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


<!-- new category modal -->
<div id="new-category" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/new_category')) ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Category</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <label for="category">Category Name</label>
                <input class="form-control" name="category_name" type="text" placeholder="Example: Microscope" required>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Meta Title</label>
              <input class="form-control" name="meta_title" type="text" placeholder="Example: Microscope" required>
            </div>
            <div class="form-group">
              <label>Meta Keywords</label>
              <input class="form-control" name="meta_keywords" type="text" placeholder="Words separated by comma" required>
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <textarea class="form-control" name="meta_desc" rows="8" cols="80" placeholder="Description for category"></textarea>
            </div>
            <div class="form-group">
                <label for="meta_img">Meta Image</label>
                <br>
                <label class="btn btn-default" id="btn_browse">
                    <input type="file" name="meta_img" accept="image/*" style="display:none;">
                    Browse ..
                </label>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-muted filename">No File Selected</span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<!-- new subcategory modal -->
<?php foreach ($categories as $cat): ?>
  <div id="new-sub-category-<?php echo $cat->cat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <?php echo form_open(base_url('admin/new_subcategory')) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sub Category of <?php echo $cat->cat_desc ?></h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                  <label for="category">Sub Category Name</label>
                  <input class="form-control" type="text" name="subcategory" placeholder="Example: Stereo Zoom Microscope" required>
                  <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id; ?>">
                  <input type="hidden" name="cat_desc" value="<?php echo $cat->cat_desc; ?>">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<?php endforeach; ?>
<!-- delete category and modify -->
<?php foreach ($categories as $cat): ?>
  <div id="delete-category-<?php echo $cat->cat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <?php echo form_open(base_url('admin/drop_category')) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Category </h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id ?>">
                <input type="hidden" name="cat_desc" value="<?php echo $cat->cat_desc ?>">
                Are you sure you want to delete <?php echo $cat->cat_desc ?> and it's subcategories?
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <div id="modify-category-<?php echo $cat->cat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <?php echo form_open(base_url('admin/modify_category')) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modify Category</h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id ?>">
                <div class="form-group">
                  <label for="category">Category Name</label>
                  <input class="form-control" name="cat_desc" type="text" placeholder="Example: Microscope" value="<?php echo $cat->cat_desc ?>" required>
                </div>
                <div class="form-group">
                  <label>Meta Title</label>
                  <input class="form-control" name="meta_title" type="text" placeholder="Example: Microscope" required value="<?php echo $cat->meta_title ?>">
                </div>
                <div class="form-group">
                  <label>Meta Keywords</label>
                  <input class="form-control" name="meta_keywords" type="text" placeholder="Words separated by comma" required value="<?php echo $cat->meta_keywords ?>">
                </div>
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea class="form-control" name="meta_desc" rows="8" cols="80" placeholder="Description for category"><?php echo $cat->meta_desc   ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta Image</label>
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="<?php echo (empty($cat->meta_img)) ? base_url('utilities/images/meta/no-image.png') : base_url('utilities/images/meta/'.$cat->meta_img)  ?>" style="width:100px">
                      </div>
                      <div class="media-body">
                        <span class="text-muted filename">No File Selected</span>
                        <br/>
                        <label class="btn btn-default" id="btn_browse">
                            <input type="file" name="meta_img" accept="image/*" style="display:none;">
                            Browse ..
                        </label>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<?php endforeach; ?>
<?php foreach ($subcategories as $subcat): ?>
  <div id="delete-subcategory-<?php echo $subcat->subcat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <?php echo form_open(base_url('admin/drop_subcategory')) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Sub Category </h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="subcat_id" value="<?php echo $subcat->subcat_id ?>">
                <input type="hidden" name="subcat_desc" value="<?php echo $subcat->subcat_desc ?>">
                Are you sure you want to delete <?php echo $cat->cat_desc ?>?
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <div id="modify-subcategory-<?php echo $subcat->subcat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <?php echo form_open(base_url('admin/modify_subcategory')) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modify Sub Category </h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="subcat_id" value="<?php echo $subcat->subcat_id ?>">
                <label for="category">Sub Category Name</label>
                <input class="form-control" type="text" name="subcat_desc" value="<?php echo $subcat->subcat_desc ?>" placeholder="Example: Stereo Zoom Microscope" required>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<?php endforeach; ?>
