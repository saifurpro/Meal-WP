<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' );?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>
<!--<body class="bg-light">-->

<body data-spy="scroll" data-target="#ftco-navbar-spy" data-offset="0" <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div class="site-wrap">

        <?php echo get_template_part('template-parts/navigation'); ?>

        <header class="site-header">
            <div class="row align-items-center">
                <div class="col-5 col-md-3">

                </div>
                <div class="col-2 col-md-6 text-center site-logo-wrap">
                    <a href="<?php echo site_url(); ?>" class="site-logo">M</a>
                </div>
                <div class="col-5 col-md-3 text-right menu-burger-wrap">
                    <a href="#" class="site-nav-toggle js-site-nav-toggle"><i></i></a>

                </div>
            </div>

        </header> <!-- site-header -->