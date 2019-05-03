<?php
/*
Template Name: Full Width.
*/
get_header(); ?>

<?php //get_template_part( 'template-parts/featured-image' ); ?>

<?php
   $imageUrl = get_the_post_thumbnail_url();
    //echo $imageUrl;
?>

<!--<section class="featured-image" style="background-image: url(<?php echo $imageUrl; ?>)">
    <div class="featured-image__inner grid-container">
        <div class="fetaured-image__row grid-x">
            <div class="fetaured-image__col medium-8">
                <h1 class="featured-image__title"><?php the_title(); ?></h1>
            </div>
            <div class="fetaured-image__col medium-4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Hero widgets') ) : 
            
        endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="sec-nav">
    <div class="sec-nav__inner grid-container">
        <div class="sec-nav__inner grid-x">
            <ul class="sec-nav__navigation">
                <li><a href="<?php echo home_url('/alien-construct'); ?>">Alien construct</a></li>
            </ul>
        </div>
    </div>
</section>-->

<section class="featured-posts grid-container">
    <div class="posts-panel grid">

    <!-- Panel's header -->
    <header class="panel-header">
        <!--<h1 class="panel-title">Featured Posts (Grid)</h1>-->
    </header>

    <!-- Panel's content -->
    <div class="panel-content">

        <!-- Pinned post section -->
        <section class="pinned-post">
        <!-- Post item -->

        <?php
            while ( psy_featured_post()->have_posts()) {
                psy_featured_post()->the_post();
                //setup_postdata($post);
                ?>
                <?php get_template_part( 'template-parts/news-box/featured-post',''); ?>
                <?php                    
            }
            wp_reset_postdata();
        ?>
            
        </section>

        <!-- Posts list -->
        <section class="posts-list">
            <?php

                while (psy_promoted_posts()->have_posts()) {
                    psy_promoted_posts()->the_post();
                    setup_postdata($post);
                    ?>   
                    <?php get_template_part( 'template-parts/news-box/promoted-post',''); ?>
                    <?php
                }
                wp_reset_postdata();            
            ?>         
        </section>
    </div>
    </div>
</div>

<section class="videos">
    <h2 class="section-title">Energy Enhancement Videos</h2>
    <div class="slider-section grid-container">
        <div class="slider responsive video-slider" style="">
        <?php

            while (psy_videos()->have_posts()) {
                psy_videos()->the_post();
                $content = apply_filters( 'the_content', $post->post_content );
                $embeds = get_media_embedded_in_content( $content );
                setup_postdata($post);
                ?>   
                <div>
                    <?php echo $embeds[0]; ?>
                    <?php //the_excerpt(); ?>
                </div>
                <?php
            }
            wp_reset_postdata();            
        ?>    
        </div>
    </div>
</section>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
            <div class="main-content__inner">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php //get_template_part( 'template-parts/content', 'page' ); ?>
                    <?php //comments_template(); ?>
                <?php endwhile; ?>          
            </div>
		</main>
	</div>
</div>
<div class="section-cat-container grid-container">
<div class="grid-x grid-margin-x grid-padding-x">
<?php 

    $terms = get_terms(array(
        'taxonomy' => 'category',
    ));

    $i = 0;
    foreach( $terms as $key => $term ) {

        if ($term->name != 'Uncategorized') {

            set_query_var('term_name', $term->name);
            set_query_var('term_data', $term);

            ?>

                <?php if ($i != 1) { ?>

                    <?php get_template_part( 'template-parts/cat-section', '' ); ?>

                <?php } else { ?>

                    <?php get_template_part( 'template-parts/newsletter-form', '' ); ?>

                <?php } ?>

            <?php
            $i++;
        }
    }
?>
</div>    
</div>

<?php get_footer();