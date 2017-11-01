<?php 
/*	Template Name: Ribbon page
*/
get_header(); ?>
	<div class="mdcwp-ribbon" <?php if (has_post_thumbnail()) { echo 'style="background-image: url('; the_post_thumbnail_url(); echo ');"'; } ?>></div>
	<main>
		<div class="mdcwp-card__adjust mdcwp-ribbon__card">
		<?php
		if( have_posts() ):
			while( have_posts() ): the_post(); ?>
			<div class="mdc-card mdcwp-card mdcwp-ribbon__content">
				<section class="mdc-card__primary">
					<h1 class="mdc-card__title mdc-card__title--large"><?php the_title(); ?></h1>
				</section>
				<section class="mdc-card__supporting-text"><?php the_content(); ?></section>
			</div>
			<br>
			<?php endwhile;			
		endif;
		?>
		</div>
	</main>
<?php get_footer(); ?>