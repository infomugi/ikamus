<?php
$accounts = $this->db->query('SELECT * FROM user WHERE id_user='.$this->session->userdata('id'));
$account = $accounts->row();
?>

<!-- top header -->
<div class="header navbar">
  <div class="brand visible-xs">
    <!-- toggle offscreen menu -->
    <div class="toggle-offscreen">
      <a href="<?php echo base_url(); ?>javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <!-- /toggle offscreen menu -->
    <!-- logo -->
    <a class="brand-logo">
      <span><?php echo $app->name; ?></span>
    </a>
    <!-- /logo -->
  </div>
  <ul class="nav navbar-nav hidden-xs">
    <li>
      <a href="<?php echo base_url(); ?>javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
        <i class="icon-toggle-sidebar"></i>
      </a>
    </li>
    <li class="searchbox">
      <a href="<?php echo base_url(); ?>javascript:;" data-toggle="search">
        <i class="search-close-icon icon-close hide"></i>
        <i class="search-open-icon icon-magnifier"></i>
      </a>
    </li>
    <li class="navbar-form search-form hide">
      <form action="<?php echo site_url('term/index'); ?>" method="get">
        <div class="input-group">
          <input type="search" class="form-control search-input" placeholder="Cari Istilah..." name="q" value="">
        </div>
      </form>

    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right hidden-xs">
    <li>
      <a href="#" class="ripple" data-toggle="dropdown">
        <img src="<?php echo base_url(); ?>assets/uploads/avatar/middle/<?php echo $account->image; ?>" class="header-avatar img-circle" alt="<?php echo $account->fullname; ?>" title="<?php echo $account->fullname; ?>">
        <span><?php echo $account->fullname; ?></span>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a href="<?php echo base_url(); ?>user/setting">Edit Profile</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>user/password">Change Password</a>
        </li>  
        <li>
          <a href="<?php echo base_url(); ?>user/avatar">Change Avatar</a>
        </li>                            
        <li role="separator" class="divider"></li>
        <li>
          <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="<?php echo base_url(); ?>javascript:;" class="ripple" data-toggle="layout-chat-open">
        <i class="icon-user"></i>
      </a>
    </li>
  </ul>
</div>
      <!-- /top header -->