<div class="container-fluid pt-4">
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product'); ?>">Products</a></li>
        <li class="breadcrumb-item mb-active"><a href="<?php echo base_url('product/category?id='.$selected); ?>"><?php echo ucwords($category) ?></a></li>
        <li class="breadcrumb-item active"><?php echo $subcat_title ?></li>
    </ol>
    <div class="row">
        <!-- sub menu -->
        <div class="col-lg-3 col-md-3 d-none d-lg-block d-mb-block">
            <div class="card">
                <div class="card-header">
                    <span class="card-title"><strong><?php echo $subcat_title ?></strong></span>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled fw-light">
                        <?php foreach($data as $p): ?>
                        <li>
                            <a href="<?php echo base_url('product/category/subcategory/item?id='.$p->prod_id) ?>"><?php echo $p->prod_title ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- content -->
        <div class="col-lg-9 col-md-9">    
            <div class="row">
                <div class="col-lg-12">
                    <h4><?php echo $subcat_title ?></h4>
                    <p><?php echo $description ?></p>
                </div>
            </div>
            <!-- content -->
            <main class="row mt-3">
                <?php foreach($data as $d): ?>
                <article class="col-sm-4 mb-4">
                    <figure class="card">
                        <figure class="card-header p-0">
                            <div class="img-box">
                                <img src="<?php echo empty($d->img) ? base_url('utilities/images/no-image.png') : base_url($d->img) ?>" alt="" class="product-img">
                            </div>                        
                        </figure>
                        <figure class="card-body">
                            <div class="img-desc">
                                <h5><strong><?php echo $d->prod_title ?></strong></h5>
                                <p><?php echo mb_strimwidth($d->description, 0, 160, " ...") ?></p>
                            </div>                            
                        </figure>
                        <div class="card-footer">
                            <a href="<?php echo base_url('product/category/subcategory/item?id='.$d->prod_id) ?>" class="btn btn-primary text-white fw-bold">VIEW</a>
                        </div>
                    </figure>
                </article>
                <?php endforeach; ?>
            </main>
        </div>
    </div>
</div>