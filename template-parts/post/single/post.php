<?php
/**
 * Single Post Layout One
 */


$author = quiety_option( 'blog_list_meta_author' );
$meta_date = quiety_option( 'blog_list_meta_date' );
$meta_comments = quiety_option( 'blog_list_meta_comments' );
$meta_category = quiety_option( 'blog_list_meta_categories' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single single-layout-two' ); ?>>
	<?php Quiety_Theme_Helper::quiety_post_thumbnail( 'full' ); ?>

	<div class="entry-header">
		<div class="post-meta-wrapper">
			<div class="meta-wrapper">
				<ul class="post-meta">
					<?php if ( $author == '1' ) : ?>
					<li class="author-simple">
						<?php echo Quiety_Theme_Helper::quiety_posted_author_avatar(); ?>
					</li>
					<?php endif; ?>

					<?php if ( $meta_date == '1' ) : ?>
					<li><i class="feather-calendar"></i><?php Quiety_Theme_Helper::quiety_posted_on(); ?></li>
					<?php endif; ?>

					<?php if ( $meta_comments == '1' ) : ?>
					<li>
						<i class="feather-message-square"></i><?php Quiety_Theme_Helper::quiety_entry_comments( get_the_ID() ); ?>
					</li>
					<?php endif; ?>
				</ul><!-- .entry-meta -->

			</div>
			<!-- /.meta-wrapper -->
		</div><!-- .post-meta-wrapper -->
	</div>

	<div class="entry-content">
		<?php the_content();
		// Page Break
		wp_link_pages( array(
		   'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'quiety' ),
		   'after'  => '</div>',
	    ) ); ?>

		<div class="entry-footer">
			<?php Quiety_Theme_Helper::quiety_posted_tag(); ?>

			<?php if ( quiety_option( 'share_post' ) ) {
				echo '<div class="share-link-wrapper">';
					echo '<h3 class="share-title">' . esc_html( 'Share:', 'quiety' ) . '</h3>';
					Quiety_Theme_Helper::render_post_list_share();
				echo '</div>';
			} ?>
		</div>
		<!-- /.entry-footer -->

		<?php if ( quiety_option( 'author_info' ) ) {
			Quiety_Theme_Helper::render_author_info();
		} ?>
	</div>
	<!-- /.entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
