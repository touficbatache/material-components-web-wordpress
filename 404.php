<?php get_header(); ?>
	<main style="padding: 74px 28px 0; display: flex; flex: 1; justify-content: center; align-items: center;" class="mdcwp-404">
		<div style="display: flex; flex-direction: column; align-items: center;">
			<h1 class="mdc-typography--display1" style="text-align: center;">				<span class="mdc-typography--display4">404</span>				<br>				<span class="mdc-typography--headline">Page Not Found</span>			</h1>
			<p style="padding-top: 0;">It seems like the page you were trying to reach does not exist anymore, or maybe it has just been deleted.</p>						<div class="mdc-ripple-surface" data-mdc-auto-init="MDCRipple" style="background: rgba(0, 0, 0, .15); width: 100%; height: 42px; border-radius: 2px;">				<div class="mat-search--desktop__wrapper">					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" style="display: flex; width: 100%;">						<label class="mat-search--desktop__icon mat-search--desktop__content material-icons" for="mat-search--desktop__input-404">search</label>						<input class="mat-search--desktop__content mdc-typography" id="mat-search--desktop__input-404" style="background-color: transparent; border: 0; outline: none; width: 100%; font-size: 14px;" value="" name="s" placeholder="Search">					</form>				</div>			</div>
		</div>
	</main>
<?php get_footer(); ?>