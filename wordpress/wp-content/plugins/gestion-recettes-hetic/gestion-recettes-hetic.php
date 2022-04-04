<?php
/**
 * Plugin Name: Gestion Recettes Hetic
 * Author: Davy CHEN
 * Description: Gestion simple avec shortcode : [gestionrecetteshetic post_type="recette" text_submit="Ajouter" render="form"]
 * Author URI: https://davy-chen.fr
 */

add_shortcode('gestionrecetteshetic', 'gestion_recettes_hetic');
add_action('init', 'register_post_type_recette');
add_action('init', 'register_taxonomy_recette');
add_action('init', 'gestion_recettes');

function gestion_recettes() {
	if (isset($_POST['ajouter_recette'])) {
		if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['tax_origin']) && isset($_POST['tax_level']) && isset($_POST['tax_cost']) && isset($_POST['tax_setup_time'])) {
			wp_insert_post([
				'post_title' => $_POST['title'],
				'post_content' => $_POST['content'],
				'post_type' => 'recette',
				'post_status' => 'pending',
				'post_author' => get_current_user_id(),
				'comment_status' => 'closed',
				'tax_input' => array(
					'origin' => array($_POST['tax_origin']),
					'level' => array($_POST['tax_level']),
					'cost' => array($_POST['tax_cost']),
					'setup_time' => array($_POST['tax_setup_time'])
				)
			]);
			$notif = "Validé !";
		}
		else {
			$notif = "Champs";
		}
	}
}

function gestion_recettes_hetic($atts) {
    require_once 'GestionRecettesHetic.php';
    $GestionRecettesHetic = new GestionRecettesHetic($atts);
    return $GestionRecettesHetic->render();
}

function register_post_type_recette() {
    $labels = [
        'name' => 'Recettes',
        'singular_name' => 'Recettes',
        'menu_name' => 'Recettes',
        'all_items' => 'All Recettes',
        'view_item' => 'See all Recette',
        'add_new_item' => 'Add a Recette',
        'add_new' => 'Add',
        'edit_item' => 'Edit the Recette',
        'update_item' => 'Modify the Recette',
        'search_items' => 'Search a Recette',
        'not_found' => 'Non trouvée',
        'not_found_in_trash' => 'Non trouvée dans la corbeille'
    ];
    $args = [
        'label' => 'Recettes',
        'labels' => $labels,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'custom-fields', 'page-attributes'),
        'taxonomies' => array('category', 'type_recette'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => esc_html__('recette'))
    ];
    register_post_type('recette', $args);
}

function register_taxonomy_recette() {
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
	register_taxonomy('origin', 'recette', $args_origin);

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
	register_taxonomy('level', 'recette', $args_level);

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
	register_taxonomy('cost', 'recette', $args_cost);

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
	register_taxonomy('setup_time', 'recette', $args_setup_time);
}

?>