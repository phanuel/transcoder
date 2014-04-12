<?php

class Ascii extends CI_Model {
    
    public function __construct() {
    }
    
    public function getSubtitle() {
        return "Convertir du texte en code ASCII.";
    }
    
    public function getMessage() {
        return "Le code ASCII supporte la casse, les accents et les caractères spéciaux.";
    }

    public function transcode($input) {
        if (isset($input)) {
            if (strlen($input) > 0) {
                $input_char = str_split(utf8_decode($input));

                $output = null;

                foreach ($input_char as $char) {
                    $output .= "0x".strtoupper(dechex(ord($char)))." ";
                }

                return $output;
            }
        }
    }
    
}
