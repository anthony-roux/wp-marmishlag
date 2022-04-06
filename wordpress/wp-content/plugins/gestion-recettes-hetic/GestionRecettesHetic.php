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
                $this->notif = "Recette crée avec succès !";
            }
            if ($_GET['notif'] == "0") {
                $this->notif = "Veuillez remplir tous les champs";
            }
        }
    }

    public function render(): bool|string {
        $url_action = "admin-post.php?url=" . get_permalink();
        ob_start();
?>
<?php
        if ($this->render == "form") :
?>   

        <form method="post" action="<?= admin_url($url_action); ?>">
            <div class="mb-6">
                <input
                    name="title"
                    type="text"
                    placeholder="Nom de recettes"
                    class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg"
                />
            </div>
            <div class="mb-6">
                <select 
                name="tax_origin"
                class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg"
                id="">
                <option value="" disabled selected>Quelle origine ?</option>
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
                <select 
                name="tax_level"
                class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg"
                id="">
                <option value="" disabled selected>Quelle difficulté ?</option>
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
                <select 
                name="tax_cost"
                class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg"
                id="">
                <option value="" disabled selected>Quelle couts ?</option>
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
                <select 
                name="tax_setup_time"
                class="w-full bg-white lg:bg-light  h-14 px-5 pr-10 rounded-full text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded-lg"
                id="">
                <option value="" disabled selected>Quelle Temps de préparation ?</option>
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
                <textarea
                    name="content"
                    rows="6"
                    placeholder="Your Message"
                    class="w-full px-5 pr-10  bg-white lg:bg-light text-lg placeholder:text-lg focus:outline-none focus:text-secondary rounded"
                ></textarea>
            </div>
            <input type="hidden" name="action" value="add_recettes">
            <input  
                type="submit" 
                class="w-full p-3 text-white transition border rounded bg-primary border-primary hover:bg-opacity-90"
                value="<?= $this->text_submit ?>" 
                name="ajouter"
            >
        </form>
        <br>
        <div class="w-1 p-3 transition border rounded bg-green-600 hover:bg-opacity-90"><?= $this->notif ?></div>
<?php
        endif;
        return ob_get_clean();
    }
}
?>