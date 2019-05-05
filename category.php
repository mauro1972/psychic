<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0.
 */

get_header(); ?>

<?php
	$category = get_the_category();
	//print_r($category);
?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full">
		<h1 class="category-page__title"><?php echo $category[0]->name; ?></h1>
		<div class="category-page__description">
			<?php echo $category[0]->category_description; ?>
		</div>



		<?php 
			if ( !empty( psy_category_sections() ) ) {
				foreach( psy_category_sections() as $sections ) {
					echo '<h2>'. $sections['section_title'] .'</h2>';
					echo '<div>'. $sections['section_description'] .'</div>';
					?>
					<div class="slider-section grid-container">
						<div class="slider responsive section-slider" style="">	
							<?php				
							$tag_posts = $sections['tag_posts'];
							while ($tag_posts->have_posts() ) {
								$tag_posts->the_post();
								?>
								<?php
									$content = apply_filters( 'the_content', $post->post_content );
									$embeds = get_media_embedded_in_content( $content );
									$image_url = get_the_post_thumbnail_url($post, 'medium');
									setup_postdata($post);
								?>						
								<div>
									<?php if(!empty($embeds[0]) ) { ?>
										<div class="slide__video">
											<?php echo $embeds[0] ; ?>
										</div>
									<?php } else { ?>									
										<div class="slide__image" style="background-image: url('<?php echo $image_url; ?>')">
										
										</div>
									<?php } ?>

									<div class="slide__content">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php the_excerpt(); ?>
									</div>
								</div>

								<?php
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
					<?php
				}
				
			} else {
				
			if ( have_posts() ) : ?>
            <div class="grid-x grid-margin-x">
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/news-box/card', '' ); ?>
                <?php endwhile; ?>
            </div>
			<?php else : ?>
				<?php //get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
			if ( function_exists( 'foundationpress_pagination' ) ) :
				foundationpress_pagination();
			elseif ( is_paged() ) :
			?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; 
			}
		?>

		</main>
		<?php //get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
