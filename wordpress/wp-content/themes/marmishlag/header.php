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


<div id="page" class="overflow-scroll lg:overflow-visible h-screen lg:h-auto relative">


	<header class="header sticky top-0 left-0 transition duration-200 shadow-greyDarkerMedium z-10 bg-white ">
		<nav class="container flex justify-between items-center py-6  ">
			<div class="header__logo min-h-[24px] min-w-max">
				<a href="<?php echo get_bloginfo( 'url' ); ?>">
					<img class="h-16 cursor-pointer" src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="" />
					<?php the_custom_logo(); ?>
				</a>
			</div>
			<div id="header__center" class="flex flex-col-reverse justify-end lg:flex-row translate-x-full lg:translate-x-0 transition-all duration-300 absolute lg:static top-28 left-0 z-50 bg-light lg:bg-transparent w-full lg:w-auto h-screen lg:h-auto p-12 lg:p-0 ">
				<?php	wp_nav_menu(
					array(
						'theme_location'  => 'header',
						'container'       => 'div',
						'container_id'    => '',
						'container_class' => 'lg:flex items-center space-x-10  ',
						'container_aria_label' => '??',
						'menu_id'              => 'header__ul',
						'menu_class'           => 'lg:flex hidden items-center lg:space-x-10 py-12 lg:py-0',
						'li_class'        => 'text-sm hover:text-red-500 transition duration-200 cursor-pointer',
						'fallback_cb'     => false,
						'walker'         => new Mamounette_dropdown_menu
					)
				); ?>
				<form class="header__form mt-6 lg:mt-0 lg:ml-20 lg:mr-8 w-auto" action="/">
					<div class=" relative text-gray-600 w-auto">
						<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg">
						<button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
						</svg>
						</button>
					</div>
				</form>
			</div>

			<div class="flex top justify-end ">
				<div class="flex items-center justify-end w-full">
				
					<div class="w-full lg:w-auto flex items-center justify-end  hover:text-red-500 transition duration-200 cursor-pointer">
						<!-- log in -->
					
						<svg class="h-10 w-10 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C10.8119 19.2 9.64218 18.906 8.59528 18.3441C7.54837 17.7823 6.65678 16.9701 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C17.3432 16.9701 16.4516 17.7823 15.4047 18.3441C14.3578 18.906 13.1881 19.2 12 19.2Z"/>
						</svg>
						<p class="hidden md:flex text-lg">Se connecter</p>
					</div>
						<!-- Log out -->
						<!-- <svg class="h-10 w-10" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.1801 10.94C15.3801 10.5 15.5001 10.02 15.5001 9.5C15.5001 7.57 13.9301 6 12.0001 6C11.4801 6 11.0001 6.12 10.5601 6.32L15.1801 10.94V10.94Z" />
						<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 15C9.68 15 7.55 15.8 5.86 17.12C4.65692 15.6853 3.9983 13.8723 4 12C4 10.15 4.63 8.45 5.69 7.1L8.55 9.96C8.6493 10.7182 8.99626 11.4223 9.53696 11.963C10.0777 12.5037 10.7818 12.8507 11.54 12.95L13.74 15.15C13.17 15.05 12.59 15 12 15V15ZM18.31 16.9L7.1 5.69C8.49686 4.59177 10.2231 3.99639 12 4C16.42 4 20 7.58 20 12C20 13.85 19.37 15.54 18.31 16.9Z" />
						</svg> -->
					
	
				</div>
				<div id="nav-burger" class="ml-3 lg:hidden flex items-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</div>
			</div>
		</nav>
	</header>
 
	<?php      
		if (!is_page_template( array( 'template-account.php'))) {
			$container = 'container';
		} else {
			$container = '';
		}
	?>
	<div id="content" class=" site-content flex-grow <?= $container; ?>
  min-h-[80vh] ">

		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>
		<div class="text-center mx-auto mt-16 mb-10 border-b md:w-2/4 h-[33vh]">
			<h1 class="font-bold text-8xl text-secondary">Mamounette</h1>
			<h2 class="mx-auto text-3xl lg:text-5xl max-w-2xl tracking-tight font-quicksand my-8">Une envie particulière ? Tapez là ! </h2>
			<form class="" action="/">
						<div class="relative text-gray-600 text-lg ">
							<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="w-full bg-light h-14 px-5 pr-10 rounded-full text-lg focus:outline-none rounded-lg placeholder:text-lg focus:text-secondary ">
							<button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
							</svg>
							</button>
						</div>
					</form>
		</div>
		<!-- End introduction -->
		<?php endif; ?>

		<main>
