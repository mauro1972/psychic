<?php
    $content = apply_filters( 'the_content', $post->post_content );
    $embeds = get_media_embedded_in_content( $content );
?>
<div class="cell card news-card medium-3">
    <?php if(empty($embeds)) { ?>
        <a href="<?php the_permalink(); ?>" class="card-media" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>)"></a>
    <?php } else { ?>
        <?php echo $embeds[0]; ?>
    <?php } 
    ?>
  <div class="card-section">
    <!--<div class="news-card-date">Sunday, 16th April</div>-->
    <article class="news-card-article">
      <h2 class="news-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
    <!--<div class="news-card-author">
      <div class="news-card-author-image">
        <img src="https://i.imgur.com/lAMD2kS.jpg" alt="user">
      </div>
      <div class="news-card-author-name">
        By <a href="#">Harry Manchanda</a>
      </div>
    </div>-->
  </div>
</div>