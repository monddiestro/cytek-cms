<div class="container-fluid pt-4">
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product'); ?>">Products</a></li>
        <li class="breadcrumb-item active"><?php echo $cat_title ?></li>
    </ol>
    <div class="row">
        <!-- sub menu -->
        <?php $cat_id = "" ?>
        <?php $cnt = 0 ?>
        <div class="col-lg-3 col-md-3">
            <div class="panel-group" id="accordion">
            <?php foreach($submenu as $s): ?>
                <?php if($cat_id != $s->cat_id): ?>
                    <?php if($cnt != 0): //closing tag ?>
                        </ul>
                        </div>
                        </div>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                    <div class="card-header">
                    <span class="card-title">
                        <strong>
                            <a data-toggle="collapse" id="test" data-parent="#accordion" class="d-flex <?php ($s->cat_id == $selected) ? '' : 'collapsed'; ?>" href="#collapse<?php echo $s->cat_id ?>">
                            <div class="col-sm-9 p-0"><?php echo $s->cat_title; ?></div><div class="col-sm-3 p-0 text-right text-primary"><i class="fa fa-plus-circle"></i></div> 
                            </a>
                        </strong>
                    </h4>
                    </div>
                    <div id="collapse<?php echo $s->cat_id ?>" class="panel-collapse collapse <?php echo ($s->cat_id == $selected) ? 'show' : '' ?>">
                    <div class="card-body">
                    <ul class="list-unstyled fw-light">
                    <li>
                        <a href="<?php echo base_url('product/category/subcategory?id='.$s->subcat_id) ?>"><?php echo $s->subcat_title ?></a>
                    </li>
                    <?php $cat_id = $s->cat_id; $cnt+=1; continue; ?>
                <?php else: ?>
                    <li>
                        <a href="<?php echo base_url('product/category/subcategory?id='.$s->subcat_id) ?>"><?php echo $s->subcat_title ?></a>
                    </li>
                <?php endif; ?>  
            <?php endforeach; ?>
            </ul>
            </div>
            </div>
            </div>
            <!-- accordion close -->
            </div>
        </div>
        <!-- content -->
        <div class="col-lg-9 col-md-9 col-sm-12">    
            <div class="row">
                <div class="col-lg-12">
                    <h4><?php echo $cat_title ?></h4>
                    <p><?php echo $description ?></p>
                </div>
            </div>
            <!-- content -->
            <main class="row">
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
                                <h5><strong><?php echo $d->subcat_title ?></strong></h5>
                                <p><?php echo mb_strimwidth($d->description, 0, 100, " ...") ?></p>
                            </div>                            
                        </figure>
                        <div class="card-footer">
                            <a href="<?php echo base_url('product/category/subcategory?id='.$d->subcat_id) ?>" class="btn btn-primary text-white fw-bold">VIEW ALL</a>
                        </div>
                    </figure>
                </article>
                <?php endforeach; ?>
            </main>
        </div>
    </div>
</div>