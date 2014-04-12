<?php

class Sixbit extends CI_Model {
    
    private $trad = array("A"=>"33","B"=>"34","C"=>"35","D"=>"36","E"=>"37","F"=>"38","G"=>"39","H"=>"40","I"=>"41","J"=>"42","K"=>"43","L"=>"44","M"=>"45","N"=>"46","O"=>"47","P"=>"48","Q"=>"49","R"=>"50","S"=>"51","T"=>"52","U"=>"53","V"=>"54","W"=>"55","X"=>"56","Y"=>"57","Z"=>"58",
                              "1"=>"17","2"=>"18","3"=>"19","4"=>"20","5"=>"21","6"=>"22","7"=>"23","8"=>"24","9"=>"25","0"=>"16",
                              " "=>"0","!"=>"1","\""=>"2","#"=>"3","$"=>"4","%"=>"5","&"=>"6","'"=>"7","("=>"8",")"=>"9","*"=>"10","+"=>"11",","=>"12","-"=>"13","."=>"14","/"=>"15",":"=>"26",";"=>"27","<"=>"28","="=>"29",">"=>"30","?"=>"31","@"=>"32","["=>"59","\\"=>"60","]"=>"61","^"=>"62","_"=>"63");

    public function __construct() {
    }
    
    public function getSubtitle() {
        return "Convertir du texte en code Sixbit.";
    }
    
    public function getMessage() {
        return "Le code Sixbit est insensible à la casse et ne supporte pas les accents. Seuls quelques caractères spéciaux sont supportés.";
    }
    
    public function transcode($input) {
        if (isset($input)) {
            $input = utf8_decode(strtoupper($input));

            if (strlen($input) > 0) {
                $input_char = str_split($input);

                $output = null;

                foreach ($input_char as $char) {
                    if (array_key_exists($char, $this->trad)) {
                        $output .= "0x".strtoupper(dechex($this->trad[$char]))." ";
                    }else {
                        $output .= "<span class=\"unknown\">".utf8_encode($char)."</span> ";
                    }
                }

                return $output;
            }
        }
    }
    
}
