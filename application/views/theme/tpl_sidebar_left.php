<?php
$terms = $this->db->query('SELECT count(id_term) as totalTerm FROM term WHERE status=1');
$term = $terms->row();

$users = $this->db->query('SELECT count(id_user) as totalUser FROM user WHERE status=1');
$user = $users->row();
?>
<!-- sidebar panel -->
<div class="sidebar-panel offscreen-left">
  <div class="brand">
    <!-- toggle small sidebar menu -->
    <a href="<?php echo base_url(); ?>javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">
      <i class="icon-grid"></i>
    </a>
    <!-- /toggle small sidebar menu -->
    <!-- toggle offscreen menu -->
    <div class="toggle-offscreen">
      <a href="<?php echo base_url(); ?>javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">
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
    <a href="#" class="small-menu-visible brand-logo">R</a>
    <!-- /logo -->
  </div>
  <ul class="quick-launch-apps hide">
    <li>
      <a href="<?php echo base_url(); ?>term/index">
        <span class="app-icon bg-danger text-white">
          I
        </span>
        <span class="app-title">Manage Istilah</span>
      </a>
    </li>
    <li>
      <a href="<?php echo base_url(); ?>term/create">
        <span class="app-icon bg-success text-white">
          A
        </span>
        <span class="app-title">Add Istilah</span>
      </a>
    </li>
    <li>
      <a href="<?php echo base_url(); ?>term/word">
        <span class="app-icon bg-primary text-white">
          W
        </span>
        <span class="app-title">Export Word</span>
      </a>
    </li>
    <li>
      <a href="<?php echo base_url(); ?>term/excel">
        <span class="app-icon bg-info text-white">
          E
        </span>
        <span class="app-title">Export Excel</span>
      </a>
    </li>
  </ul>
  <!-- main navigation -->
  <nav role="navigation">
    <ul class="nav">

      <!-- dashboard -->
      <li>
        <a href="<?php echo base_url(); ?>dashboard">
          <i class="icon-compass"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <?php
      $level = $this->session->userdata('level');
      if($level==1){
        ?>

        <li>
          <a href="#">
            <span class="badge pull-right"><?php echo $term->totalTerm; ?></span>
            <i class="icon-note"></i>
            <span>Istilah</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url(); ?>term/create">
                <span>Tambah</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>term/index">
                <span>Kelola</span>
              </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="#">
            <span class="badge pull-right"><?php echo $user->totalUser; ?></span>
            <i class="icon-users"></i>
            <span>Pengguna</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url(); ?>user/create">
                <span>Tambah</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>user/index">
                <span>Kelola</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>user/log">
                <span>Log</span>
              </a>
            </li>              
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="icon-layers"></i>
            <span>Master</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo base_url(); ?>division/index">
                <span>Divisi</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>setting/index">
                <span>Setting</span>
              </a>
            </li>
          </ul>
        </li>   

        <li>
          <a href="<?php echo base_url(); ?>api/index">
            <i class="icon-question"></i>
            <span>API Documentation</span>
          </a>
        </li>       
        <!-- /cards -->


        <?php }elseif($level==2){ ?>

          <li>
            <a href="#">
              <span class="badge pull-right"><?php echo $term->totalTerm; ?></span>
              <i class="icon-note"></i>
              <span>Daftar Istilah</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="<?php echo base_url(); ?>term/create">
                  <span>New</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>term/index">
                  <span>Manage</span>
                </a>
              </li>
            </ul>
          </li>


          <?php }else{ ?>  


            <li>
              <a href="#">
                <span class="badge pull-right"><?php echo $term->totalTerm; ?></span>
                <i class="icon-note"></i>
                <span>Daftar Istilah</span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="<?php echo base_url(); ?>term/create">
                    <span>New</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>term/index">
                    <span>Manage</span>
                  </a>
                </li>
              </ul>
            </li>

            <?php } ?>  

          </ul>
        </nav>
        <!-- /main navigation -->
      </div>
    <!-- /sidebar panel -->