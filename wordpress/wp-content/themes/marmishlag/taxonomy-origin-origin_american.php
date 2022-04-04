

<?php get_header(); 
?>

<h1 class="text-9xl mt-16 mb-32">Bienvenue en Amérique </h1>

<div class="list-articles mt-12 mb-24 grid grid-cols-1 lg:grid-cols-2 gap-12">
<?php
  
  $loop = new WP_Query(array(
    'post_type'  => array('recette'),
    'tax_query' => array(
      array(
        'taxonomy' => 'origin',
        'field' => 'slug',
        'terms' => 'origin_american' // you need to know the term_id of your term "example 1"
         )
    )    
  
  ));

  if ( $loop->have_posts() ) :

    /* Start the Loop */
    while ( $loop->have_posts() ) :
      $loop->the_post();

      get_template_part( 'template-parts/card', get_post_type() );

    endwhile;

  else :

    get_template_part( 'template-parts/content', 'none' );

  endif;
?>

</div>

<?php get_footer(); ?>