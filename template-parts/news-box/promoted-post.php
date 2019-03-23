<?php
?>
<div class="post-item promoted-post">
    <?php $img = get_the_post_thumbnail_url($post, 'thumbnail'); ?>
    <a href="<?php the_permalink(); ?>" class="post-thumbnail" style="background: url('<?php echo $img; ?>')">
    </a>
    <div class="post-text">
    <a href="<?php the_permalink(); ?>">
        <h3 class="post-title"><?php the_title(); ?></h3>
    </a>
    <div class="post-meta">
        <!--<span class="meta"><span class="meta-icon fa fa-user-circle-o" aria-hidden="true"></span><a class="meta-text">Steve Jobs</a></span>-->
        <!--<span class="meta"><span class="meta-icon fa fa-clock-o" aria-hidden="true"></span><span class="meta-text">22/06/2030</span></span>-->

        <ul class="promoted-post__categories">
            <?php
                //get all the categories the post belongs to
                $categories = wp_get_post_categories( get_the_ID() );
                //loop through them
                foreach($categories as $c){
                $cat = get_category( $c );
                //get the name of the category
                $cat_id = get_cat_ID( $cat->name );
                //make a list item containing a link to the category
                echo '<li><a href="'.get_category_link($cat_id).'">'.$cat->name.'</a></li>';
                }
            ?>
        </ul>

    </div>
    </div>
</div>