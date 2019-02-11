<div class="container-fluid pt-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product'); ?>">Products</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/category?id='.$cat_id); ?>"><?php echo ucwords($cat_title) ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('product/category/subcategory?id='.$subcat_id); ?>"><?php echo ucwords($subcat_title) ?></a></li>
        <li class="breadcrumb-item active"><?php echo ucwords($prod_title) ?></li>
    </ol>
    <div class="row">
        <!-- submenu -->
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-header">
                    <span class="card-title"><?php echo $subcat_title ?> Products</span>
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
    </div>
</div>