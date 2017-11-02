<?php get_header(); ?>
	<main class="mdcwp-card__adjust mat-toolbar-adjust">
		<h1 class="mdc-typography--display1">Search results for: <?php echo get_search_query(); ?></h1>
		<?php 	
		if(have_posts()):
			while(have_posts()): the_post(); ?>

				<?php get_template_part('content'); ?>
			<?php endwhile;
		endif;
		?>
	</main>
<?php get_footer(); ?>