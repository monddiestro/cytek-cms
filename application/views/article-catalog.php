<div class="container-fluid pt-4">
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active">Articles</li>
    </ol>
    <div class="row">
        <div class="col-lg-3 col-md-3 mb-3 d-lg-block d-md-block d-none">
            <div class="card">
                <div class="card-header">
                    <label>Recent Articles</label>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled fw-light">
                        <?php foreach($articles as $a): ?>
                        <li>
                            <a href="<?php echo base_url('article?id='.$a->article_id) ?>"><?php echo ucwords($a->title) ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Articles</h4>
                    <p><?php echo $page_description ?></p>
                </div>
            </div>
            <div class="row mt-3">
                <?php foreach($articles as $a): ?>
                <article class="col-sm-4 mb-4">
                    <figure class="card">
                        <figure class="card-header p-0">
                            <div class="img-box">
                                <img src="<?php echo empty($a->img) ? base_url('utilities/images/no-image.png') : base_url($a->img) ?>" alt="" class="product-img">
                            </div>                        
                        </figure>
                        <figure class="card-body">
                            <div class="img-desc">
                                <h5><strong><?php echo $a->title ?></strong></h5>
                                <small><?php echo date("F d, Y",strtotime($a->date_created)) ?></small>
                                <p><?php echo mb_strimwidth($a->description, 0, 160, " ...") ?></p>
                            </div>                            
                        </figure>
                        <div class="card-footer">
                            <a href="<?php echo base_url('article?id='.$a->article_id) ?>" class="btn btn-primary text-white fw-bold">READ MORE</a>
                        </div>
                    </figure>
                </article>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>