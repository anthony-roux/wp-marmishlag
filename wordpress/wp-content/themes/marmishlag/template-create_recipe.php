<?php
/**
 * Template Name: Create recipe
 * Template Post Type: page
 */
?>

<?php get_template_part( 'header' ); 
 ?>

<div class="">
  <div class="flex flex-row min-h-screen">
    <div class="w-full min-h-full px-2 sidebar sm:w-1/3 md:w-1/4 has-light-background-color">
      <div class="sticky w-full p-4 top-28 ">
          <!-- navigation -->
          <div class="my-10">
            <p class="mb-10 sidebar__title text-8xl">Mon compte</p>
            <hr>
          </div>          
          <ul class="flex flex-col overflow-hidden">
            <a class="flex sidebar__link" href="/mon-compte">
              <span class="mr-2">🙋🏻‍♂️</span>
              <span>Mon compte</span>
            </a>
            <a class="flex sidebar__link is-active" href="/creer-une-recette">
              <span class="mr-2">✍️</span>
              <span>Créer une recette</span></a>
            <a class="flex sidebar__link" href="/mes-recettes">
              <span class="mr-2">🍽</span>
              <span>Mes recettes</span> 
            </a>
          </ul>
      </div>
    </div>
    <main role="main" class="w-full px-2 pt-1 sm:w-2/3 md:w-3/4 flex justify-center items-center">
      <div class="w-full lg:w-1/2">
        <h1 class="text-6xl text-center">Créer une recette !</h1>
          <div class="relative bg-white rounded-lg shadow-lg sm:p-12">
            <?php the_content(); ?>
          </div>
      </div>
    </main>
  </div>
</div>