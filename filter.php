<?php

$tags = get_terms( 'post_tag', 'orderby=count&hide_empty=0' );

?>

<form class="text-box filter-box" method="POST" action="">

    <h3>Filter Posts</h3>

    <input type="hidden" name="category" id="category" value="<?php echo $category->slug; ?>" />

    <label for="search">Search by keyword</label>
    <input type="text" name="search" id="search" placeholder="Search" />

    <label for="tags[]">Search by tags</label>
    <select name="tags[]" id="tags" multiple>
        <?php foreach ($tags as $tag) { ?>
            <option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
        <?php } ?>
    </select>

    <input type="submit" value="Go" class="nav-btn" />

</form>