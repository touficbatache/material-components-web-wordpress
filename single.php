<?php get_header(); ?>
	<div class="mdcwp-ribbon" <?php if (has_post_thumbnail()) { echo 'style="background-image: url('; the_post_thumbnail_url(); echo ');"'; } ?>></div>
	<main>
		<div class="mdcwp-card__adjust mdcwp-ribbon__card">
		<?php 	
		if(have_posts()):
			while(have_posts()): the_post(); ?>
				<?php get_template_part('content', 'single'); ?>
			<?php endwhile; ?>
			<div class="mdcwp-pagination">
				<br>
				<div style="display: flex; justify-content: space-between;">
					<?php previous_post_link('%link', '<div style="margin-left: 15px;"><button class="mdc-fab mdc-fab--mini mdc-fab--plain mdcwp-pagination__button" data-mdc-auto-init="MDCRipple"><i class="material-icons mdcwp-older-posts-icon">arrow_back</i></button><span class="mdc-typography--caption" style="font-weight: 500; color: #757575; float: right; margin-top: 13px; margin-left: 10px;"> Previous post</span></div>'); ?>					<div style="flex: 1;"></div> 					
					<?php next_post_link('%link', '<div style="margin-right: 15px;"><span class="mdc-typography--caption" style="font-weight: 500; color: #757575; float: left; margin-top: 13px; margin-right: 10px;">Next post </span><button class="mdc-fab mdc-fab--mini mdc-fab--plain mdcwp-pagination__button" data-mdc-auto-init="MDCRipple"><i class="material-icons mdcwp-older-posts-icon">arrow_forward</i></button></div>'); ?>				</div>
			</div>
		<?php endif;?>
		</div>
	</main>
<?php get_footer(); ?>