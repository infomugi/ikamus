<?php
$query = $this->db->query('SELECT * FROM setting WHERE status=1');
$app = $query->row();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">

  <title><?php echo $pageTitle; ?> - <?php echo $app->name; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
</head>

<body>
  <nav id="mainNav" class="navbar navbar-default navbar-full">
    <div class="container container-nav">
      <div class="navbar-header">
        <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="index.html">
          <img class="logo" src="<?php echo base_url(); ?>assets/uploads/logo/<?php echo $app->logo; ?>" alt="<?php echo $app->name; ?>">
        </a>
      </div>
      <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>site">Home</a></li>
        <li class="dropdown">
          <a href="#">Produk <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php
            $query = $this->db->query('
              SELECT * FROM category WHERE status=1');
            foreach ($query->result() as $row)
            {
              ?>
              <li>
                <a href="#" data-toggle="tooltip" title="<?php echo $row->name ?>">
                  <?php echo $row->name ?>
                </a>          
              </li>
              <?php
            }
            ?>  
          </ul>
        </li>
        <li><a class="chat-button" href="<?php echo base_url(); ?>site/login">Login</a></li>
      </ul>
    </div>
  </div>
</nav>