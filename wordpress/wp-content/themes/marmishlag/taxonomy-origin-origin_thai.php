

<?php get_header(); 
?>

<h1 class="text-9xl mt-32 mb-32">Bienvenue en Thaïlande </h1>

<div class="list-articles mt-12 mb-24 flex justify-around flex-wrap">
<?php
  
  $loop = new WP_Query(array(
    'post_type'  => array('recette'),
    'tax_query' => array(
      array(
        'taxonomy' => 'origin',
        'field' => 'slug',
        'terms' => 'origin_thai' // you need to know the term_id of your term "example 1"
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