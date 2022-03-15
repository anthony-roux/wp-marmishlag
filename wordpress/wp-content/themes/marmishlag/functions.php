<?php

/**
 * Enqueue scripts.
 */
function marmishlag_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_script( 'jquery' );

	wp_enqueue_style( 'tailpress', marmishlag_get_mix_compiled_asset_url( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', marmishlag_get_mix_compiled_asset_url( 'js/app.js' ), array( 'jquery' ), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'marmishlag_enqueue_scripts' );

/**
 * Get mix compiled asset.
 *
 * @param string $path The path to the asset.
 *
 * @return string
 */
function marmishlag_get_mix_compiled_asset_url( $path ) {
	$path                = '/' . $path;
	$stylesheet_dir_uri  = get_stylesheet_directory_uri();
	$stylesheet_dir_path = get_stylesheet_directory();

	if ( ! file_exists( $stylesheet_dir_path . '/mix-manifest.json' ) ) {
		return $stylesheet_dir_uri . $path;
	}

	$mix_file_path = file_get_contents( $stylesheet_dir_path . '/mix-manifest.json' );
	$manifest      = json_decode( $mix_file_path, true );
	$asset_path    = ! empty( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return $stylesheet_dir_uri . $asset_path;
}

/**
 * Get data from the tailpress.json file.
 *
 * @param mixed $key The key to retrieve.
 *
 * @return mixed|null
 */
function marmishlag_get_data( $key = null ) {
	$config = json_decode( file_get_contents( get_stylesheet_directory() . '/tailpress.json' ), true );

	if ( $key === null ) {
		return filter_var_array( $config, FILTER_SANITIZE_STRING );
	}

	$option = filter_var( $config[ $key ], FILTER_SANITIZE_STRING );

	return $option ?? null;
}

/**
 * Theme setup.
 */
function marmishlag_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	// Adding Thumbnail basic support.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/* Remove adminbar */
	 function wpc_show_admin_bar() {
	 	return false;
	 }
	add_filter('show_admin_bar' , '__return_false');

	// to desactivate gutenberg
	// add_filter('use_block_editor_for_post', '__return_false', 10);



	// Block editor.
	add_theme_support( 'align-wide' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style();

	$tailpress = marmishlag_get_data();

	$colors = array_map(
		function ( $color, $hex ) {
			return array(
				'name'  => ucfirst( $color ),
				'slug'  => $color,
				'color' => $hex,
			);
		},
		array_keys( $tailpress['colors'] ),
		$tailpress['colors']
	);

	$font_sizes = array_map(
		function ( $size, $px ) {
			return array(
				'name' => ucfirst( $size ),
				'size' => $px,
				'slug' => $size,
			);
		},
		array_keys( $tailpress['fontSizes'] ),
		$tailpress['fontSizes']
	);

	add_theme_support( 'editor-color-palette', $colors );
	add_theme_support( 'editor-font-sizes', $font_sizes );
}

add_action( 'after_setup_theme', 'marmishlag_setup' );

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function marmishlag_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'marmishlag_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function marmishlag_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'marmishlag_nav_menu_add_submenu_class', 10, 3 );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Hero Settings',
		'menu_title'	=> 'Hero',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}
register_post_type(
	'recette',
	array(
			'label'     => 'Recettes',
			'labels'    => array(
					'name'                => 'Recettes',
					'singular_name'       => 'Recettes',
					'menu_name'           => 'Recettes',
					'all_items'           => 'All Recettes',
					'view_item'           => 'See all Recette',
					'add_new_item'        => 'Add a Recette',
					'add_new'             => 'Add',
					'edit_item'           => 'Edit the Recette',
					'update_item'         => 'Modify the Recette',
					'search_items'        => 'Search a Recette',
					'not_found'           => 'Non trouvée',
					'not_found_in_trash'  => 'Non trouvée dans la corbeille',
			),
			'menu_icon'           => 'dashicons-calendar-alt',
			'supports'            => array('title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
			'taxonomies' 					=> array('category', 'type_recette'),
			'hierarchical'        => false,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
			'rewrite'             => array( 'slug' => esc_html__('recette')),
	)
);



function create_topics_hierarchical_taxonomy() {

	// Déclaration de la Taxonomie
	$labels_origin = array(
		'name' => 'Origine',
		'new_item_name' => 'Nouvelle Origine',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Origines'),
	);
	
	$args_origin = array( 
		'labels' => $labels_origin,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);

	register_taxonomy( 'origin', 'recette', $args_origin );

	$labels_level = array(
		'name' => 'Niveau de difficulté',
		'new_item_name' => 'Nouveau niveau de difficulté',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Niveaux de difficulté'),
	);
	
	$args_level = array( 
		'labels' => $labels_level,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);

	register_taxonomy( 'level', 'recette', $args_level );

	$labels_cost = array(
		'name' => 'Coût',
		'new_item_name' => 'Nouveau coût',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Coûts'),
	);
	
	$args_cost = array( 
		'labels' => $labels_cost,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);

	register_taxonomy( 'cost', 'recette', $args_cost );

	$labels_setup_time = array(
		'name' => 'Temps de préparation',
		'new_item_name' => 'Nouveau temps de préparation',
		'parent_item' => 'Type de projet parent',
		'menu_name' => __('Temps de préparation'),
	);
	
	$args_setup_time = array( 
		'labels' => $labels_setup_time,
		'public' => true, 
		'show_in_rest' => true,
		'show_admin_column' => true,
		'hierarchical' => true, 
	);

	register_taxonomy( 'setup_time', 'recette', $args_setup_time );
}

add_action('init', 'create_topics_hierarchical_taxonomy', 0);
