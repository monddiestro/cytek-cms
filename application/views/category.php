<div class="container-fluid">
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
        <div class="col-sm-12">
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-category"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Category</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
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
                        <td style="min-width:250px;">
                          <div class="panel-group">
                            <div class="panel panel-default">
                              <div class="panel-heading" data-toggle="collapse" href="#collapse<?php echo $cat->cat_id ?>">
                                <span data-toggle="tooltip" data-placement="top" title="Click to View">
                                  <h4 class="panel-title">
                                    Sub Category
                                  </h4>
                                </span>
                              </div>
                              <div id="collapse<?php echo $cat->cat_id ?>" class="panel-collapse collapse">
                                <table class="table table-hover">
                                <?php foreach ($subcategories as $subcat): ?>
                                  <?php if ($subcat->cat_id == $cat->cat_id): ?>
                                    <tr>
                                      <td>
                                        <?php echo $subcat->subcat_desc ?>
                                      </td>
                                      <td width="10">
                                        <span data-toggle="tooltip" data-placement="top" title="Edit">
                                          <a class="text-success" data-toggle="modal" data-target="#modify-subcategory-<?php echo $subcat->subcat_id ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                          </a>
                                        </span>
                                      </td>
                                      <td width="10">
                                        <span data-toggle="tooltip" data-placement="top" title="Delete">
                                          <a class="text-danger" data-toggle="modal" data-target="#delete-subcategory-<?php echo $subcat->subcat_id ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
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
                        <td>
                          <span data-toggle="tooltip" data-placement="top" title="Edit Category">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modify-category-<?php echo $cat->cat_id ?>">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                          </span>
                          <span data-toggle="tooltip" data-placement="top" title="New Sub Category">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-sub-category-<?php echo $cat->cat_id ?>">
                              <span class="glyphicon glyphicon-plus"></span>
                            </button>
                          </span>
                          <span data-toggle="tooltip" data-placement="top" title="Delete Category">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-category-<?php echo $cat->cat_id ?>">
                              <span class="glyphicon glyphicon-trash"></span>
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

<!-- new category modal -->
<div id="new-category" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <?php echo form_open(base_url('admin/new_category')) ?>
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
    <div class="modal-dialog modal-sm">
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
                <label for="category">Category Name</label>
                <input class="form-control" name="cat_desc" type="text" placeholder="Example: Microscope" value="<?php echo $cat->cat_desc ?>" required>
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
