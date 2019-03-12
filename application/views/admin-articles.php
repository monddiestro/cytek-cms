<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container px-5 pt-5">
      <div class="row">
          <div class="col-lg-4">
            <div class="header-text header-mt">
              <span>Articles</span>
            </div>
          </div>
          <div class="col-lg-8 ctg-function">
            <div class="row header-mt">
              <div class="col-md-8">
                <!-- <input type="text" class="form-control form-shadow" placeholder="Events name"> -->
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#new-article"><b>New Article</b></button>
              </div>
            </div>            
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
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
            <div class="card ">
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
                      <?php foreach($articles as $a): ?>
                        <tr>
                          <td class="td-header"><div class="col-11"><?php echo ucwords($a->title) ?></div><div class="col-1 mb-icon"><span><i class="fa fa-chevron-down"></i></span></div></td>
                          <td><?php echo ucfirst($a->description) ?></td>
                          <td><?php echo date('F d, Y',strtotime($a->date_created)) ?></td>
                          <td>
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                              <a href="<?php echo base_url('admin/config_article?id='.$a->article_id) ?>" class="text-success mr-3" style="text-decoration:none;">
                                <span> <i class="fa fa-edit"></i></span>
                              </a>
                            </span>
                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                              <a data-toggle="modal" data-target="#drop-event-<?php echo $a->article_id ?>" class="text-danger">
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
<!-- new article modal -->
<div id="new-article" class="modal fade" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open_multipart(base_url('admin/new_article')); ?>
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
                <input class="form-control" name="title" type="text" placeholder="Example: New product released" required>
              </div>  
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <span class="form-label">Description</span>
              <textarea class="form-control" name="description" rows="8" placeholder="Place event short description here .." required></textarea>
            </div>                       
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <span class="form-label">Content</span>
              <textarea class="form-control" name="content" rows="10" placeholder="Place event content here this input also accept HTML format ..."></textarea>
            </div>                       
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
<?php foreach($articles as $a): ?>
<div id="drop-event-<?php echo $a->article_id ?>" class="modal fade mt-10" role="dialog">
  <div class="modal-dialog cytek-modal">
    <!-- Modal content-->
    <?php echo form_open(base_url('admin/drop_article')); ?>
    <input type="hidden" name="article_id" value="<?php echo $a->article_id ?>">
    <div class="modal-content">
      <div class="modal-header border-0">        
        <span class="modal-title">Delete Event</span>        
      </div>
      <div class="modal-body py-0">
        Are you sure to delete <strong><?php echo ucwords($a->title) ?></strong> article? All related data to this event will be deleted.
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-link text-dark">Yes</button>        
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
<?php endforeach; ?>