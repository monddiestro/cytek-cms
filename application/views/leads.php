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
<main class="cytek-main">
  <div class="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container px-5 pt-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="header-text header-mt">
                    <span>LEADS</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;display:<?php echo $display ?>">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>
                        <?php echo $message ?>
                    </div>
                    <div class="card shadow">
                        <table class="table tbl-mobile mb-0">
                            <thead>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Source</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php foreach($leads as $l): ?>
                                <tr class="<?php echo $l->status == '1' ? 'text-primary' : '' ?>">
                                    <td data-title="Name" class="td-header"><?php echo $l->name ?></td>
                                    <td data-title="Contact"><?php echo $l->contact ?></td>
                                    <td data-title="Email"><?php echo $l->email ?></td>
                                    <td data-title="Source"><?php echo $l->source ?></td>
                                    <td>
                                        <span data-toggle="tooltip" data-placement="top" title="Click to view">
                                            <a href="<?php echo base_url('admin/leads?id='.$l->lead_id) ?>"  class="text-info mr-3" style="text-decoration:none;">
                                                <span><i class="fas fa-info-circle"></i></i></span>
                                            </a>
                                        </span>
                                        <span data-toggle="tooltip" data-placement="top" title="Delete">
                                            <a data-toggle="modal" data-target="#drop-lead-<?php echo $l->lead_id ?>" class="text-danger">
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
<!-- drop modal -->
<?php foreach($leads as $l): ?>
<div id="drop-lead-<?php echo $l->lead_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <span class="form-label">Are you sure to delete you want to delete <?php echo $l->name; ?>?</span>
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('admin/drop_lead?id='.$l->lead_id) ?>" class="btn btn-default">Yes</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
</div>
<?php endforeach; ?>