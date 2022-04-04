<?php
/**
 * Template Name: My recipes
 * Template Post Type: page
 */
?>

<?php get_template_part( 'header' ); 
 ?>

<div class=" ">
    <div class="flex flex-row min-h-screen">
        <aside class="w-full sm:w-1/3 md:w-1/4 px-2 has-light-background-color min-h-full">
            <div class="sticky top-28 p-4 w-full ">
                <!-- navigation -->
                <p class="text-8xl mb-10">Mon compte</p>
                <ul class="flex flex-col overflow-hidden">
                  <a href="/mon-compte">Mon compte</a>
                  <a href="/creer-une-recette">Créer une recette</a>
                  <a href="/mes-recettes">Mes recettes</a>
                </ul>
            </div>
        </aside>
        <main role="main" class="w-full sm:w-2/3 md:w-3/4 pt-1 px-2">
          <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
            <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">
            </div>
          </div>
        </main>
    </div>
</div>
