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
                      <tr>
                        <td data-title="Name" class="td-header">Juan Dela Cruz</td>
                        <td data-title="Email" >juandelacruz@gmail.com</td>
                        <td data-title="Contact" >09091234567</td>
                        <td></td>
                      </tr>
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
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">New User</span>        
      </div>
      <div class="modal-body py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                <span class="form-label">Name</span>
                <input class="form-control" name="name" type="text" placeholder="Example: Juan Dela Cruz" required>
              </div> 
              <div class="form-group">
                <span class="form-label">Email Address</span>
                <input class="form-control" name="name" type="text" placeholder="Example: juandelacruz@gmail.com" required>
              </div>  
              <div class="form-group">
                <span class="form-label">Contact Number</span>
                <input class="form-control" name="name" type="text" placeholder="Example: 09091234567" required>
              </div>  
            </div>
        </div>
      </div>
      <div class="modal-footer border-0">
         <button type="submit" class="btn btn-link text-dark">Save</button> 
        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel</button>               
      </div>
    </div>
  </div>
</div>