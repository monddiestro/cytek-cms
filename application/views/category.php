<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
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
              <span>CATEGORIES</span>
            </div>
          </div>
          <div class="col-lg-8 ctg-function">
            <div class="row header-mt">
              <div class="col-md-8">
                <!-- <input type="text" class="form-control form-shadow" placeholder="Category name"> -->
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-category"><b>New Category</b></button>
              </div>
            </div>            
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="card ">
              <table class="table tbl-mobile mb-0">
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
                          <td class="pt-20"><?php echo $cat->cat_id ?></td>
                          <td class="pt-20 td-header"><?php echo $cat->cat_title ?></td>
                          <td class="btn-collapse">
                            <div class="row">
                              <div class="col-12">
                                <div class="card">
                                  <div class="card-header">
                                    <a class="d-flex collapse" data-toggle="collapse" href="#subCollapse<?php echo $cat->cat_id ?>">
                                      <div class="col-sm-11 p-0 fw-bold">
                                        Sub Category
                                      </div>
                                      <div class="col-sm-1 p-0 text-right">
                                        <span class="text-primary"><i class="fa fa-plus-circle"></i></span>
                                      </div>
                                    </a>
                                    <div class="collapse" id="subCollapse<?php echo $cat->cat_id ?>" style="margin-top:20px">
                                      <?php foreach ($subcategories as $subcat): ?>
                                        <?php if ($subcat->cat_id == $cat->cat_id): ?>
                                        <div class="row" style="padding:15px 0; border-top:1px solid #dee2e6;">
                                          <div class="col-9">
                                            <?php echo $subcat->subcat_title ?>
                                          </div>
                                          <div class="col-3">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                              <a class="text-success" data-toggle="modal" data-target="#modify-subcategory-<?php echo $subcat->subcat_id ?>">
                                                <i class="fa fa-edit mr-1"></i>
                                              </a>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="top" title="Delete">
                                              <a class="text-danger" data-toggle="modal" data-target="#delete-subcategory-<?php echo $subcat->subcat_id ?>">
                                                <i class="fa fa-trash"></i>
                                              </a>
                                            </span>
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- <div class="border">
                              <a class="btn btn-link w-100" data-toggle="collapse" data-target="#subCollapse<?php echo $cat->cat_id ?>" aria-expanded="false" aria-controls="subCollapse">
                                <div class="col-sm-9 p-0">Sub Categories</div>
                                <div class="col-sm-3 p-0 text-right text-primary">
                                  <span class="text-primary">
                                    <i class="fa fa-plus-circle"></i>
                                  </span>
                                </div> 
                              </a>
                              <div id="subCollapse<?php echo $cat->cat_id ?>" class="collapse" aria-labelledby="headingOne">
                                <div class="">
                                  <table class="table tbl-collapse mb-0">
                                    <?php foreach ($subcategories as $subcat): ?>
                                      <?php if ($subcat->cat_id == $cat->cat_id): ?>
                                        <tr>
                                          <td class="subcat-title">
                                            <?php echo $subcat->subcat_title ?>
                                          </td>
                                          <td class="icon-btn" width="10">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit">
                                              <a class="text-success" data-toggle="modal" data-target="#modify-subcategory-<?php echo $subcat->subcat_id ?>">
                                                <i class="fa fa-edit"></i>
                                              </a>
                                            </span>
                                          </td>
                                          <td class="icon-btn" width="10">
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
                            </div>                             -->
                          </td>
                          <td class="text-center">
                            <span data-toggle="tooltip" data-placement="top" title="Edit Category">
                              <a class="text-success mr-3" data-toggle="modal" data-target="#modify-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-edit"></span>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="New Sub Category">
                              <a class="text-primary mr-3" data-toggle="modal" data-target="#new-sub-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-plus"></span>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="Delete Category">
                              <a class="text-danger mr-3" data-toggle="modal" data-target="#delete-category-<?php echo $cat->cat_id ?>">
                                <span class="fa fa-trash"></span>
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


<!-- new category modal -->
<div id="new-category" class="modal fade" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/new_category')) ?>
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">Category Details</span>        
      </div>
      <div class="modal-body py-0">
        <div class="row">
            <div class="col-sm-12">
              <div class="">
                  <div class="img-container mb-2">
                    <img class="media-object" src="" alt="">
                  </div>
                  <label class="btn btn-default shadow" id="btn_browse">
                      <input type="file" name="meta_img" accept="image/*" style="display:none;">
                      BROWSE
                  </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>
              </div>
              <div class="form-group">
                <span class="form-label">Category Name</span>
                <input class="form-control" name="category_name" type="text" placeholder="Example: Microscope" required>
              </div>  
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <span class="form-label">Category Description</span>
              <textarea class="form-control" name="meta_desc" rows="8" cols="80" placeholder="Example: Industrial Microscope"></textarea>
            </div> 
            <!-- <div class="form-group">
              <h6>Meta Title</h6>
              <input class="form-control" name="meta_title" type="text" placeholder="Example: Microscope" required>
            </div> -->
            <div class="form-group">
              <span class="form-label">Category Keywords</span>
              <input class="form-control" name="meta_keywords" type="text" placeholder="Example: Words separated by comma" required>
            </div>                       
          </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="submit" class="btn btn-link text-dark">Save</button>
        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel</button>        
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
        <div class="modal-header border-0">          
          <span class="modal-title">Sub Category of <?php echo $cat->cat_title ?></span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                <span class="form-label">Sub Category Name</span>
                  <input class="form-control" type="text" name="subcategory" placeholder="Example: Stereo Zoom Microscope" required>
                  <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id; ?>">
                  <input type="hidden" name="cat_title" value="<?php echo $cat->cat_title; ?>">
              </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-link">Save</button>  
          <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>                  
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
        <div class="modal-header border-0">          
          <span class="modal-title">Delete Category </span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id ?>">
                <input type="hidden" name="cat_title" value="<?php echo $cat->cat_title ?>">
                <span class="form-label">Are you sure you want to delete <?php echo $cat->cat_title ?> and it's subcategories?</span>
              </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-link">Yes</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <div id="modify-category-<?php echo $cat->cat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog cytek-modal">
      <!-- Modal content-->
      <?php echo form_open_multipart(base_url('admin/modify_category')) ?>
      <div class="modal-content">
        <div class="modal-header border-0">          
          <span class="modal-title">Modify Category</span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id ?>">
                <div class="">
                  <span class="form-label">Image</span>
                  <div class="img-container mb-2">
                    <img class="media-object" src="<?php echo (empty($cat->img)) ? base_url('utilities/images/no-image.png') : base_url($cat->img)  ?>">
                  </div> 
                    <label class="btn btn-default shadow" id="btn_browse">
                      <input type="file" name="meta_img" accept="image/*" style="display:none;">
                      BROWSE
                    </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>                     
                </div>
                <div class="form-group">
                  <span class="form-label">Category Name</span>
                  <input class="form-control" name="cat_title" type="text" placeholder="Example: Microscope" value="<?php echo $cat->cat_title ?>" required>
                </div>
                <div class="form-group">
                  <span class="form-label">Keywords</span>
                  <input class="form-control" name="keyword" type="text" placeholder="Words separated by comma" required value="<?php echo $cat->keyword ?>">
                </div>
                <div class="form-group">
                  <span class="form-label">Description</span>
                  <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description for category"><?php echo $cat->description  ?></textarea>
                </div>                
              </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-link">Save</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>         
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
        <div class="modal-header border-0">          
          <span class="modal-title">Delete Sub Category </span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="subcat_id" value="<?php echo $subcat->subcat_id ?>">
                <input type="hidden" name="subcat_title" value="<?php echo $subcat->subcat_title ?>">
                <span class="form-label">Are you sure you want to delete <?php echo $subcat->subcat_title ?>?</span>
              </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-link">Yes</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <!-- modify -->
  <div id="modify-subcategory-<?php echo $subcat->subcat_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog cytek-modal">
      <!-- Modal content-->
      <?php echo form_open_multipart(base_url('admin/modify_subcategory')) ?>
      <div class="modal-content">
        <div class="modal-header border-0">          
          <span class="modal-title">Modify Sub Category </span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                  <input type="hidden" name="subcat_id" value="<?php echo $subcat->subcat_id ?>">
                  <div class="">
                    <span class="form-label">Image</span>
                    <div class="img-container mb-2">
                      <img class="media-object" src="<?php echo empty($subcat->img) ? base_url('utilities/images/no-image.png') : base_url($subcat->img) ; ?>">
                    </div> 
                      <label class="btn btn-default shadow" id="btn_browse">
                        <input type="file" name="meta_img" accept="image/*" style="display:none;">
                        BROWSE
                      </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>                     
                  </div>
                  <div class="form-group">
                    <span class="form-label">Category Name</span>
                    <select name="cat_id" id="" class="selectpicker form-control" required>
                      <?php foreach($categories as $c): ?>
                      <option value="<?php echo $c->cat_id ?>" <?php $c->cat_id == $subcat->cat_id ? 'active' :''; ?>><?php echo $c->cat_title ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <span class="form-label">Sub Category Name</span>
                    <input class="form-control" type="text" name="subcat_title" value="<?php echo $subcat->subcat_title ?>" placeholder="Example: Stereo Zoom Microscope" required>
                  </div>
                  <div class="form-group">
                    <span class="form-label">Keywords</span>
                    <input class="form-control" name="keyword" type="text" placeholder="Words separated by comma" required value="<?php echo $subcat->keyword ?>">
                  </div>
                  <div class="form-group">
                    <span class="form-label">Description</span>
                    <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description for category"><?php echo $subcat->description  ?></textarea>
                  </div> 
              </div>
          </div>
        </div>
        <div class="modal-footer">          
          <button type="submit" class="btn btn-link">Save</button>
          <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>          
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
<?php endforeach; ?>
