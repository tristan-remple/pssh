<?php

get_header();

$id = get_queried_object_id();
$page = get_post($id);
$title = $page->post_title;
$content = $page->post_content;

$thumb_id = get_post_thumbnail_id();
if ($thumb_id > 0) {
    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', TRUE);
    $src = wp_get_attachment_image_src($thumb_id, 'large')[0];
}

$all_pages = get_pages( array(
    'post_type' => 'page',
    'post_status' => 'publish'
) );

$child_pages = get_page_children( $id, $all_pages );

?>

<div class="text-box">
    <h2><?php echo $title; ?></h2>
    <?php 
    if ($thumb_id > 0) { ?>
        <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" class="float" />
    <?php }
    echo $content; 
    if (count($child_pages) > 0) { ?>
    <div class="flex-row">
        <?php foreach($child_pages as $item) { ?>
            <a class="nav-btn" href="<?php echo $item->guid; ?>">
                <?php echo $item->post_title; ?>
            </a>
        <?php } } ?>
    </div>
</div>

<?php get_footer(); ?>