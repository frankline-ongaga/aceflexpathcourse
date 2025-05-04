<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArticlePress
 */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="blog-section">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<header class="404-page page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! 404 That page can&rsquo;t be found.', 'articlepress' ); ?></h1>
							</header><!-- .page-header -->

							<div class="404-image">
								<img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/404.jpg" );?>" alt="404 page">
							</div>							
						</div>
						<div class="col-md-4">
							<!-- Sidebar Register -->
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
