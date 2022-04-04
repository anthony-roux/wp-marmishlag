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
        $this->gestion($this->defaults_attributes($atts));
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
    }

    public function defaults_attributes(string|array $atts): array {
        return shortcode_atts([
            'post_type' => "recette",
            'text_submit' => "Ajouter",
            'render' => "form"
        ], $atts);
    }

    public function gestion(array $attributes): void {
        $this->notif = "";
        $this->post_type = $attributes['post_type'];
        $this->text_submit = $attributes['text_submit'];
        $this->render = $attributes['render'];
        
        if (isset($_POST['ajouter'])) {
            if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['tax_origin']) && isset($_POST['tax_level']) && isset($_POST['tax_cost']) && isset($_POST['tax_setup_time'])) {
                wp_insert_post([
                    'post_title' => $_POST['title'],
                    'post_content' => $_POST['content'],
                    'post_type' => $this->post_type,
                    'post_status' => 'pending',
                    'post_author' => get_current_user_id(),
                    'comment_status' => 'closed',
                    'tax_input' => array(
                        'origin' => array($_POST['tax_origin']),
                        'level' => array($_POST['tax_level']),
                        'cost' => array($_POST['tax_cost']),
                        'setup_time' => array($_POST['tax_setup_time'])
                    )
                ]);
                $this->notif = "Recette envoyée !";
            }
            else {
                $this->notif = "Champs";
            }
        }
    }

    public function render(): bool|string {
        // global $wpdb;
        
        // $table_name = "wp_posts";
        // $results = $wpdb->get_results("SELECT * FROM $table_name");
        // if (!empty($results)) {
        //     print_r($results);
        // }

        ob_start();
?>
        <div class="gestion_notif"><?= $this->notif ?></div>
<?php
        if ($this->render == "form") :
?>
        <form method="post">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title"><br><br>
            <label for="content">Content</label><br>
            <input type="text" id="content" name="content"><br><br>
            <label>Origin</label><br>
            <select name="tax_origin">
<?php foreach ($this->tax_origins as $tax_origin) : ?>
                <option value="<?= $tax_origin->term_id; ?>"><?= $tax_origin->name; ?></option>
<?php endforeach; ?>
            </select><br><br>
            <label>Level</label><br>
            <select name="tax_level">
<?php foreach ($this->tax_levels as $tax_level) : ?>
                <option value="<?= $tax_level->term_id; ?>"><?= $tax_level->name; ?></option>
<?php endforeach; ?>
            </select><br><br>
            <label>Cost</label><br>
            <select name="tax_cost">
<?php foreach ($this->tax_costs as $tax_cost) : ?>
                <option value="<?= $tax_cost->term_id; ?>"><?= $tax_cost->name; ?></option>
<?php endforeach; ?>
            </select><br><br>
            <label>Temps de préparation</label><br>
            <select name="tax_setup_time">
<?php foreach ($this->tax_setup_times as $tax_setup_time) : ?>
                <option value="<?= $tax_setup_time->term_id; ?>"><?= $tax_setup_time->name; ?></option>
<?php endforeach; ?>
            </select><br><br>
            <input type="submit" value="<?= $this->text_submit ?>" name="ajouter">
        </form>
<?php
        endif;
        return ob_get_clean();
    }
}
?>