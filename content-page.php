<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package rs
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>

	<header class="entry-header">

		<?php if ( has_post_thumbnail() ? the_post_thumbnail() : null ) ?> 

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rs' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'rs' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
