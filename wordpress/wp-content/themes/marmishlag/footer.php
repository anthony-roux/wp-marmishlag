
</main>

</div>

<footer id="colophon" class="site-footer bg-light py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
	<div class="container  p-8">
    <div class="sm:flex mb-4">
			<div class="sm:w-1/4 h-auto">
				<div class="text-primary mb-2 t-text--lg">Lorem Ipsum</div>
				<ul class="list-reset leading-normal">
						<li class="text-lg hover:text-secondary text-dark">One</li>
						<li class="text-lg hover:text-secondary text-dark">Two</li>
						<li class="text-lg hover:text-secondary text-dark">Three</li>
						<li class="text-lg hover:text-secondary text-dark">Four</li>
						<li class="text-lg hover:text-secondary text-dark">Five</li>
						<li class="text-lg hover:text-secondary text-dark">Six</li>
						<li class="text-lg hover:text-secondary text-dark">Seven</li>
						<li class="text-lg hover:text-secondary text-dark">Eight</li>
				</ul>
			</div>
		<div class="sm:w-1/4 h-auto sm:mt-0 mt-8">
			<div class="text-primary mb-2 t-text--lg">Lorem Ipsum</div>
			<ul class="list-reset leading-normal">
				<li class="text-lg hover:text-secondary text-dark">One</li>
				<li class="text-lg hover:text-secondary text-dark">Two</li>
				<li class="text-lg hover:text-secondary text-dark">Three</li>
			</ul>

			<div class="text-primary mb-2 mt-4 t-text--lg">Lorem Ipsum</div>
			<ul class="list-reset leading-normal">
				<li class="text-lg hover:text-secondary text-dark">One</li>
				<li class="text-lg hover:text-secondary text-dark">Two</li>
				<li class="text-lg hover:text-secondary text-dark">Three</li>
			</ul>
			</div>
			<div class="sm:w-1/4 h-auto sm:mt-0 mt-8">
				<div class="text-primary mb-2 t-text--lg">Lorem Ipsum</div>
				<ul class="list-reset leading-normal">
					<li class="text-lg hover:text-secondary text-dark">One</li>
					<li class="text-lg hover:text-secondary text-dark">Two</li>
					<li class="text-lg hover:text-secondary text-dark">Three</li>
				</ul>
				<div class="text-primary mb-2 mt-4 t-text--lg">Lorem Ipsum</div>
				<ul class="list-reset leading-normal">
					<li class="text-lg hover:text-secondary text-dark ">One</li>
					<li class="text-lg hover:text-secondary text-dark ">Two</li>
					<li class="text-lg hover:text-secondary text-dark ">Three</li>
				</ul>
			</div>
    	<div class="sm:w-1/2 sm:mt-0 mt-8 h-auto">
				<div class="text-primary mb-2 t-title--lg">Newsletter</div>
				<p class="text-lg text-dark leading-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, consectetur. </p>
				<div class="mt-4 flex">
					<input type="text" class="p-2 border border-grey-light round text-grey-dark text-sm h-auto" placeholder="Your email address">
					<button class="bg-secondary text-white rounded-sm h-auto text-lg   p-3">Subscribe</button>
				</div>
    	</div>

		</div>
	</div>
	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
	</div>

</footer>



</div>

<?php wp_footer(); ?>

</body>
</html>
