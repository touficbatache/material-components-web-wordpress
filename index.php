<?php get_header(); ?>

	<main class="mdcwp-card__adjust mat-toolbar-adjust">
	<?php
	if(have_posts()):

		while(have_posts()): the_post(); ?>
		
			<?php get_template_part('content', get_post_format()); ?>
		
		<?php endwhile; ?>
		
		<div class="mdcwp-pagination">
			<div style="display: flex;">
			<?php previous_posts_link('<div style="margin-left: 15px;"><button class="mdc-fab mdc-fab--mini mdc-fab--plain mdcwp-pagination__button" data-mdc-auto-init="MDCRipple"><i class="material-icons mdcwp-older-posts-icon">arrow_back</i></button><span class="mdc-typography--caption" style="font-weight: 500; color: #757575; float: right; margin-top: 13px; margin-left: 10px;"> Newer</span></div>'); ?>
			<div style="flex: 1;"></div> 
			<?php next_posts_link('<div style="margin-right: 15px;"><span class="mdc-typography--caption" style="font-weight: 500; color: #757575; float: left; margin-top: 13px; margin-right: 10px;">Older </span><button class="mdc-fab mdc-fab--mini mdc-fab--plain mdcwp-pagination__button" data-mdc-auto-init="MDCRipple"><i class="material-icons mdcwp-older-posts-icon">arrow_forward</i></button></div>'); ?> </div>
		</div>
		
	<?php endif;
		wp_reset_query();
	?>
	</main>
<?php get_footer(); ?>