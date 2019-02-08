<div class="login-bg">
    <div class="container" style="margin-top:10%;">
        <div class="offset-lg-4 col-sm-4">            
            <div class="card shadow">
                <div class="card-header shadow-none">
                   <img src="<?php echo base_url('utilities/images/nav-logo/cytek-blue-logo.png') ?>" alt="">
                </div>
                <?php if(!empty($this->session->flashdata('message'))): ?>
                <div class="alert alert-<?php echo $this->session->flashdata('class') ?>">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php endif; ?>
                <?php echo form_open('admin/check_account') ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" />
                        <a href="" style="float:right;"> <span class="pt-1 small text-muted">Forgot Password?</span> </a>
                    </div>
                </div>
                <div class="card-footer text-center border-0">
                    <button class="btn btn-primary shadow w-100" type="submit"><b>Log in</b></button>
                    <p class="mt-3">Don't Have an account ? <a href="" class="text-primary"><b>Sign up</b></a></p>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
    <footer></footer>
</div>