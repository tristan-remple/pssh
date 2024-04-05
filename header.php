<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php
        wp_head();

        $title = get_bloginfo("name");
        $tagline = get_bloginfo("description");
        $logo = get_site_icon_url();
    ?>
</head>
<body class="grey">
<header class="flex-row">
    <a id="logo-frame" href="/">
        <img id="logo" src="<?php echo $logo; ?>" alt="PSSH Logo" />
    </a>
    <div class="flex-col">
        <a href="/">
            <h1><?php echo $title; ?></h1>
        </a>
        <h2><?php echo $tagline; ?></h2>
        <div class="flex-row">
            <?php 
            $menu_items = wp_get_nav_menu_items("Header");
            foreach($menu_items as $item) { ?>
                <a class="nav-btn" href="<?php echo $item->url; ?>">
                    <?php echo $item->title; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</header>
<main>
