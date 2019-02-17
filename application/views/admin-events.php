<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container px-5 pt-5">
      <div class="row">
          <div class="col-lg-4">
            <div class="header-text header-mt">
              <span>EVENTS</span>
            </div>
          </div>
          <div class="col-lg-8 ctg-function">
            <div class="row header-mt">
              <div class="col-md-8">
                <input type="text" class="form-control form-shadow" placeholder="Events name">
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-event"><b>New Event</b></button>
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
                          <th>ID</th>
                          <th>Event</th>
                          <th>Description</th>
                          <th>Date</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td class="td-header">1</td>
                        <td>Bacon ipsum dolor amet biltong</td>
                        <td>Boudin venison cupim t-bone tri-tip. Short loin </td>
                        <td>02/14/2018</td>
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

<!-- new event modal -->
<div id="new-event" class="modal fade" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/new_event')); ?>
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">New Event</span>        
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
                <span class="form-label">Title</span>
                <input class="form-control" name="title" type="text" placeholder="Example: Ribbon Cutting" required>
              </div>  
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <span class="form-label">Description</span>
              <textarea class="form-control" name="description" rows="5" placeholder="Place event short description here .."></textarea>
            </div>                       
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <span class="form-label">Content</span>
              <textarea class="form-control" name="content" rows="5" placeholder="Place event content here this input also accept HTML format ..."></textarea>
            </div>                       
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <span class="form-label">Date</span>
            <input type="text" value="" autocomplete="off" name="date" class="form-control" placeholder="MM/DD/YY" id="date">
          </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-link text-dark">Save</button>        
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
