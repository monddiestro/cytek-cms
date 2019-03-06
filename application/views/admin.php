<main class="cytek-main">
    <div class="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container px-5 admin-page">
                <div class="header-text header-mt">
                    <span >Welcome, <b><?php echo $this->session->userdata('f_name'); ?>!</b>
                    <span> Today is <?php echo date('F Y') ?>.</span>
                </div>
                <div class="row pb-4">
                    <div class="col-lg-12 ">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <?php echo ($inquiry_cnt != 0) ? 'You have <b>'.$inquiry_cnt.' new inquiries </b>as of '.date('F').'.' : "You don't have inquiries as of ".date('F')?> 
                            </div>
                            <div class="card-body p-0">
                                <?php if(!empty($inquiry)): ?>
                                <table class="table tbl-mobile mb-0 fw-light">
                                    <tbody>
                                        <?php foreach($inquiry as $i): ?>
                                        <tr>
                                            <td class="td-header"><div class="col-11"><?php echo $i->name ?></div><div class="col-1 mb-icon"><span><i class="fa fa-chevron-down"></i></span></div></td>
                                            <td><?php echo $i->email ?></td>
                                            <td><?php echo $i->contact ?></td>
                                            <td><?php echo date('F d, Y',strtotime($i->date_created)) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif ?>
                            </div>
                            <div class="card-footer text-center border-0">
                                <a href="<?php echo base_url('admin/leads') ?>"><b>View All</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-3 col-md-6 pb-4">
                        <div class="card text-center shadow">
                            <div class="card-header">
                                <span>Total Categories</span>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $category ?></h3>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('admin/category') ?>">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  pb-4">
                        <div class="card text-center shadow">
                            <div class="card-header">
                                <span>Total Sub Categories</span>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $subcategory ?></h3>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('admin/category') ?>">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  pb-4">
                        <div class="card text-center shadow">
                            <div class="card-header">
                                <span>Total Products</span>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $product ?></h3>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('admin/products') ?>">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  pb-4">
                        <div class="card text-center shadow">
                            <div class="card-header">
                                <span>Total Events</span>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $event ?></h3>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('admin/events') ?>">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-lg-12 ">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                Users currently enrolled
                            </div>
                            <div class="card-body p-0">
                                <table class="table tbl-mobile mb-0 fw-light">
                                    <tbody>
                                    <?php foreach($users as $u): ?>
                                    <tr>
                                        <td data-title="Name" class="td-header">
                                        <img src="<?php echo empty($u->img) ? base_url('utilities/images/no-image.png') : base_url($u->img) ?>" class="rounded-circle mr-2" alt="" width="40" height="40"> 
                                        <?php echo $u->f_name . " " . $u->l_name  ?>
                                        </td>
                                        <td data-title="Email" ><?php echo $u->email ?></td>
                                        <td data-title="Contact" >09091234567</td>
                                        <td>
                                        <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <a data-toggle="modal" data-target="#modify-user-<?php echo $u->user_id ?>" class="text-success mr-3" style="text-decoration:none;">
                                                <span> <i class="fa fa-edit"></i></span>
                                            </a>
                                            </span>
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <a data-toggle="modal" data-target="#delete-user-<?php echo $u->user_id ?>" class="text-danger">
                                                <span> <i class="fa fa-trash"></i></span>
                                            </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer border-0 text-center">
                                <a href="<?php echo base_url('admin/users') ?>"><b>View More</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</main>    
<?php foreach($users as $u): ?>
<!-- delete user -->
<div id="delete-user-<?php echo $u->user_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <?php echo form_open(base_url('admin/drop_user')) ?>
    <div class="modal-content">
        <div class="modal-header border-0">          
          <span class="modal-title">Delete User</span>
        </div>
        <div class="modal-body py-0">
          <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="user_id" value="<?php echo $u->user_id ?>">
                <input type="hidden" name="name" value="<?php echo $u->f_name . " " . $u->l_name ?>">
                <span class="form-label">Are you sure you want to remove user <?php echo $u->f_name . " " . $u->l_name ?>?</span>
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
<!-- modify user modal -->
<div id="modify-user-<?php echo $u->user_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open_multipart('admin/update_user'); ?>
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">New User</span>        
      </div>
      <div class="modal-body py-0">
        <div class="row">
            <div class="col-sm-12">
              <input type="hidden" value="<?php echo $u->user_id ?>" name="user_id"/>
              <div class="">
                  <div class="img-container mb-2">
                    <img class="media-object" src="<?php echo empty($u->img) ? base_url('utilities/images/no-image.png') : base_url($u->img) ?>" alt="">
                  </div>
                  <label class="btn btn-default shadow" id="btn_browse">
                      <input type="file" name="meta_img" accept="image/*" style="display:none;">
                      BROWSE
                  </label>&nbsp;&nbsp;<span class="text-muted filename small">No image selected</span>
              </div>
              <div class="form-group">
                <span class="form-label">Name</span>
                <div class="row">
                  <div class="col-sm-6">
                    <input class="form-control" value="<?php echo $u->f_name ?>" name="f_name" type="text" placeholder="Example: Juan" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="l_name" value="<?php echo $u->l_name ?>" placeholder="Example: Dela Cruz" class="form-control" required>
                  </div>
                </div>
              </div> 
              <div class="form-group">
                <span class="form-label">Email Address</span>
                <input class="form-control" name="email" value="<?php echo $u->email ?>" type="text" placeholder="Example: juandelacruz@gmail.com" required>
              </div>  
              <div class="form-group">
                <span class="form-label">Contact Number</span>
                <input class="form-control" name="contact" value="<?php echo $u->contact ?>" type="text" placeholder="Example: 09091234567" required>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer border-0">
         <button type="submit" class="btn btn-link text-dark">Update</button> 
        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel</button>               
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php endforeach; ?>
    