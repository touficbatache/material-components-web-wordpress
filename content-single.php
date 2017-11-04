<div class="mdc-card mdcwp-card mdcwp-card--with-avatar mdcwp-ribbon__content">
	<div class="mdc-card__horizontal-block">
		<section class="mdc-card__primary mdc-card__meta mdc-card__padding-adjust">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, $default, $alt, array('class'=>'mdcwp-card__avatar')); ?>
			<h1 class="mdc-card__title mdc-card__title-meta"><?php the_author_posts_link(); ?></h1>
			<h2 class="mdc-card__subtitle mdc-card__subtitle-meta"><?php the_time('F j, Y'); ?></h2>
		</section>
		<?php edit_post_link( __('<button class="mdc-button" style="color: Black;" data-mdc-auto-init="MDCRipple"><i class="material-icons mdcwp-edit-icon">mode_edit</i> Edit post</button>'), '', '', 0, 'mdc-card__primary mdc-card__padding-adjust' ); ?>
	</div>
	<section class="mdc-card__primary mdc-card__padding-adjust">
		<?php the_title( sprintf('<h1 class="mdc-card__title mdc-card__title--large"><a href="%s" style="text-decoration: none; color: var(--mdc-theme-primary, #3f51b5);">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
		<small class="mdc-card__subtitle"><?php the_tags(); ?></small>
	</section>
	<section class="mdc-card__supporting-text"><?php the_content(); ?></section>
</div>

<br>

<?php
	if ( comments_open() || '0' != get_comments_number() ) { comments_template(); }
?>
