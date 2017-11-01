<?php

function mdcwp_customize_register( $wp_customize ) {
	$wp_customize->add_section('textcolors', array('title'=>'Theme colors'));
	$txtcolors[] = array(
    'slug'=>'primary_color_custom', 
    'default' => '#3f51b5',
    'label' => 'Primary Color'
	);
 
	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
	$txtcolors[] = array(
    'slug'=>'accent_color_custom', 
    'default' => '#ff4081',
    'label' => 'Accent Color'
	);
	
	foreach( $txtcolors as $txtcolor ) {
 
    // SETTINGS
    $wp_customize->add_setting(
        $txtcolor['slug'], array(
            'default' => $txtcolor['default'],
            'type' => 'option', 
            'capability' =>  'edit_theme_options'
			)
		);
    
	$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        $txtcolor['slug'], 
        array('label' => $txtcolor['label'], 
        'section' => 'textcolors',
        'settings' => $txtcolor['slug'])
		)
	);
	}
}
add_action('customize_register', 'mdcwp_customize_register');

function mdcwp_customize_colors() {
	$primary_color_custom = get_option( 'primary_color_custom' );

	$accent_color_custom = get_option( 'accent_color_custom' );
	?>
	<style>
	:root {
		--mdc-theme-primary: <?php echo $primary_color_custom; ?>;
		--mdc-theme-accent: <?php echo $accent_color_custom; ?>;
	}
	</style>
	<?php
}
add_action('wp_head', 'mdcwp_customize_colors');