<?php
/**
 * testing version 0.2.1
 */
?>
<!--<div class="section-cat-container__inner grid-x grid-margin-x">-->

<!--<div class="section-cat-container__inner medium-6">
<div class="section-header" style="width:100%">
    <h2><a title="Seel all content related to '<?php echo $term_data->name; ?>'" href="<?php echo get_term_link($term_data); ?>"><?php echo $term_name ?></a></h2>
</div>-->

<?php
    $posts = get_posts(array(
        'posts_per_page' => 4,
        'post_type' => array('post'),
        'category' => $term_data->term_id,
        'meta_query' => array(
            'relation' => 'AND',
            array  (
                'key' => 'post_promoted',
                'value' => 0,
                'compare' => '=', 
            ),
            array  (
                'key' => 'post_featured',
                'value' => 0,
                'compare' => '=', 
            ),                        
        )
    ));
    //echo count($posts);
    if ( count($posts) ) {
    ?>
    <div class="cell article-row-section medium-6">
    <div class="article-row-section-inner">

        <h2 class="article-row-section-header section-title"><a title="Seel all content related to '<?php echo $term_data->name; ?>'" href="<?php echo get_term_link($term_data); ?>"><?php echo $term_name ?></a></h2>
    <?php
    
    foreach($posts as $post) {
        setup_postdata( $post );
        $content = apply_filters( 'the_content', $post->post_content );
        $embeds = get_media_embedded_in_content( $content );
        ?>
        <a href="<?php the_permalink(); ?>">
        <article class="article-row">
            <div class="article-row-img">
                <?php if(empty($embeds)) { ?>
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?></a>
                <?php } else { ?>
                    <?php echo $embeds[0]; ?>
                <?php } ?>
            </div>
            <div class="article-row-content">
                <h2 class="article-row-content-header"><?php the_title(); ?></h2>

                <p class="article-row-content-description"><?php the_excerpt(); ?></p>

            </div>
        </article>
        </a>        

        <?php 
 
    }
?>


        </div>
    </div>
<?php } ?>