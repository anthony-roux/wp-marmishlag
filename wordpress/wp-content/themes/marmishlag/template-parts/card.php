<?php 
$taxonomies = get_the_terms(get_the_ID(), 'origin'); 

if($taxonomies) {
  $taxonomy = $taxonomies[0]->name;
  } else {
  $taxonomy = "";
}

$top_restaurant = get_field('top_restaurant');
$grade = get_field('grade');

?>


 

<?php 

if ( has_post_thumbnail() ) { ?>
<article  class="c-card w-full md:max-w-[45%] shadow-greyDarkerMedium rounded-md my-6 md:mx-6" > 

<?php } else { ?>
  <article  class="c-card" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pizza.jpg');"> 
<?php } ?>

  <a href="<?php esc_url( the_permalink() ) ?>" id="post-<?php the_ID(); ?>"  class="flex w-full">

    <?php if(get_field('top_restaurant') == 1): ?>
      <img class="topicon" src="<?php echo get_template_directory_uri(); ?>/img/incontournable.svg" alt="Top restaurant">
    <?php endif; ?>

    <div class="relative w-2/4 md:h-[20rem] bg-cover bg-center rounded-md" style="background-image: url('<?= the_post_thumbnail_url('listing-card') ?>'); ">
      <div class="s-like-badge rounded-xl w-16 h-16 shadow absolute -top-8 -right-8 overflow-hidden flex items-center justify-center cursor-pointer">
        <input type="checkbox" name="like-badge-<?php the_ID(); ?>" data-state="<?php if(get_field('top_restaurant') == "checked"): ?>  <?php endif; ?>" id="like-badge-<?php the_ID(); ?>" class="appearance-none" >
        <label for="like-badge-<?php the_ID(); ?>" class="w-16 h-16">
          <div class=" rounded-xl p-3 ">
            <svg width="24" height="24" viewBox="0 0 48 48" fill="none" class="" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 8C8.925 8 4 12.925 4 19C4 30 17 40 24 42.326C31 40 44 30 44 19C44 12.925 39.075 8 33 8C29.28 8 25.99 9.847 24 12.674C22.9857 11.2292 21.6382 10.0501 20.0715 9.23649C18.5049 8.42289 16.7653 7.99875 15 8Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </label>


      </div>
    </div>
  
    <div class="px-8 py-6 w-2/4 md:min-w-2/4">
      <p class="card__category"><?php echo $taxonomy;?></p>
      <div class="card__line"></div>
      <h3 class="card__title text-4xl"><?php the_title(); ?></h3>

      <?php if(get_field('grade') == '1star') { ?>
      <img src="<?php echo get_template_directory_uri(); ?>/img/1star.svg" alt="1 etoile">

      <?php } else if(get_field('grade') == '2stars') { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/2stars.svg" alt="2 etoiles">

      <?php } else if(get_field('grade') == '3stars') { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/3stars.svg" alt="3 etoiles">

      <?php } else if(get_field('grade') == '4stars') { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/4stars.svg" alt="4 etoiles">

      <?php } else if(get_field('grade') == '5stars') { ?>

        <img src="<?php echo get_template_directory_uri(); ?>/img/5stars.svg" alt="5 etoiles">

      <?php }; ?> 
    </div>
  </a>
  </article>


