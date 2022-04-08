<?php
/**
 * Template Name: Login
 * Template Post Type: page
 */
?>


<?php get_header(); ?>

<section class="overflow-hidden">
		<div class="items-center justify-center lg:flex">
			<div class="lg:w-1/2 xl:max-w-screen-sm form__section">
				<div class="px-6 mt-10 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24">
					<div>
						<ul class="flex justify-around nav">
							<li class="text-lg font-semibold text-center signin-active text-dark font-display lg:text-left xl:text-3xl xl:text-bold"><a class="btn">Se connecter</a></li>
							<li class="text-lg font-semibold text-center signup-inactive text-dark font-display lg:text-left xl:text-3xl xl:text-bold"><a class="btn">S'inscrire</a></li>
						</ul>
					</div>
					<div class="mt-12">
						<form class="form-signin" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post" name="form">
							<div>
								<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="text" placeholder="Entrez votre pseudo" name="log">
							</div>
							<div class="mt-8">
								<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="password" placeholder="Entrez votre mot de passe" name="pwd">
								<div>
									<a class="px-5 text-xs font-semibold cursor-pointer font-display text-dark hover:text-indigo-800">
										Mot de passe oublié ?
									</a>
								</div>
							</div>
							<div class="mt-10">
								<button class="w-full p-4 font-semibold tracking-wide rounded-lg rounded-full shadow-lg bg-primary text-light font-display focus:outline-none focus:shadow-outline hover:bg-primary">
									Se connecter
								</button>
							</div>
							<div class="mt-6 text-sm font-semibold text-center text-gray-700 font-display">
								Vous n'avez pas de compte ? <a class="cursor-pointer text-primary hover:text-primary">S'inscrire</a>
							</div>

							<input type="hidden" value="<?php echo esc_attr( "/" ); ?>" name="redirect_to">
							<input type="hidden" value="1" name="testcookie">

						</form>
						<form class="form-signup" action="<?php echo home_url().'/signup'; ?>" method="post" name="form">
							<div>
								<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="" placeholder="Votre pseudo" name="user_login">
							</div>
							<div class="mt-8">

									<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="" placeholder="Votre email" name="user_email">
							</div>
							<div class="mt-8">

								<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="" placeholder="Votre mot de passe" name="user_pass">
							</div>
							<div class="mt-8">
								<input class="w-full px-5 pr-10 text-lg bg-white rounded-lg rounded-full lg:bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" type="" placeholder="Comfirmez le mot de passe" name="user_pass">
								<div class="flex items-center justify-between">
									<div>
										<a class="px-5 text-xs font-semibold cursor-pointer font-display text-dark hover:text-indigo-800">
											Mot de passe oublié ?
										</a>
									</div>
								</div>
							</div>
							<div class="mt-10">
								<button class="w-full p-4 font-semibold tracking-wide rounded-lg rounded-full shadow-lg bg-primary text-light font-display focus:outline-none focus:shadow-outline hover:bg-primary">
									S'inscrire
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>


<?php get_footer(); ?>