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

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="header sticky top-0 left-0 transition duration-200 shadow-greyDarkerMedium ">
		<nav class="flex justify-between items-center bg-white py-6 lg:px-40 md:px-20 px-10 ">
			<div class="">
			<a href="<?php echo get_bloginfo( 'url' ); ?>">
				<img class="h-16 cursor-pointer" src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="" />
				<?php the_custom_logo(); ?>
					</a>
			</div>
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

				<ul class="lg:flex hidden items-center font-medium space-x-10">
				
				<li class="hover:text-red-500 transition duration-200 cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
				</svg>
				</li>
				<li class="hover:text-red-500 transition duration-200 cursor-pointer">
					<form class="" action="/">
						<div class="relative text-gray-600 ">
							<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="bg-light h-10 px-5 pr-10 rounded-full text-sm focus:outline-none rounded-lg">
							<button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
							</svg>
							</button>
						</div>
					</form>
				</li>
			</ul>
			<div class="lg:hidden">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
			</div>
		</nav>




	</header>

	<div id="content" class="site-content flex-grow">

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
