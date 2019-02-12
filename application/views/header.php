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
</head>
<body>

