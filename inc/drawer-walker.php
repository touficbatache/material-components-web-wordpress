<?php
class Walker_mdcwp_drawer extends Walker_Nav_menu {
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}

	function start_el(&$output, $item, $depth=0, $args=array(), $id=0) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		$item->icon = get_post_meta($item->ID, '_menu_item_field_icon', true);

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' mdc-temporary-drawer--selected';

		if($item->icon == '') {$stylings = "style='padding: 0 32px;'";} else {$stylings = "";}
		$class_names = $class_names ? $stylings . ' class="mdc-list-item ' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= $class_names;

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		if($item->icon !== '') {
			$item_output .= '<i class="material-icons mdc-list-item__start-detail" aria-hidden="true">' . $item->icon . '</i>';
		}
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}