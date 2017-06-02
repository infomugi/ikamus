<?php
$query = $this->db->query('SELECT name FROM setting WHERE status=1');
$app = $query->row();
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <?php require_once('tpl_backend_asset_header.php'); ?>
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div> 
  <!-- /page loading spinner -->

  <div class="app layout-fixed-header">

    <?PHP require_once("tpl_sidebar_left.php"); ?>

    <!-- content panel -->
    <div class="main-panel">

      <?PHP require_once("tpl_navigation.php"); ?>

      <!-- main area -->
      <div class="main-content">
        <div class="page-title">
          <div class="title" id="app_title"><?php echo $pageTitle; ?>  <span id="title_result"></span></div>
          <div class="sub-title" id="app_url"><?php echo $app->name; ?></div>
        </div>
        