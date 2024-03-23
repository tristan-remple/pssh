<?php

get_header();

$id = get_queried_object_id();
$post = get_post($id);
$title = $post->post_title;
$content = $post->post_content;
$tags = get_the_tags($id);
$category = get_the_category($post->ID)[0];
$author = get_the_author_meta('display_name', $post->post_author);
$date = get_the_date('', $id);
$excerpt = get_the_excerpt($id);

?>

<div class="text-box">
    <h2><?php echo $title; ?></h2>
    <p>Posted by <?php echo $author; ?> under <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->cat_name; ?></a> on <?php echo $date; ?>.</p>
    <hr />
    <?php if ($category->slug == "resources") { 
        $reg = preg_match('/\s*https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/=]*)\s*/im', $content, $matches);
        
        echo $excerpt; ?>
        <a href="<?php echo trim($matches[0]); ?>"><h4>
            <?php echo $title; ?>
        </h4></a>
        
    <?php } else { ?>
        <?php echo $content; ?>
    <?php } ?>
    <hr />
    <h3>Tags</h3>
    <div id="tag-box" class="flex-row">
        <?php foreach ($tags as $tag) { ?>
            <a class="tag" href="/?tag=<?php echo $tag->name; ?>">
                <?php echo ucfirst($tag->name); ?>
            </a>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>