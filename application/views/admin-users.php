<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container px-5 pt-5">
      <div class="row">
          <div class="col-lg-4">
            <div class="header-text header-mt">
              <span>USERS</span>
            </div>
          </div>
          <div class="col-lg-8 ctg-function">
            <div class="row header-mt">
              <div class="col-md-8">
                <input type="text" class="form-control form-shadow" placeholder="User name">
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-user"><b>New User</b></button>
              </div>
            </div>            
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            <div class="card ">
              <table class="table tbl-mobile mb-0 ">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th></th>
                      </tr>
                  </thead>
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
                              <a data-toggle="modal" data-target="#edit-user-<?php echo $u->user_id ?>" class="text-success mr-3" style="text-decoration:none;">
                                <span> <i class="fa fa-edit"></i></span>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                              <a data-toggle="modal" data-target="#drop-user-<?php echo $u->user_id ?>" class="text-danger">
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

<!-- new user modal -->
<div id="new-user" class="modal fade" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open_multipart('admin/new_user'); ?>
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">New User</span>        
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
                <span class="form-label">Name</span>
                <div class="row">
                  <div class="col-sm-6">
                    <input class="form-control" name="f_name" type="text" placeholder="Example: Juan" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="l_name" placeholder="Example: Dela Cruz" class="form-control" required>
                  </div>
                </div>
              </div> 
              <div class="form-group">
                <span class="form-label">Email Address</span>
                <input class="form-control" name="email" type="text" placeholder="Example: juandelacruz@gmail.com" required>
              </div>  
              <div class="form-group">
                <span class="form-label">Contact Number</span>
                <input class="form-control" name="contact" type="text" placeholder="Example: 09091234567" required>
              </div>
              <div class="form-group">
                <span class="form-label">Generated Password</span>
                <?php
                  $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
                ?>
                <br/>
                <small class="text-info">Copy before save user account</small>
                <input class="form-control" type="text" name="password" value="<?php echo $randomString ?>" readonly>
                <small>Account owner can change the password upon login</small>
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