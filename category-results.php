<?php

get_header();

$id = get_queried_object_id();
$category = get_category($id);

var_dump($category);

$args = array(
    'numberposts' => 6,
    'category' => $category->term_id,
    'post_status' => 'publish'
);

$posts = get_posts($args);

function truncate($string,$length=250,$append="&hellip;") {
    $string = trim($string);
  
    if(strlen($string) > $length) {
        $string = wordwrap($string, $length);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
    }
  
    return $string;
}

?>

<h2><?php echo $category->cat_name; ?></h2>
<?php foreach($posts as $post) {
    var_dump($post);
    $title = $post->post_title;
    $url = $post->guid;
    $content = truncate($post->post_content);
    ?>
    <div class="text-box">
        <a class="post-title" href="">Title</a>
        <p class="details">Posted by author on date</p>
        <p>Content</p>
        <a href="">Read More</a>
    </div>
<?php }