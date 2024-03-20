<?php

get_header();

$id = get_queried_object_id();
$page = get_page($id);
$title = $page->post_title;
$content = $page->post_content;

?>

<div class="text-box">
    <h2><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <div class="flex-row">
        <?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
    </div>
</div>

<?php get_footer(); ?>