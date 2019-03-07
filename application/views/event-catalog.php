<div class="container-fluid pt-4">
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active">Events</li>
    </ol>
    <div class="row">
        <div class="col-lg-3 col-md-3 mb-3 d-lg-block d-md-block d-none">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled fw-light">
                        <?php foreach($events as $e): ?>
                        <li>
                            <a href="<?php echo base_url('events?id='.$e->event_id) ?>"><?php echo ucwords($e->title) ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row">
                <div class="col-lg-12">
                    <h4>News and Events</h4>
                    <p><?php echo $page_description ?></p>
                </div>
            </div>
            <div class="row mt-3">
                <?php foreach($events as $e): ?>
                <article class="col-sm-4 mb-4">
                    <figure class="card">
                        <figure class="card-header p-0">
                            <div class="img-box">
                                <img src="<?php echo empty($e->img) ? base_url('utilities/images/no-image.png') : base_url($e->img) ?>" alt="" class="product-img">
                            </div>                        
                        </figure>
                        <figure class="card-body">
                            <div class="img-desc">
                                <h5><strong><?php echo $e->title ?></strong></h5>
                                <small><?php echo date("F d, Y",strtotime($e->event_date)) ?></small>
                                <p><?php echo mb_strimwidth($e->description, 0, 160, " ...") ?></p>
                            </div>                            
                        </figure>
                        <div class="card-footer">
                            <a href="<?php echo base_url('events?id='.$e->event_id) ?>" class="btn btn-primary text-white fw-bold">VIEW ALL</a>
                        </div>
                    </figure>
                </article>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>