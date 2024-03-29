<?php
    class ColorPicker {
        var $colors, $bg_color;
        public function __construct() {
            $colorfile = fopen("goodcolors.txt", "r");
            $this->colors = explode("\n", fread($colorfile, filesize("goodcolors.txt")));
            fclose($colorfile);
            $this->bg_color = array();
        }
        public function get_background_color($id) {
            // random color with seed id
            if (gettype($id) == "string") {
                mt_srand(crc32($id));
            } else {
                mt_srand($id);
            }
            $rand_key = mt_rand(0, sizeof($this->colors));
            if (array_key_exists($id, $this->bg_color)) {
                return $this->bg_color[$id];
            }
            $rand_color = $this->colors[$rand_key];
            unset($this->colors[$rand_key]);
            $this->colors = array_values($this->colors);
            $this->bg_color[$id] = $rand_color;
            return $rand_color;
        }
        public function get_text_color($bg_color) {
            $rgb = sscanf($bg_color, "#%02x%02x%02x");
            foreach ($rgb as &$c) {
                $c /= 255.0;
                if ($c <= 0.03928) {
                    $c /= 12.92;
                } else {
                    $c = pow(($c + 0.055) / 1.055, 2.4);
                }
            }
            $L = 0.2126 * $rgb[0] + 0.7152 * $rgb[1] + 0.0722 * $rgb[2];
            return ($L > 0.179 ? "#000000" : "#ffffff");
        }
    }
?>