<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ArticlePress
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>

			<section class="single-page-section">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="blog-single-left">
								<div class="single-page-hero">
								<div class="single-page-hero-img">
									<?php articlepress_post_thumbnail(); ?>
								</div>
							</div>
							<div class="single-page">
								<h4 class="blog-info blog-info-single-page">
								<span class="post-user"><i class="fas fa-user"></i> <?php articlepress_posted_by(); ?></span>  <span class="time-date"><i class="far fa-calendar-alt"></i> <?php the_time( 'M d, Y' ); ?></span>
									<span class="caretory">
									<i class="far fa-list-alt"></i><?php 
										// Show the First Category Name Only
										$categories = get_the_category();
							
										if ( ! empty( $categories ) ) {
											echo esc_html( $categories[0]->name );   
										}
									?>
								</span>
								</h4>
								
								<h1 class="single-page-title">
									<?php the_title(); ?>
								</h1>
								<div class="single-page-content">
									<p class="single-page-text">
										<?php the_content(); ?>
									</p>
								</div>
								
								<!-- Post Tag -->
								<div class="post-tags">
									<i class="fas fa-tags"><span class="tag-list"></i> <?php the_tags(); ?></span>
								</div>
							</div>
							
							<?php 
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
							</div>
						</div>
						<div class="col-md-4">
							<!-- Sidebar Register -->
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>

		<?php endwhile; // End of the loop.	?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
