<?php

/**
 * Template Name: Account
 * Template Post Type: page
 */


if (!is_user_logged_in()) {
  wp_redirect(home_url());
}

?>
<?php get_template_part('header');
?>

<div class="">
  <div class="flex flex-col min-h-screen lg:flex-row">
    <div class="w-full min-h-full px-2 sidebar sm:w-1/3 md:w-1/4 has-light-background-color">
      <div class="sticky w-full p-4 pl-10 top-28 ">
        <!-- navigation -->
        <div class="my-10">
          <p class="mb-10 font-bold sidebar__title text-8xl">Mon compte</p>
          <hr>
        </div>
        <ul class="flex flex-col mb-10 overflow-hidden">
          <a class="flex sidebar__link is-active" href="/mon-compte">
            <span class="mr-2">🙋🏻‍♂️</span>
            <span>Mon compte</span>
          </a>
          <a class="flex sidebar__link" href="/creer-une-recette">
            <span class="mr-2">✍️</span>
            <span>Créer une recette</span></a>
          <a class="flex sidebar__link" href="/wishlist">
            <span class="mr-2">🍽</span>
            <span>Mes recettes favorites </span>
          </a>
        </ul>
      </div>
    </div>
    <main role="main" class="flex justify-center w-full px-6 lg:px-2 lg:w-3/4">
      <div class="w-full">
        <div class="relative p-8 bg-white rounded-lg shadow-lg">
          <p class="my-10 text-6xl font-semibold sidebar__title username text-primary">
            <?php if (is_user_logged_in()) echo 'Bonjour ' . wp_get_current_user()->user_login ?>
          </p>

          <p class="flex items-center text-lg username">
            <img class="w-12 h-12 mr-3 rounded-xl" src="<?php echo esc_url( get_avatar_url( get_current_user_id() ) ); ?>" />
            <?= wp_get_current_user()->user_firstname .' '. wp_get_current_user()->user_lastname ?>
          </p>
          <hr>
          <p class="username">
            <span class="text-grey">Pseudo : </span>
            <span class="text-lg"><?= wp_get_current_user()->display_name ?></span>
          </p>
          <hr>
          <p class="username">
           <span class="text-grey">Mon adresse e-mail :  </span>
           <span class="text-lg"><?= wp_get_current_user()->user_email ?></span>
          </p>
          <hr>
          <p class="username">
            <span class="text-grey">Membre depuis : </span>
            <span class="text-lg"> <?= date( "d M Y", strtotime( wp_get_current_user()->user_registered ) ) ?></span>
           
          </p>
          <hr>
        </div>
      </div>
    </main>
  </div>
</div>