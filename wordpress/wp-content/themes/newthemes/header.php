<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="" />
    <link rel="pingback" href="<?php bloginfo('pingback_url:') ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php wp_head(); ?>
   
</head>

<body <?php body_class(); ?>  >



<?php wp_body_open(); ?>
    <div id="container">
        <div class="logo">
            <?php linh_header(); ?>
        </div>

        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
                <?php linh_menu('primary-menu'); ?>
            </div>
        </div>
        </nav>


