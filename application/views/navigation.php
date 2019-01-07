<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cytek</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products</a>
          <ul class="dropdown-menu">
          <?php $cat_id = "" ?>
          <?php $cnt = 0; ?>
          <?php foreach ($navs as $nav): ?>
            <?php if ($cat_id != $nav->cat_id): ?>
              <?php echo ($cnt != 0) ? '<li class="divider"></li>' : '' ?>
              <li class="dropdown-header"><strong><a href="<?php echo base_url('products?c='.$nav->cat_id.'&category='.$nav->cat_desc) ?>"><?php echo $nav->cat_desc ?></a></strong></li>
              <li class="divider"></li>
              <?php $cat_id = $nav->cat_id ?>
              <?php $cnt += 1; ?>
            <?php endif; ?>
            <li><a href="<?php echo base_url('products?s='.$nav->subcat_id."&subcategory=".$nav->subcat_desc) ?>"><?php echo $nav->subcat_desc ?></a></li>
          <?php endforeach; ?>
          </ul>
        </li>
        <li>
          <a href="#" class="">Events</a>
        </li>
        <li>
          <a href="#" class="">Blog</a>
        </li>
        <li>
          <a href="#" class="">About us</a>
        </li>
      </ul>
      <form class="navbar-form navbar-right" action="/action_page.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default  ">Submit</button>
      </form>
    </div>
  </div>
</nav>
