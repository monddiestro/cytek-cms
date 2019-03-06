<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active">About Us</li>
    </ol>
    <?php foreach($company as $c): ?>
    <div class="row mb-4">
        <div class="col-lg-9 col-md-8">
            <div class="card">
                <div class="card-body">
                    <?php echo $description ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card sticky-form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Contac Number</label>
                        <p><?php echo $c->contact ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <p><?php echo $c->email ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <p><?php echo $c->address?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Office Hours</label>
                        <p><?php echo $c->office_hours?></p>
                    </div>
                    <div class="form-group">
                        <label for="">Social Media</label>
                        <p>
                            <?php if(!empty($c->facebook)): ?>
                            <span>
                                <a class="text-body" href="<?php echo $c->facebook ?>"><i class="fab fa-facebook fa-2x"></i></a>
                            </span>
                            <?php endif ?>
                            <?php if(!empty($c->twitter)): ?>
                            <span>
                                <a class="text-body" href="<?php echo $c->twitter ?>"><i class="fab fa-twitter-square fa-2x"></i></a>
                            </span>
                            <?php endif ?>
                            <?php if(!empty($c->instagram)): ?>
                            <span><a class="text-body" href="<?php echo $c->instagram ?>"><i class="fab fa-instagram fa-2x"></i></a></span>
                            <?php endif ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>