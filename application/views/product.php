<div class="container-fluid">
    <div class="row">
        <!-- sub menu -->
        <?php $cat_id = "" ?>
        <?php $cnt = 0 ?>
        <div class="col-lg-3 col-md-3">
            <h3>Products</h3>
            <div class="panel-group" id="accordion">
            <?php foreach($submenu as $s): ?>
                <?php if($cat_id != $s->cat_id): ?>
                    <?php if($cnt != 0): //closing tag ?>
                        </ul>
                        </div>
                        </div>
                        </div>
                    <?php endif; ?>
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $s->cat_id ?>">
                    <?php echo $s->cat_desc; ?>
                    </a>
                    </h4>
                    </div>
                    <div id="collapse<?php echo $s->cat_id ?>" class="panel-collapse collapse <?php echo ($s->cat_id == $selected_category) ? 'in' : '' ?>">
                    <div class="panel-body">
                    <ul>
                    <li><?php echo $s->subcat_desc ?></li>
                    <?php $cat_id = $s->cat_id; $cnt+=1; continue; ?>
                <?php else: ?>
                    <li><?php echo $s->subcat_desc ?></li>
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
            <!-- breadcrumb -->
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <?php echo (!empty($category_desc)) ? '<li class="active">'.$category_desc.'</li>' : '' ?>
                    </ol>
                </div>
            </div>
            <!-- content -->
            <main class="row">
                <?php ?>
                <article class="col-sm-4">
                    <figure class="panel panel-default">
                        <figure class="panel-body">
                            <img src="<?php echo base_url('utilities/images/meta/no-image.png')?>" alt="">
                            <figcaption>Lorem Ipsum</figcaption>
                            <p>Lorem Ipsum</p>
                        </figure>
                        <div class="panel-footer">
                            <a href="" class="btn btn-primary">Read More</a>
                        </div>
                    </figure>
                </article>
            </main>
        </div>
    </div>
</div>