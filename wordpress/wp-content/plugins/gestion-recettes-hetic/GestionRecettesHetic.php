<?php
class GestionRecettesHetic {
    private $notif;
    private $post_type;
    private $text_submit;
    private $render;
    private $tax_origins;
    private $tax_levels;
    private $tax_costs;
    private $tax_setup_times;

    public function __construct(string|array $atts) {
        $this->get_variables($this->defaults_shortcode_attributes($atts));
    }

    public function defaults_shortcode_attributes(string|array $atts): array {
        return shortcode_atts([
            'post_type' => "recette",
            'text_submit' => "Ajouter",
            'render' => "form"
        ], $atts);
    }

    public function get_variables(array $attributes): void {
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
                $this->notif = "Validé !";
            }
            if ($_GET['notif'] == "0") {
                $this->notif = "Veuillez remplir tous les champs";
            }
        }
    }

    public function render(): bool|string {
        $url_action = "admin-post.php?url=" . get_post_field('post_name', get_post());
        ob_start();
?>
        <div class="gestion_notif"><?= $this->notif ?></div>
<?php
        if ($this->render == "form") :
?>
        <form method="post" action="<?= admin_url($url_action); ?>" enctype="multipart/form-data">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title"><br><br>
            <label for="content">Content</label><br>
            <input type="text" id="content" name="content"><br><br>
            <label>Origin</label><br>
            <select name="tax_origin">
<?php 
            foreach ($this->tax_origins as $tax_origin) : 
?>
                <option value="<?= $tax_origin->term_id; ?>"><?= $tax_origin->name; ?></option>
<?php 
            endforeach; 
?>
            </select><br><br>
            <label>Level</label><br>
            <select name="tax_level">
<?php 
            foreach ($this->tax_levels as $tax_level) : 
?>
                <option value="<?= $tax_level->term_id; ?>"><?= $tax_level->name; ?></option>
<?php 
            endforeach; 
?>
            </select><br><br>
            <label>Cost</label><br>
            <select name="tax_cost">
<?php 
            foreach ($this->tax_costs as $tax_cost) : 
?>
                <option value="<?= $tax_cost->term_id; ?>"><?= $tax_cost->name; ?></option>
<?php 
            endforeach; 
?>
            </select><br><br>
            <label>Temps de préparation</label><br>
            <select name="tax_setup_time">
<?php 
            foreach ($this->tax_setup_times as $tax_setup_time) : 
?>
                <option value="<?= $tax_setup_time->term_id; ?>"><?= $tax_setup_time->name; ?></option>
<?php 
            endforeach; 
?>
            </select><br><br>
            <input type="file" name="image_upload" id="image_upload" multiple="false"><br><br>

            <input type="hidden" name="action" value="add_recettes">
            <?php wp_nonce_field('image_upload', 'image_upload_nonce'); ?>
            <?php wp_referer_field(); ?>
            <input type="submit" value="<?= $this->text_submit ?>" name="ajouter">
        </form>
<?php
        endif;
        return ob_get_clean();
    }
}
?>