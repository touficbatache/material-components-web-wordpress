<div class="mdc-card mdcwp-card mdcwp-card--with-avatar">
	<section class="mdc-card__primary mdc-card__meta">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, $default, $alt, array('class'=>'mdcwp-card__avatar')); ?>
		<h1 class="mdc-card__title mdc-card__title-meta"><?php the_author_posts_link(); ?></h1>
		<h2 class="mdc-card__subtitle mdc-card__subtitle-meta"><?php the_time('F j, Y'); ?></h2>
	</section>
	<section class="mdc-card__media mdcwp-card__16-9-media" <?php if (has_post_thumbnail()) { echo 'style="background-image: url('; the_post_thumbnail_url(); echo ');"'; } ?>></section>
	<section class="mdc-card__primary">
		<?php the_title( sprintf('<h1 class="mdc-card__title mdc-card__title--large"><a href="%s" style="text-decoration: none; color: var(--mdc-theme-primary, #3f51b5);">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
	</section>
	<section class="mdc-card__supporting-text"><?php the_content(); ?></section>
</div>
<br>