<?php get_header(); ?>
	<main style="padding-top: 74px; padding-left: 28px;">
	<div>
		<h1 class="mdc-typography--display1">404 Page Not Found</h1>
		<p style="padding-top: 0;">It seems like the page you were trying to reach does not exist anymore, or maybe it has just been deleted.</p>
		<div class="mdc-textfield mdc-textfield--fullwidth">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
          <input class="mdc-textfield__input" type="text" placeholder="Search" name="s" aria-label="Search">
        </form>
		</div>
		</div>
	</main>

<?php get_footer(); ?>