<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cytek Web Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li class="<?php echo ($active == "category") ? 'active' : '' ?>"><a href="<?php echo base_url('admin/category') ?>">Category</a></li>
        <li class="<?php echo ($active == "products") ? 'active' : '' ?>"><a href="<?php echo base_url('admin/products') ?>">Products</a></li>
        <li><a href="#">Users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logouts</a></li>
      </ul>
    </div>
  </div>
</nav>
