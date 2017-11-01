<footer class="mdcwp-footer">	<div style="display: flex; flex-wrap: wrap;">
		<?php $menu_footer = wp_nav_menu(array('echo'=>false, 'fallback_cb'=>'__return_false', 'theme_location'=>'secondary', 'menu_class'=>'mdc-footer__link-list', 'container_class'=>'mdcwp-footer__bottom-section')); if ( !empty ($menu_footer)) { wp_nav_menu(array('theme_location'=>'secondary', 'menu_class'=>'mdc-footer__link-list', 'container_class'=>'mdcwp-footer__bottom-section')); } ?>
		<?php dynamic_sidebar('footer-1'); ?>	</div>	<br>		&copy; 2017 <?php if(date('Y')!="2017") {echo '- ' . date('Y');} ?> <?php bloginfo('name'); ?> ALL RIGHTS RESERVED
</footer>
	
	<?php wp_footer(); ?>
	
	<script type="text/javascript">
	  window.mdc.autoInit();
	</script>
	</body>
</html>
