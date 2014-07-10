<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="<?php get_bloginfo('description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.5.0/base-min.css&pure/0.5.0/grids-min.css&pure/0.5.0/grids-responsive-min.css">

        <?php wp_head() ?>

    </head>
    <body <?php body_class(); ?>>

        <!--[if lte IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        