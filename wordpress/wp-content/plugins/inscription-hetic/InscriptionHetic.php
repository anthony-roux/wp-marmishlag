<?php
class InscriptionHetic {
    private $notif;
    private $render;
    private $submit;

    public function __construct(string|array $atts) {
        $this->inscription($this->defaults_attributes($atts));
    }

    public function defaults_attributes(string|array $atts): array {
        return shortcode_atts([
            'role' => "editor",
            'render' => "",
            'submit' => "S'inscrire"
        ], $atts);
    }

    public function inscription(array $attributes): void {
        $this->notif = "";
        $this->render = $attributes['render'];
        $this->submit = $attributes['submit'];
    }

    public function render(): bool|string {
        ob_start();
?>
        <div class="inscription_notif"><?= $this->notif ?></div>
<?php
        if ($this->render == "form") :
?>
        <form action="">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="<?= $this->submit ?>" name="inscription">
        </form>
<?php
        endif;
        return ob_get_clean();
    }
}
?>