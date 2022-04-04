<?php
/**
 * Plugin Name: Gestion Recettes Hetic
 * Author: Davy CHEN
 * Description: Gestion simple avec shortcode : [gestionrecetteshetic post_type="recette" submit="Ajouter"]
 * Author URI: https://davy-chen.fr
 */

add_shortcode('gestionrecetteshetic', 'gestion_recettes_hetic');
add_action('init', 'register_post_type_recette');

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
?>