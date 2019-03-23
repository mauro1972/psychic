<?php
?>
<div class="post-item featured-post">

    <!-- Featured Post's thumbnail -->
    <?php $img = get_the_post_thumbnail_url($post, 'medium'); ?>
    <a href="<?php the_permalink(); ?>" class="post-thumbnail" style="background: url('<?php echo $img; ?>')"> 
    
    <!--<img src="https://static.pexels.com/photos/24587/pexels-photo-24587.jpg" alt="">-->
    </a>

    <!-- Post's text -->
    <div class="post-text">

    <!-- Post's title -->
    <a href="<?php the_permalink(); ?>">
        <h3 class="post-title"><?php the_title(); ?></h3>
    </a>
    <div class="post-meta">
        <!--<span class="meta"><span class="meta-icon fa fa-user-circle-o" aria-hidden="true"></span><a class="meta-text">Steve Jobs</a></span>-->
        <!--<span class="meta"><span class="meta-icon fa fa-clock-o" aria-hidden="true"></span><span class="meta-text">22/06/2030</span></span>-->
    </div>

    <!-- Post's summary -->
    <div class="post-summary">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="post-read-more">Read more<span class="fa fa-chevron-circle-right" aria-hidden="true"></span></a>
        </p>
    </div>
    </div>
</div>