<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ArticlePress
 */

?>


<div id="post-<?php the_ID(); ?>" class="blog">
	<div class="blog-img">
		<?php articlepress_post_thumbnail(); ?>
	</div>
	<div class="blog-content">
		<h4 class="blog-info">
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
		
		<!-- Blog Title -->
		<?php 
			if ( is_singular() ) :
				the_title( '<h3 class="blog-title">', '</h4>' );
			else :
				the_title( '<h3 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
		?>

		<!-- Blog Content -->
		<p class="blog-text">
			<?php 
				echo wp_trim_words( get_the_content(), 40, NULL );
			?>
		</p>
		

		<?php if( get_theme_mod( 'blog_post_readmore_button_show_hide' ) == 1 ): ?>
		<div class="blog-btn">
			<a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-blog"> <?php echo esc_attr( get_theme_mod('blog_post_readmore_text_change') ); ?> <i class="fas fa-arrow-right"></i></a>
		</div>
		<?php endif ?>

	</div>
</div>