<?php get_header(); ?>

<div class="list-articles grid grid-cols-1 lg:grid-cols-2 gap-12 mx-auto mt-12 mb-24 index-page">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/card' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?= mamounettePaginateLinks() ?>


<?php
get_footer();
