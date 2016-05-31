<nav class="pagination__entry">
	<?php if ( is_object( $previous ) ) : ?>
		<div class="pagination__previous">
			<a href="<?php echo get_permalink( $previous ); ?>" class="button">
				&#x000AB; <?php _e( 'Previous', 'library' ); ?>
			</a>
			<div class="pagination__post-title"><?php esc_html_e( $previous->post_title ); ?></div>
		</div>
	<?php endif; ?>
	<?php if ( is_object( $next ) ) : ?>
		<div class="pagination__next">
			<a href="<?php echo get_permalink( $next ); ?>" class="button">
				<?php _e( 'Next', 'library' ); ?> &#x000BB;
			</a>
			<div class="pagination__post-title"><?php esc_html_e( $next->post_title ); ?></div>
		</div>
	<?php endif; ?>
</nav>