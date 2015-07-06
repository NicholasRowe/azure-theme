<?php
/**
* @package playground
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( has_post_thumbnail() ? the_post_thumbnail() : null ) ?> 

			<div class="entry-meta">

				<?php postedOn(); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
					<?php postedBy(); ?>
				<?php endif; ?>

			</div>

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'playground' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div><!-- .entry-content -->

				<footer class="entry-footer">
				</footer><!-- .entry-footer -->
</article><!-- #post-## -->