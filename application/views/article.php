<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url('article'); ?>">Articles</a></li>
        <li class="breadcrumb-item active"><?php echo ucwords($title) ?></li>
    </ol>
    <div class="row pb-5">
        <div class="col-lg-3 col-md-3 mb-3 d-lg-block d-md-block d-none">
            <div class="card"> 
                <div class="card-header">
                    <label>Recent Articles</label>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled fw-light">
                        <?php foreach($articles as $a): ?>
                        <li>
                            <a class="<?php echo $article_id == $a->article_id ? 'active' : ''; ?>" href="<?php echo base_url('article?id='.$a->article_id) ?>"><?php echo ucwords($a->title) ?></a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="mt-3 mb-1"><?php echo $title ?></h4>
                            <h6><?php  echo $date ?></h6>
                            <br>
                            <img style="width:100%" src="<?php echo $img ?>" alt="">
                            <br/>
                            <br/>
                            <p><?php echo $description ?></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12"><?php echo $content ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>