<?php

get_header();

$id = get_queried_object_id();
$page = get_post($id);
$title = $page->post_title;
$content = $page->post_content;
$thumb_id = get_post_thumbnail_id($id);
$src = wp_get_attachment_image_src($thumb_id, 'full')[0];
$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
$menu_item = wp_get_nav_menu_items("Call to Action")[0];

?>

<img id="pseudo-background" src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" />

<div class="text-box" id="home-blurb">
    <h2><?php echo $content; ?></h2>
    <a class="nav-btn" href="<?php echo $menu_item->url; ?>">
        Find out how we're helping.
    </a>
</div>

<?php

function truncate($string,$length=120,$append="&hellip;") {
    $string = trim($string);
  
    if(strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }
  
    return $string;
}

$results_cat = get_category_by_slug('results');
$results_args = array(
    'numberposts' => 2,
    'category' => $results_cat->term_id,
    'post_status' => 'publish'
);
$results_posts = get_posts($results_args);

$resources_cat = get_category_by_slug('resources');
$resources_args = array(
    'numberposts' => 2,
    'category' => $resources_cat->term_id,
    'post_status' => 'publish'
);
$resources_posts = get_posts($resources_args);

$literature_cat = get_category_by_slug('literature');
$literature_args = array(
    'numberposts' => 2,
    'category' => $literature_cat->term_id,
    'post_status' => 'publish'
);
$literature_posts = get_posts($literature_args);

?>

<div id="bg-fade"></div>
<div id="home-row" class="flex-row">
    <div class="home-section text-box">
        <h3>Recent <?php echo $results_cat->cat_name; ?></h3>
        <hr>
        <?php if (count($results_posts) == 0) {
            echo '<p>Pending...</p>';
        } else {
            foreach($results_posts as $post) { ?>
                <a href="<?php echo $post->guid; ?>">
                    <h3><?php echo $post->post_title; ?></h3>
                </a>
                <p><?php echo truncate($post->post_excerpt); ?></p>
                <hr>
            <?php }
        } ?>
        <a href="<?php echo get_term_link($results_cat); ?>" class="nav-btn bottom">See All</a>
    </div>
    <div class="home-section text-box">
    <h3>Recent <?php echo $resources_cat->cat_name; ?></h3>
    <hr>
        <?php if (count($resources_posts) == 0) {
            echo '<p>Pending...</p>';
        } else {
            foreach($resources_posts as $post) {
                $reg = preg_match('/\s*https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/=]*)\s*/im', $post->post_content, $matches);
                if ($reg) { ?>
                    <a href="<?php echo trim($matches[0]); ?>">
                        <h3><?php echo $post->post_title; ?></h3>
                    </a>
                    <p><?php echo truncate($post->post_excerpt); ?></p>
                    <hr>
            <?php } } } ?>
        <a href="<?php echo get_term_link($resources_cat) . '?tag=Canada'; ?>" class="nav-btn bottom">See All</a>
    </div>
    <div class="home-section text-box">
    <h3>Recent <?php echo $literature_cat->cat_name; ?></h3>
    <hr>
        <?php if (count($literature_posts) == 0) {
            echo '<p>Pending...</p>';
        } else {
            foreach($literature_posts as $post) {
                $reg = preg_match('/\s*https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/=]*)\s*/im', $post->post_content, $matches);
                if ($reg) { ?>
                    <a href="<?php echo trim($matches[0]); ?>">
                        <h3><?php echo $post->post_title; ?></h3>
                    </a>
                    <p><?php echo truncate($post->post_excerpt); ?></p>
                    <hr>
            <?php } } } ?>
        <a href="<?php echo get_term_link($literature_cat) . '?tag=Canada'; ?>" class="nav-btn bottom">See All</a>
    </div>
</div>

<?php get_footer(); ?>