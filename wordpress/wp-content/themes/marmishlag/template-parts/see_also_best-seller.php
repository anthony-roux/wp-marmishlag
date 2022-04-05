<?php
/**
 * Template part for displaying the 3 last posts
 *
 */

 $categories = get_the_category(); ?>

<div class="mt-12 mb-24 see_also ">
	<div class='text-5xl see_also_title'>
		Nos best-seller
		<hr>
	</div>
	<div class="see_also_cards">
		<div class="grid grid-cols-1 gap-12 mx-auto my-10 lg:grid-cols-3 list-articles">
			<?php

				$loop = new WP_Query(array(
					'post_type'              => array( 'recette'),
					'category_name'  				 => 'best-seller',			
					'nopaging'               => false,
					'posts_per_page'         => '3',
					'ignore_sticky_posts'    => false,
					'post__not_in'           => array(get_the_ID())

				));


				if ( $loop->have_posts() ) :

					/* Start the Loop */
					while ( $loop->have_posts() ) :
						$loop->the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/card-mini' );

					endwhile;


				else :

				endif;
			?>
		</div>			
	</div>
</div>
