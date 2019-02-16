<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php //get_template_part( 'template-parts/featured-image' ); ?>

<?php
   $imageUrl = get_the_post_thumbnail_url();
    //echo $imageUrl;
?>

<section class="featured-image" style="background-image: url(<?php echo $imageUrl; ?>)">
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
<?php get_footer();