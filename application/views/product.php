<div class="container-fluid pt-4 mx-5">
<!-- breadcrumb -->
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb pl-0">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php echo (!empty($category_desc)) ? '<li class="active">'.$category_desc.'</li>' : '' ?>
            </ol>
        </div>
    </div>
    <div class="row">
        <!-- sub menu -->
        <?php $cat_id = "" ?>
        <?php $cnt = 0 ?>
        <div class="col-lg-3 col-md-3">
            <h4 class="mt-2 mb-4">Products</h4>
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
                    <a data-toggle="collapse" id="test" data-parent="#accordion" class="d-flex" href="#collapse<?php echo $s->cat_id ?>">
                    <div class="col-sm-9 p-0"><?php echo $s->cat_desc; ?></div><div class="col-sm-3 p-0 text-right text-primary"><i class="fa fa-plus-circle"></i></div> 
                    </a>
                    </h4>
                    </div>
                    <div id="collapse<?php echo $s->cat_id ?>" class="panel-collapse collapse <?php echo ($s->cat_id == $selected_category) ? 'in' : '' ?>">
                    <div class="card-body">
                    <ul class="list-unstyled fw-light">
                    <li>
                        <a href=""><?php echo $s->subcat_desc ?></a>
                    </li>
                    <?php $cat_id = $s->cat_id; $cnt+=1; continue; ?>
                <?php else: ?>
                    <li>
                        <a href=""><?php echo $s->subcat_desc ?></a>
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
            <!-- content -->
            <main class="row">
                <?php ?>
                <article class="col-sm-4 mb-4">
                    <figure class="card">
                        <figure class="card-header p-0">
                        <img src="<?php echo base_url('utilities/images/meta/test.jpg')?>" alt="" class="product-img">
                        </figure>
                        <figure class="card-body">
                            <figcaption>Lorem Ipsum</figcaption>
                            <p>Lorem Ipsum</p>
                        </figure>
                        <div class="card-footer">
                            <a href="" class="btn btn-primary text-white fw-bold">Read More</a>
                        </div>
                    </figure>
                </article>
            </main>
        </div>
    </div>
</div>