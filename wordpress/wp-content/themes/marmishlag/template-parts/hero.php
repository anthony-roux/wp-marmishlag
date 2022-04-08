<!-- Start introduction -->
<?php if (is_front_page()) : ?>
	<div class="pt-32 pb-20 mx-auto mb-10 text-center hero md:w-2/4">
		<h1 class="font-bold text-8xl text-secondary">Mamounette 👩🏽‍🍳</h1>
		<h2 class="max-w-2xl mx-auto my-8 text-3xl tracking-tight lg:text-5xl font-quicksand">Une envie particulière ? Tapez là ! </h2>
		<form class="mb-6" action="/">
			<div class="relative text-lg text-gray-600 ">
				<input type="search" aria-label="Search" name="s" value="<?= get_search_query() ?>" placeholder="Search" class="w-full px-5 pr-10 text-lg rounded-lg rounded-full bg-light h-14 focus:outline-none placeholder:text-lg focus:text-secondary ">
				<button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
					</svg>
				</button>
			</div>
		</form>



		<?php if (is_user_logged_in()) { ?>
			<div class="my-10">


				<a href="/creer-une-recette/" class="px-6 py-3 pb-4 mt-10 text-xl font-bold text-white rounded-lg pb- bg-primary hover:bg-primary-light">Ajouter une recette</a>
			</div>
		<?	} else { ?>
			<div class="my-10">
				<a href="/login" class="px-6 py-3 pb-4 text-xl font-bold text-white rounded-lg bg-primary hover:bg-primary-light">Ajouter une recette</a>
			</div>

		<?	} ?>
	</div>
	<!-- End introduction -->
<?php endif; ?>