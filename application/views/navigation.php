

<nav class="navbar navbar-expand-lg bg-cytek text-light">
  <a class="navbar-brand" href="#">
    <!-- <img src="utilities/images/nav-logo/cytek-logo.png" alt=""> -->Cytek
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="sr-only">(current)</span></a>
          <ul class="dropdown-menu">
          <?php $cat_id = "" ?>
          <?php $cnt = 0; ?>
          <?php foreach ($navs as $nav): ?>
            <?php if ($cat_id != $nav->cat_id): ?>
              <?php echo ($cnt != 0) ? '<li class="divider"></li>' : '' ?>
              <li class="dropdown-header"><strong><a href="<?php echo base_url('products?c='.$nav->cat_id.'&category='.$nav->cat_desc) ?> " class="dropdown-item"><?php echo $nav->cat_desc ?></a></strong></li>
              <li class="divider"></li>
              <?php $cat_id = $nav->cat_id ?>
              <?php $cnt += 1; ?>
            <?php endif; ?>
            <li><a href="<?php echo base_url('products?s='.$nav->subcat_id."&subcategory=".$nav->subcat_desc) ?>" class="dropdown-item"><?php echo $nav->subcat_desc ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#" class="">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" class="">About us</a>
      </li>      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>