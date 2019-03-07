
<div id="nav-backdrop"></div>
<div class="mobile-banner d-none">
  <a class="navbar-brand text-dark p-2" id="showNavbar"><span>&#9776;</span></a>
  <a class="navbar-brand py-0" href="<?php echo base_url(); ?>">
  <img src="<?php echo base_url('utilities/images/nav-logo/cytek-blue-logo.png') ?>" class="py-2" width="130" alt=""> 
  </a>
</div>
<nav class="navbar navbar-expand-lg  text-light py-0" id="navbarCustom">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">
    <img src="<?php echo base_url('utilities/images/nav-logo/cytek-blue-logo.png') ?>" width="150" alt="">
  </a>
  <div class="navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-2">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo ($page == "products") ? 'active' : ''  ?>" data-toggle="dropdown" href="#">Products <span class="sr-only">(current)</span></a>
          <ul class="dropdown-menu">
          <?php $cat_id = "" ?>
          <?php $cnt = 0; ?>
          <?php foreach ($navs as $nav): ?>
            <?php if ($cat_id != $nav->cat_id): ?>
              <?php echo ($cnt != 0) ? '<li class="dropdown-divider"></li>' : '' ?>
              <li class="dropdown-header"><strong><a href="<?php echo base_url('product/category?id='.$nav->cat_id.'&category='.$nav->cat_title) ?> " class="dropdown-item"><?php echo $nav->cat_title ?></a></strong></li>
              <li class="dropdown-divider"></li>
              <?php $cat_id = $nav->cat_id ?>
              <?php $cnt += 1; ?>
            <?php endif; ?>
            <li class="dropdown-list"><a href="<?php echo base_url('product/category/subcategory?id='.$nav->subcat_id) ?>" class="dropdown-item"><?php echo $nav->subcat_title ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php echo $page == "blog" ? 'active' : '' ?>" href="<?php echo base_url('blogs') ?>" >BLOGS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($page == "events") ? 'active' : '' ?>" href="<?php echo base_url('events') ?>" >EVENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo $page == "about" ? 'active' : '' ?>" href="<?php  echo base_url('blogs') ?>">ABOUT US</a>
      </li>      
    </ul>
    <div class="">
      <a href="https://www.olympus-ims.com/en/">
        <img src="<?php echo base_url('utilities/images/nav-logo/olympus-blue-logo.png') ?> " width="100" alt="">
      </a>
    </div>
  </div>
</nav>