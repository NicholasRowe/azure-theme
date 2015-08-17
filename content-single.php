<?php
/**
 * @package rs
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( has_post_thumbnail() ? the_post_thumbnail() : null ) ?> 

			<div class="entry-meta">

				<?php posted_on(); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
					<?php posted_by(); ?>
				<?php endif; ?>

			</div>

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
				<?php the_content(); ?>
		</div><!-- .entry-content -->
<footer class="entry-footer">
		<?php rs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
