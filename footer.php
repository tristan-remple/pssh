</main>
<footer class="flex-row">
    <p id="foot-text">
        Copyright © 2024 Post-secondary Student Homeless/Housing Research NetworkTop Charity by Ascendoor
    </p>
    <div class="flex-col">
        <?php $menu_items = wp_get_nav_menu_items("Footer");
        foreach($menu_items as $item) { ?>
            <a class="nav-btn" href="<?php echo $item->url; ?>">
                <?php echo $item->title; ?>
            </a>
        <?php } ?>
    </div>
</footer>