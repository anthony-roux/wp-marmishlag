<?php




class GestionRecettesHetic
{
	private $notif;
	private $post_type;
	private $text_submit;
	private $render;
	private $tax_origins;
	private $tax_levels;
	private $tax_costs;
	private $tax_setup_times;

	public function __construct($atts)
	{
		$this->get_variables($this->defaults_shortcode_attributes($atts));
	}

	public function defaults_shortcode_attributes($atts)
	{
		return shortcode_atts([
			'post_type' => "recette",
			'text_submit' => "Ajouter",
			'render' => "form"
		], $atts);
	}

	public function get_variables($attributes)
	{
		$this->post_type = $attributes['post_type'];
		$this->text_submit = $attributes['text_submit'];
		$this->render = $attributes['render'];
		$this->tax_origins = get_terms([
			'taxonomy' => 'origin',
			'hide_empty' => false
		]);
		$this->tax_levels = get_terms([
			'taxonomy' => 'level',
			'hide_empty' => false
		]);
		$this->tax_costs = get_terms([
			'taxonomy' => 'cost',
			'hide_empty' => false
		]);
		$this->tax_setup_times = get_terms([
			'taxonomy' => 'setup_time',
			'hide_empty' => false
		]);
		$this->notif = "";
		if (isset($_GET['notif'])) {
			if ($_GET['notif'] == "1") {
				$this->notif = '<div class="w-1 p-3 transition bg-green-600 border rounded hover:bg-opacity-90">Recette créée avec succès, celle-ci est attente de validation par un administrateur.</div>';
			}
			if ($_GET['notif'] == "0") {
				$this->notif = '<div class="w-1 p-3 text-red-500 transition bg-green-600 border rounded hover:bg-opacity-90">Veuillez remplir tout les champs.</div>';
			}
		}
	}

	public function render()
	{
		$url_action = "admin-post.php?url=" . get_post_field('post_name', get_post());
		ob_start();
		if ($this->render == "form") :
?>
			<form method="post" action="<?= admin_url($url_action); ?>" enctype="multipart/form-data">
				<div class="mb-6">
				<label class="" for="title">Nom de la recette</label>
					<input name="title" type="text" placeholder="Tartiflette" class="w-full px-5 pr-10 mt-3 text-lg rounded placeholder-dark bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary active:text-secondary" />
				</div>
				<div class="mb-6">
				<label for="tax_origin">Choisir l'origine de la recette<label>
					<select name="tax_origin" class="w-full px-5 pr-10 mt-3 text-lg rounded bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary">
						<?php
						foreach ($this->tax_origins as $tax_origin) :
						?>
							<option value="<?= $tax_origin->term_id; ?>"><?= $tax_origin->name; ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="mb-6">
				<label for="tax_level">Choisir un niveau de difficulté<label>
					<select name="tax_level" class="w-full px-5 pr-10 mt-3 text-lg rounded bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" id="">
						<?php
						foreach ($this->tax_levels as $tax_level) :
						?>
							<option value="<?= $tax_level->term_id; ?>"><?= $tax_level->name; ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="mb-6">
					<label for="tax_cost">Le budget à prévoir <label>
					<select name="tax_cost" class="w-full px-5 pr-10 mt-3 text-lg rounded bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary">
						<?php
						foreach ($this->tax_costs as $tax_cost) :
						?>
							<option value="<?= $tax_cost->term_id; ?>"><?= $tax_cost->name; ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="mb-6">
					<label class="" for="tax_setup_time">Choisir un temps de préparation</label>
					<select name="tax_setup_time" class="w-full px-5 pr-10 my-4 mt-3 text-lg rounded bg-light h-14 placeholder:text-lg focus:outline-none focus:text-secondary" id="">
						<?php
						foreach ($this->tax_setup_times as $tax_setup_time) :
						?>
							<option value="<?= $tax_setup_time->term_id; ?>"><?= $tax_setup_time->name; ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="mb-6">
				<label class="" for="content">Le descriptif de la recette</label>
					<textarea name="content" rows="6" placeholder="ÉTAPE 1 : Eplucher les pommes de terre, les couper en dés, bien les rincer et les essuyer dans un torchon propre...." class="w-full px-6 py-6 mt-3 text-lg rounded bg-light placeholder:text-lg focus:outline-none focus:text-secondary "></textarea>
				</div>
				<div class="mb-6">
					<label class="block mb-4 text-sm font-medium text-dark " for="image_upload">Ajoutez une photo de ma recette</label>
					<input type="file" name="image_upload" id="image_upload" multiple="false" class="block w-full m-4 text-sm border rounded cursor-pointer border-light text-dark bg-light focus:outline-none focus:border-transparent" aria-describedby="image_upload_help">
					<div class="pl-4 mt-2 text-sm text-dark" id="image_upload_help">Choisissez une photo de votre recette la plus représentative.</div>
				</div>
				<input type="hidden" name="action" value="add_recettes">
				<?php wp_nonce_field('image_upload', 'image_upload_nonce'); ?>
				<?php wp_referer_field(); ?>
				<input type="submit" class="w-full p-3 text-white transition border rounded cursor-pointer bg-primary border-primary hover:border-primary-light hover:bg-primary-light" value="<?= $this->text_submit ?>" name="ajouter" />
			</form>
			<br>
			<?= $this->notif ?>
<?php
		endif;
		return ob_get_clean();
	}
}
?>