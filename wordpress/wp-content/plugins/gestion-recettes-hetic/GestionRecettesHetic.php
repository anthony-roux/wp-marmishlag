<?php
class GestionRecettesHetic {
    private $notif;
    private $post_type;
    private $submit;

    public function __construct(string|array $atts) {
        $this->gestion($this->defaults_attributes($atts));
    }

    public function defaults_attributes(string|array $atts): array {
        return shortcode_atts([
            'post_type' => "recette",
            'submit' => "Ajouter"
        ], $atts);
    }

    public function gestion(array $attributes): void {
        $this->notif = "";
        $this->post_type = $attributes['post_type'];
        $this->submit = $attributes['submit'];
        
        if (isset($_POST['ajouter'])) {
            if (isset($_POST['title']) && isset($_POST['content'])) {
                wp_insert_post([
                    'post_title' => $_POST['title'],
                    'post_content' => $_POST['content'],
                    'post_type' => $this->post_type,
                    'post_status' => 'pending',
                    'post_author' => get_current_user_id(),
                    'comment_status' => 'closed'
                ]);
                $this->notif = "Validé !";
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
        <form method="post">
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title"><br><br>
            <label for="content">Content</label><br>
            <input type="text" id="content" name="content"><br><br>
            <input type="submit" value="<?= $this->submit ?>" name="ajouter">
        </form>
<?php
        return ob_get_clean();
    }
}
?>