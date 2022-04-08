<?php
/**
 * Template Name: Create recipe
 * Template Post Type: page
 */

if (!is_user_logged_in()) {
    wp_redirect(home_url());
}

?>

<?php get_template_part( 'header' ); 
 ?>

<div class="">
  <div class="flex flex-col min-h-screen lg:flex-row">
    <div class="w-full min-h-full px-2 lg:w-1/3 sidebar has-light-background-color">
      <div class="sticky w-full p-4 pl-10 top-28 ">
          <!-- navigation -->
          <div class="my-10">
            <p class="mb-10 sidebar__title text-8xl">Mon compte</p>
            <hr>
          </div>          
          <ul class="flex flex-col mb-10 overflow-hidden">
            <a class="flex sidebar__link" href="/mon-compte">
              <span class="mr-2">🙋🏻‍♂️</span>
              <span>Mon compte</span>
            </a>
            <a class="flex sidebar__link is-active" href="/creer-une-recette">
              <span class="mr-2">✍️</span>
              <span>Créer une recette</span></a>
            <a class="flex sidebar__link" href="/wishlist">
              <span class="mr-2">🍽</span>
              <span>Mes recettes favorites</span> 
            </a>
          </ul>
      </div>
    </div>
    <main role="main" class="flex items-center justify-center w-full px-6 pt-10 lg:px-2 lg:w-3/4">
      <div class="w-full pt-8 lg:pt-0 lg:w-1/2 sm:p-12 ">
        <p class="mb-10 text-6xl ">Créer une recette </p>
          <div class="relative mb-8 bg-white rounded-lg shadow-lg lg:mx-auto">
            <?php the_content(); ?>
          </div>
      </div>
    </main>
  </div>
</div>