<?php
/*
	==========================================
	  Add necessary files
	==========================================
*/
function mdcwp_enqueue() {
	//css
	wp_enqueue_style('materialstyle', get_template_directory_uri() . '/css/material-components-web.min.css', array(), '0.24.0', 'all');
	wp_enqueue_style('materialicons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '1.0', 'all');
	wp_enqueue_style('robotofont', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500', array(), '1.0', 'all');
	wp_enqueue_style('customstyles', get_template_directory_uri() . '/css/custom_styles.css', array(), '1.0', 'all');
	//js
	wp_enqueue_script('materialjs', get_template_directory_uri() . '/js/material-components-web.min.js', array(), '0.24.0', true);
	wp_enqueue_script('customscripts', get_template_directory_uri() . '/js/custom_scripts.js', array(), '1.0', true);
	echo('<meta name="viewport" content="width=device-width,initial-scale=1">');
	
}

add_action('wp_enqueue_scripts', 'mdcwp_enqueue');

/*
	==========================================
	  Activate menus
	==========================================
*/
function mdcwp_setup() {
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Drawer Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
	register_nav_menu('menutopright', 'Top right menu Navigation');
	register_nav_menu('tabmenu', 'Tabs Navigation');
}

add_action('init', 'mdcwp_setup');

/*
	==========================================
	  Activate HTML5 features
	==========================================
*/
add_theme_support('html5', array('comment-list', 'comment-form'));

/*
	==========================================
	  Style author name
	==========================================
*/
add_filter( 'the_author_posts_link', function( $link ) {
    return str_replace( 'rel="author"', 'rel="author" class="mdcwp-meta__anchor"', $link );
});

/*
	==========================================
	  Show posts in chronological order
	==========================================
*/
add_filter( 'pre_get_posts', 'reverse_post_order_pre_get_posts' );
function reverse_post_order_pre_get_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		$query->set( 'order', 'ASC' );
	}
}

/*
	==========================================
	  Show only posts in search
	==========================================
*/
add_filter('pre_get_posts','SearchFilter');
function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

/*
	==========================================
	  Theme support function
	==========================================
*/
$defaults = array(
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads' => true,
	'header-text' => false
);
add_theme_support('custom-header', $defaults);
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('image', 'video'));

/*
	==========================================
	  Material Design read more
	==========================================
*/
function modify_read_more_link() {
	return '<br><br><a class="mdc-button mdc-button--raised mdc-button--primary" href="' . get_permalink() . '">Read more</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/*
	==========================================
	  Include Walker file
	==========================================
*/
require get_template_directory() . '/inc/drawer-walker.php';
require get_template_directory() . '/inc/tab-walker.php';
require get_template_directory() . '/inc/menu-walker.php';
require get_template_directory() . '/inc/customizer.php';
/*
	==========================================
	  Head function
	==========================================
*/
function mdcwp_remove_version() {
	return '';
}
add_filter('the_generator', 'mdcwp_remove_version');

/*
	==========================================
	  Footer widgets
	==========================================
*/
function mdcwp_widget_setup() {
	register_sidebar(array('name'=>'Footer', 'id'=>'footer-1', 'class'=>'footer-area', 'description'=>'Footer widget area', 'before_widget'=>'<div id="%1$s" class="widget %2$s mdc-footer__widget">', 'after_widget'=>'</div>', 'before_title'=>'<h2 class="mdc-typography--headline">', 'after_title'=>'</h2>'));
}
add_action('widgets_init', 'mdcwp_widget_setup');

/*
	==========================================
	  Comments callback
	==========================================
*/
function mdcwp_comment($comment, $args, $depth) {
	global $comment;

    if ($comment->user_id == '0') {
        if (!empty ($comment->comment_author_url)) {
            $url = $comment->comment_author_url;
        } else {
            $url = '#';
        }
    } else {
        $url = get_author_posts_url($comment->user_id);
    }
	
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
	
	<hr class="mdc-list-divider">
	
	<br>
	
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		
		<div style="display: flex;">
			<div>
				<div class="comment-author vcard">
					<?php if ( $args['avatar_size'] != 0 ) echo '<div style="position: absolute;background: #bdbdbd;height: 32px;width: 32px;border-radius: 50%;background-image:url(' . get_avatar_url( $comment, array('size'=>32) ) . ')"></div>';?>
					<?php printf( __( '<h1 class="mdc-card__title mdcwp-comment__title mdc-theme--primary" style="margin-left: 46px;"><a href="' . $url . '" class="mdc-theme--primary" rel="external nofollow">' . get_comment_author() .'</a></h1>' ), get_comment_author_link() ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata" style="display: flex;"><a style="text-decoration: none;" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php printf( __('<h2 class="mdc-card__subtitle" style="margin-left: 46px;">%1$s at %2$s</h2>'), get_comment_date(),  get_comment_time() ); ?></a>
				</div>
			</div>
			<?php edit_comment_link( __( '<div class="mdc-ripple-surface material-icons" data-mdc-ripple-is-unbounded aria-label="Favorite" tabindex="0">edit</div>' ), '<span style="margin-left: 20px; margin-top: 10px;">', '' ); ?>
		</div>
		
		<?php comment_text(); ?>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before'=>'<button class="mdc-button mdc-button--compact">', 'after'=>'</button>') ) ); ?>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
		
    </div>
	
	<br>
	
    <?php endif; ?>
<?php
}
	
/*
	==========================================
	  Show meta data
	==========================================
*/
function mdcwp_custom_properties_add_meta_box() {
	add_meta_box( 'mdcwp_custom_properties', 'Custom Properties', 'mdcwp_custom_properties_callback', null, 'side' );
}
function mdcwp_custom_properties_callback( $post ) {
	wp_nonce_field( 'mdcwp_save_custom_properties', 'mdcwp_custom_properties_meta_box_nonce' );
	
	$hide_author_value = get_post_meta( $post->ID, '_mdcwp_metadata_value_key', true );
	$custom_button_text_value = get_post_meta( $post->ID, '_mdcwp_custom_button_text_value_key', true );
	$immersive_mode_value = get_post_meta( $post->ID, '_mdcwp_immersive_mode_value_key', true );
	
	echo '<div><input type="checkbox" ' . (($hide_author_value) ? 'checked ' : "") . 'name="author_hidden" id="author_hidden" /> ';
	echo '<label for="author_hidden">Hide author</label></div>';
	echo '<br>';
	echo '<div><label for="author_hidden">Custom button text</label><br>';
	echo '<input type="text" value="' . $custom_button_text_value . '" name="custom_button_text" id="custom_button_text" placeholder="Button on the card\'s bottom left side." style="width: 100%;" /></div>';
	echo '<br>';
	echo '<div><input type="checkbox" ' . (($immersive_mode_value) ? 'checked ' : "") . 'name="immersive_mode" id="immersive_mode" /> ';
	echo '<label for="immersive_mode">Immersive mode (good for long articles)</label></div>';
	
}
function mdcwp_save_custom_properties( $post_id ) {
	
	if (isset($_POST['author_hidden'])) {
        update_post_meta($post_id, '_mdcwp_metadata_value_key', $_POST['author_hidden']);
    } else {
        delete_post_meta($post_id, '_mdcwp_metadata_value_key');
    }
	
	if (isset($_POST['custom_button_text'])) {
        update_post_meta($post_id, '_mdcwp_custom_button_text_value_key', sanitize_text_field($_POST['custom_button_text']));
    } else {
        delete_post_meta($post_id, '_mdcwp_custom_button_text_value_key');
    }
	
	if (isset($_POST['immersive_mode'])) {
        update_post_meta($post_id, '_mdcwp_immersive_mode_value_key', sanitize_text_field($_POST['immersive_mode']));
    } else {
        delete_post_meta($post_id, '_mdcwp_immersive_mode_value_key');
    }

}
add_action( 'add_meta_boxes', 'mdcwp_custom_properties_add_meta_box' );
add_action( 'save_post', 'mdcwp_save_custom_properties' );



/*
	==========================================
	  Custom icon menu field
	==========================================
*/

// Create field

function fields_list() {
	return array(
		'field_icon' => 'Material Design Icon'
	);
}

// Setup fields

function mdcwp_fields($id, $item, $depth, $args) {
	$fields = fields_list();
	
	foreach($fields as $_key => $label) :
	
		$key = sprintf('menu-item-%s', $_key);
		$id = sprintf('edit-%s-%s', $key, $item->ID);
		$name = sprintf('%s[%s]', $key, $item->ID);
		$value = get_post_meta($item->ID, $key, true);
		$class = sprintf('field-%s', $_key);
		
		?>
		
		<p class="description description-wide <?php echo esc_attr($class) ?>">
			<label for="<?php echo esc_attr($id) ?>"><?php echo esc_attr( $label ); ?><br><input type="text" id="<?php echo esc_attr($id) ?>" name="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($value) ?>"></label>
		</p>
		
		<?php
	
	endforeach;
}

add_action('wp_nav_menu_item_custom_fields', 'mdcwp_fields', 10, 4);

// Show columns

function mdcwp_columns( $columns) {
	$fields = fields_list();
	
	$columns = array_merge($columns, $fields);
	
	return $columns;
}

add_filter('manage_nav-menus_columns', 'mdcwp_columns', 99);

// Save fields
function mdcwp_save( $menu_id, $menu_item_db_id, $menu_item_args ) {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
	$fields = fields_list();
	foreach ( $fields as $_key => $label ) {
		$key = sprintf( 'menu-item-%s', $_key );
		// Sanitize.
		if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
			// Do some checks here...
			$value = $_POST[ $key ][ $menu_item_db_id ];
		} else {
			$value = null;
		}
		// Update.
		if ( ! is_null( $value ) ) {
			update_post_meta( $menu_item_db_id, $key, $value );
			echo "key:$key<br />";
		} else {
			delete_post_meta( $menu_item_db_id, $key );
		}
	}
}
add_action( 'wp_update_nav_menu_item', 'mdcwp_save', 10, 3 );
function mdcwp_filter_walker( $walker ) {
    $walker = 'MDCWP_Walker_Edit';
    if ( ! class_exists( $walker ) ) {
        require_once dirname( __FILE__ ) . '/inc/walker-nav-menu-edit.php';
    }
    return $walker;
}
add_filter( 'wp_edit_nav_menu_walker', 'mdcwp_filter_walker', 99 );