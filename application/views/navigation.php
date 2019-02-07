

<nav class="navbar navbar-expand-lg  text-light">
  <a class="navbar-brand ml-5" href="#">
    <img src="utilities/images/nav-logo/cytek-100.png" alt=""> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-2">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="sr-only">(current)</span></a>
          <ul class="dropdown-menu">
          <?php $cat_id = "" ?>
          <?php $cnt = 0; ?>
          <?php foreach ($navs as $nav): ?>
            <?php if ($cat_id != $nav->cat_id): ?>
              <?php echo ($cnt != 0) ? '<li class="dropdown-divider"></li>' : '' ?>
              <li class="dropdown-header"><strong><a href="<?php echo base_url('products?c='.$nav->cat_id.'&category='.$nav->cat_desc) ?> " class="dropdown-item"><?php echo $nav->cat_desc ?></a></strong></li>
              <li class="dropdown-divider"></li>
              <?php $cat_id = $nav->cat_id ?>
              <?php $cnt += 1; ?>
            <?php endif; ?>
            <li class="dropdown-list"><a href="<?php echo base_url('products?s='.$nav->subcat_id."&subcategory=".$nav->subcat_desc) ?>" class="dropdown-item"><?php echo $nav->subcat_desc ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#" class="">BLOGS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="">EVENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="">ABOUT US</a>
      </li>      
    </ul>
    <div class="mr-5">
      <img src="utilities/images/nav-logo/cytek-100.png" alt="">
    </div>
  </div>
</nav>