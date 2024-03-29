<?php

get_header();

$id = get_queried_object_id();
$category = get_category($id);

$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;

$args = array(
    'posts_per_page' => 10,
    'paged' => $paged,
    'category' => $category->term_id,
    'post_status' => 'publish'
);

$posts = get_posts($args);

function truncate($string,$length=300,$append="&hellip;") {
    
    $string = preg_replace('/<!--(.|\s)*?-->/', '', $string);
    $string = preg_replace('/<p>|<\/p>/', '', $string);
    $string = trim($string);
    
    if(strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string);
        $string = trim($string[0]) . $append;
    }
  
    return $string;
}

?>

<h2><?php echo $category->cat_name; ?></h2>
<?php foreach($posts as $post) {
    $title = $post->post_title;
    $url = $post->guid;
    $content = truncate($post->post_content);
    $author = get_the_author_meta('display_name', $post->post_author);
    $date = get_the_date('', $post->id);
    ?>
    <div class="text-box text-medium">
        <a class="post-title" href="<?php echo $url; ?>"><h3><?php echo $title; ?></h3></a>
        <p class="details">Posted by <?php echo $author; ?> on <?php echo $date; ?></p>
        <p><?php echo $content; ?></p>
        <a href="<?php echo $url; ?>">Read More</a>
    </div>
<?php }

$query_string = "/?cat=" . $category->term_id . '&page=';
$next = $paged + 1;
$prev = $paged - 1;

?>
<div class="flex-row">
    <?php if ($prev > 0) { ?>
        <a class="tag" href="<?php echo $query_string . $prev; ?>">PREV</a>
    <?php }

    $next_args = array(
        'posts_per_page' => 10,
        'paged' => $next,
        'category' => $category->term_id,
        'post_status' => 'publish'
    );
    $next_posts = get_posts($next_args);
    if (count($next_posts) != 0) { ?>
        <a class="tag" href="<?php echo $query_string . $next; ?>">NEXT</a>
    <?php } ?>
</div>

<?php get_footer(); ?>