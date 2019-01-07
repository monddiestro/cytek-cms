<div class="container" style="margin-top:15%;">
    <div class="col-sm-offset-4 col-sm-4">
        <?php if(!empty($this->session->flashdata('message'))): ?>
        <div class="alert alert-<?php echo $this->session->flashdata('class') ?>">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php endif; ?>
        <?php echo form_open('admin/check_account') ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Login
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password"/>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>