<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?> " />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  rel="pingback" href="<?php bloginfo('pingback_url')?>"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class('class-name'); ?>>
    <?php wp_body_open();?>
    <div class="container">
    <div class= "logo">
    
    </div>
    <?php echo " heloo header"?>
    <?php  linh_menu('primary') ?>