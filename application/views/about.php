<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active">About Us</li>
    </ol>
    <div class="row mb-4">
        <div class="col-lg-9 col-md-8">
            <?php foreach($company as $c): ?>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <?php echo $c->description ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if(!empty($careers)): ?>
            <div class="row mb-4">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <h5>JOB OPENINGS</h5>
                        <div class="panel-group" id="accordion">
                            <?php foreach($careers as $c): ?>
                            <div class="card">
                                <div class="card-header">
                                    <span class="card-title">
                                        <strong>
                                            <a data-toggle="collapse" data-parent="#accordion" class="d-flex collapsed" href="#collapse<?php echo $c->career_id ?>" aria-expanded="false">
                                            <div class="col-sm-9 p-0"><?php echo $c->title ?></div><div class="col-sm-3 p-0 text-right text-primary"><i class="fa fa-plus-circle"></i></div> 
                                            </a>
                                        </strong>
                                    </span>
                                </div>
                                <div id="collapse<?php echo $c->career_id ?>" class="panel-collapse collapse" style="">
                                    <div class="card-body">
                                        <?php echo $description ?>
                                        <br/>
                                        <small>Date Posted: <?php echo date('F d, Y') ?></small>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- accordion close -->
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php foreach($company as $c): ?>
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
        <?php endforeach; ?>
    </div>
</div>