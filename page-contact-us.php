<?php

get_header();

$id = get_queried_object_id();
$page = get_post($id);
$title = $page->post_title;
$content = $page->post_content;

?>

<div class="text-box">
    <h2><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
</div>

<?php get_footer(); ?>