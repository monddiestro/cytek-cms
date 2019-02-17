<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <?php echo !empty($description) ? '<meta name="description" content="'.$description.'"/>' : '' ?>
    <?php echo !empty($keywords) ? '<meta name="keywords" content="'.$keywords.'"/>' : '' ?>
    <?php echo !empty($robots) ? '<meta name="robots" content="index,follow"/>' : '' ?>
    <?php echo !empty($og_title) ? '<meta property="og:title" content="'.$og_title.'">' : '' ?>
    <?php echo !empty($og_description) ? '<meta property="og:description" content="'.$og_description.'">' : '' ?>
    <?php echo !empty($og_image) ? '<meta property="og:image" content="'.$og_image.'">' : '' ?>
    <?php echo !empty($og_url) ? '<meta property="og:url" content="'.$og_url.'">' : '' ?>
    <?php echo !empty($cannonical) ? '<link rel="canonical" href="'.$cannonical.'">' : '' ?>
    <meta name="copyright" content="Copyright &copy; <?php echo date('Y') ?> Cytek Solutions Inc"/>
    <meta property="og:type" content="website">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('utilities/css/lightslider.css') ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('utilities/css/bootstrap-select.min.css') ?>" />    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('utilities/scss/main.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('utilities/@fortawesome/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('utilities/css/gijgo.min.css') ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('utilities/images/icon/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('utilities/images/icon/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('utilities/images/icon/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('utilities/images/icon/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('utilities/images/icon/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('utilities/images/icon/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('utilities/images/icon/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('utilities/images/icon/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('utilities/images/icon/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('utilities/images/icon/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('utilities/images/icon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('utilities/images/icon/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('utilities/images/icon/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?php echo base_url('utilities/images/icon/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url('utilities/images/icon/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

