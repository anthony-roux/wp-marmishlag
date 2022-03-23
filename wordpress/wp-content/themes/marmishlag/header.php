<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>


<div id="page" class="min-h-screen flex flex-col">


	<header class="header sticky top-0 left-0 transition duration-200 shadow-greyDarkerMedium ">
		<nav class="container flex justify-between items-center bg-white py-6  ">
			<div class="">
				<a href="<?php echo get_bloginfo( 'url' ); ?>">
					<img class="h-16 cursor-pointer" src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="" />
					<?php the_custom_logo(); ?>
				</a>
			</div>
			<div class="md:w-5/12">
				<?php	wp_nav_menu(
					array(
						'theme_location'  => 'header',
						'container'       => 'div',
						'container_id'    => 'header',
						'container_class' => 'lg:flex hidden items-center space-x-10',
						'container_aria_label' => '??',
						'menu_id'              => 'header__ul',
						'menu_class'           => 'lg:flex hidden items-center space-x-10',
						'li_class'        => ' text-sm hover:text-red-500 transition duration-200 cursor-pointer',
						'fallback_cb'     => false,
						'walker'         => new Mamounette_dropdown_menu
					)
				); ?>

			</div>

			<div class="flex md:w-5/12 lg:w-4/12 justify-end">
				<div class="flex items-center justify-end w-full">
					<form class="mr-6 w-full" action="/">
						<div class="relative text-gray-600  ">
							<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="w-full bg-light h-14 px-5 pr-10 rounded-full text-sm focus:outline-none rounded-lg">
							<button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
							</svg>
							</button>
						</div>
					</form>
				
					<div class="w-full lg:w-6/12 flex items-center justify-end  hover:text-red-500 transition duration-200 cursor-pointer">
						<!-- log in -->
					
						<svg class="h-10 w-10" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C10.8119 19.2 9.64218 18.906 8.59528 18.3441C7.54837 17.7823 6.65678 16.9701 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C17.3432 16.9701 16.4516 17.7823 15.4047 18.3441C14.3578 18.906 13.1881 19.2 12 19.2Z"/>
						</svg>
						<p class="hidden md:flex">Se connecter</p>
					</div>
						<!-- Log out -->
						<!-- <svg class="h-10 w-10" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.1801 10.94C15.3801 10.5 15.5001 10.02 15.5001 9.5C15.5001 7.57 13.9301 6 12.0001 6C11.4801 6 11.0001 6.12 10.5601 6.32L15.1801 10.94V10.94Z" />
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 15C9.68 15 7.55 15.8 5.86 17.12C4.65692 15.6853 3.9983 13.8723 4 12C4 10.15 4.63 8.45 5.69 7.1L8.55 9.96C8.6493 10.7182 8.99626 11.4223 9.53696 11.963C10.0777 12.5037 10.7818 12.8507 11.54 12.95L13.74 15.15C13.17 15.05 12.59 15 12 15V15ZM18.31 16.9L7.1 5.69C8.49686 4.59177 10.2231 3.99639 12 4C16.42 4 20 7.58 20 12C20 13.85 19.37 15.54 18.31 16.9Z" />
						</svg> -->
					
	
				</div>
				<div class="ml-3 lg:hidden">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</div>
			</div>
		</nav>




	</header>

	<div id="content" class="container site-content flex-grow">

		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>
		<div class="container mx-auto my-12 border-b pb-12 ">
			<h1 class="font-bold text-8xl text-secondary roun ">Mamounette</h1>
			<h2 class="text-3xl lg:text-5xl max-w-2xl tracking-tight font-quicksand my-8">Labore dolor aliquip sit aliquip quis commodo reprehenderit.</h2>
			<p class="max-w-screen-lg text-gray-700 text-lg font-medium mb-10">Nostrud officia magna id exercitation consequat.Elit consectetur ipsum occaecat et et.Exercitation ipsum deserunt incididunt sit adipisicing cillum.</p>
			<a href="https://github.com/jeffreyvr/tailpress" class="w-full sm:w-auto flex-none bg-primary rounded-lg text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200">Découvrir les recettes</a>
		</div>
		<!-- End introduction -->
		<?php endif; ?>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
