<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url('events'); ?>">Events</a></li>
        <li class="breadcrumb-item active"><?php echo ucwords($title) ?></li>
    </ol>
    <div class="row">
        <div classs="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <img style="width:100%" src="<?php echo $img ?>" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h5><?php echo $title ?></h5>
                            <p><?php echo $description ?></p>
                            <small><?php  echo $date ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div classs="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <p><?php echo $content ?></p>
                </div>
            </div>
        </div>
    </div>
</div>