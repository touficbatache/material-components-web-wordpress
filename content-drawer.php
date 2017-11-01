<aside class="mdc-temporary-drawer">
      <nav class="mdc-temporary-drawer__drawer">
		<header class="mdc-temporary-drawer__header">
			<div class="mdc-temporary-drawer__header-content mdc-theme--primary-bg mdc-theme--text-primary-on-primary" style="background-image: url(<?php header_image(); ?>); background-size: cover;">
				<?php bloginfo('name'); ?>
			</div>
		</header>
       <nav class="mdc-temporary-drawer__content mdc-list-group">
          <div id="icon-with-text-demo" class="mdc-list">
			<?php wp_nav_menu(array('theme_location'=>'primary', 'items_wrap' => '%3$s', 'walker'=>new Walker_mdcwp_drawer())) ?>
          </div>
        </nav>
      </nav>
    </aside>