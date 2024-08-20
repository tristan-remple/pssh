<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php
        wp_head();

        $title = get_bloginfo("name");
        $tagline = get_bloginfo("description");
        $logo = get_site_icon_url();

        $menu_display = [];
        $menu_items = wp_get_nav_menu_items("Header");
            foreach($menu_items as $item) {
                if ($item->menu_item_parent == "0") {
                    $menu_display[$item->ID]["title"] = $item->title;
                    $menu_display[$item->ID]["url"] = $item->url;
                } else {
                    $menu_display[$item->menu_item_parent]["children"][$item->ID]["title"] = $item->title;
                    $menu_display[$item->menu_item_parent]["children"][$item->ID]["url"] = $item->url;
                }
            }
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
            foreach($menu_display as $d_item) {
                if (!$d_item["children"]) {
                    echo '<a class="nav-btn" href="'.$d_item["url"].'">'.$d_item["title"].'</a>';
                } else {
                    echo '<div class="dropdown nav-btn" tabindex="0"><div class="dropdown-header" tabindex="-1">'.$d_item["title"].' <span class="dropdown-arrow">▼</span></div>';
                    echo '<a href="'.$d_item["url"].'" class="dropdown-item" tabindex="-1">'.$d_item["title"].'</a>';
                    foreach($d_item["children"] as $child) {
                        echo '<a href="'.$child["url"].'" class="dropdown-item" tabindex="-1">'.$child["title"].'</a>';
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</header>
<main>
