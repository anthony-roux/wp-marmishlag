<?php
/**
 * Template Name: Account
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
                    <li>Mon compte</li>
                    <li>Créer une recette</li>
                    <li>Mes recettes</li>
                </ul>
            </div>
        </aside>
        <main role="main" class="w-full sm:w-2/3 md:w-3/4 pt-1 px-2">
          <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
              <div class="bg-white relative rounded-lg p-8 sm:p-12 shadow-lg">

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
                          class="
                          w-full
                          text-white
                          bg-primary
                          rounded
                          border border-primary
                          p-3
                          transition
                          hover:bg-opacity-90
                          "
                          >
                      Créer ma recette
                      </button>
                    </div>
                </form>
                <div>

                </div>
              </div>
          </div>
        </main>
    </div>
</div>



<?php get_footer(); ?>