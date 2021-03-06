
<div class="d-flex">
<div id="nav-backdrop"></div>
<nav class="navbar fixed-top navbar-toggleable-md bg-cytek  d-block d-lg-none">
  <a class="navbar-brand text-white" id="showMenu"><span>&#9776;</span></a>
  <a href="<?php echo base_url('/admin') ?>">
    <img src="<?php echo base_url('utilities/images/nav-logo/cytek-white-logo.png') ?>" alt="" class="admin-logo">
  </a>    
</nav>
<aside class="cytek-sidebar">
    <div class="sidebar-content">
        <section class="sidebar-menu">
           <nav>
                <div class="px-4">
                    <a class="sidebar-brand" href="<?php echo base_url('/admin') ?>">
                        <img src="<?php echo base_url('utilities/images/nav-logo/cytek-white-logo.png') ?>" alt="">
                    </a>
                </div>
                <ul class="navbar-nav flex-column ">
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/category') ?>" class="nav-link <?php echo ($page == "category") ? 'active' : ''; ?>">
                            <span><i class="fa fa-list-alt fa-lg fa-fw  mr-2"></i> Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/products') ?>" class="nav-link <?php echo ($page == "products") ? 'active' : ''; ?>">
                            <span><i class="fa fa-store fa-lg fa-fw  mr-2"></i> Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/events') ?>" class="nav-link <?php echo ($page == "events") ? 'active' : ''; ?>">
                            <span><i class="fa fa-calendar-alt fa-lg fa-fw  mr-2"></i> Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/articles') ?>" class="nav-link <?php echo ($page == "articles") ? 'active' : ''; ?>">
                            <span><i class="fa fa-book fa-lg fa-fw  mr-2"></i> Articles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/leads') ?>" class="nav-link <?php echo ($page == "leads") ? 'active' : ''; ?>">
                            <span class="mr-2"><i class="fas fa-envelope fa-lg fa-fw mr-2"></i> Leads</span><?php echo !empty($inquiry) ? '<span class="badge badge-light">' .$inquiry. ' unread</span>' : '' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/users') ?>" class="nav-link <?php echo ($page == "users") ? 'active' : ''; ?>">
                            <span><i class="fa fa-users-cog fa-lg fa-fw  mr-2"></i> User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('admin/settings') ?>" class="nav-link <?php echo ($page == "settings") ? 'active' : ''; ?>">
                            <span><i class="fa fa-cogs fa-lg fa-fw  mr-2"></i> Settings</span>
                        </a>
                    </li>
                </ul>   
           </nav>            
        </section>
        <section class="sidebar-footer text-white ">         
            <nav>
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="<?php echo base_url('admin/logout') ?>" class="nav-link">
                          <div class="media mb-1">
                            <div class="py-1 pr-2">
                            <img src="<?php echo  empty($this->session->userdata('image')) ? base_url('utilities/images/no-image.png') : base_url($this->session->userdata('image')) ?>" class="rounded-circle mr-1" alt="" width="40" height="40">
                            </div>                
                            <div class="media-body mt-2">
                              <span class="fw-bold"><?php echo $this->session->userdata('f_name') ?></span>
                              <span class="d-block fw-light text-white small" style="line-height:0.8;">System Admin</span>                                
                            </div>                
                            <span class="d-block py-2 pl-2 pr-2 mt-2"><i class="fa fa-sign-out-alt fa-lg"></i> </span>   
                          </div>
                      </a>
                    </li>
                </ul>
            </nav>
            <footer class="px-4 pb-4">
                <span style="font-size:11px;">Copyright by Cytek Solutions Inc. © 2019 All Rights Reserved</span>
            </footer>
        </section>
    </div>
</aside>
    
