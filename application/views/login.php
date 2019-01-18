<div class="container" style="margin-top:10%;">
    <div class="offset-4 col-sm-4">
        <?php if(!empty($this->session->flashdata('message'))): ?>
        <div class="alert alert-<?php echo $this->session->flashdata('class') ?>">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php endif; ?>
        <?php echo form_open('admin/check_account') ?>
        <div class="card shadow">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <a href="" style="float:right;"> <span class="pt-1 small text-muted">Forgot Password?</span> </a>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password"/>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary shadow w-50" type="submit"><b>Log in</b></button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>