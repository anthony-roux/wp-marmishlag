<?php get_header(); ?>

<div class="list-articles flex justify-around flex-wrap mx-auto mt-12 mb-24 index-page">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/card' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();
