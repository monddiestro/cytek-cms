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
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#new-category"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category</button>
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
                        <th>Sub Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cat 1</td>
                        <td>Sub Cat 2</td>
                        <td>
                            <span data-toggle="tooltip" data-placement="top" title="New">
                              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#new-sub-category">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Sub Category
                              </a>
                            </span>
                            <span class="glyphicon glyphicon-trash"></span>
                        </td>
                    </tr>
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
<div id="new-sub-category" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sub Category of Microscope</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <label for="category">Sub Category Name</label>
                <input class="form-control" type="text" placeholder="Example: Microscope" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
