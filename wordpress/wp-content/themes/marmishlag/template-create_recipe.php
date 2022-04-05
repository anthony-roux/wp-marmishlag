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
    <main role="main" class="w-full px-2 pt-1 sm:w-2/3 md:w-3/4">
      <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
          <div class="relative p-8 bg-white rounded-lg shadow-lg sm:p-12">

            <?php the_content(); ?>
            <form>
                <div class="mb-6">
                  <input
                      type="text"
                      placeholder="Your Name"
                      class="
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary
                      "
                      />
                </div>
                <div class="mb-6">
                  <input
                      type="text"
                      placeholder="Nom de la recette"
                      class="
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary
                      "
                      />
                </div>
                <div class="mb-6">
                  <select class="
                  w-full
                  rounded
                  py-3
                  px-[14px]
                  text-body-color text-base
                  border border-[f0f0f0]
                  outline-none
                  focus-visible:shadow-none
                  focus:border-primary
                  " name="" id="">
                  <option value="" disabled selected>Quelle origine ?</option>

                  <option value="france">France</option>
                  <option value="france">France</option>
                  <option value="thailande">Thaïlande</option>
                  <option value="italy">Italie</option>
                  <option value="mexico">Mexique</option>
                  <option value="spain">Espagne</option>
                  <option value="america">Amérique</option>
                </select>
                </div>
                <div class="mb-6">
                  <textarea
                      rows="6"
                      placeholder="Your Message"
                      class="
                      w-full
                      rounded
                      py-3
                      px-[14px]
                      text-body-color text-base
                      border border-[f0f0f0]
                      resize-none
                      outline-none
                      focus-visible:shadow-none
                      focus:border-primary
                      "
                      ></textarea>
                </div>
                <div>
                  <button
                      type="submit"
                      class="w-full p-3 text-white transition border rounded bg-primary border-primary hover:bg-opacity-90"
                      >
                  Créer ma recette
                  </button>
                </div>
            </form>
          </div>
      </div>
    </main>
  </div>
</div>