<?php

class Baudot extends CI_Model {
    
    private $trad = array("A"=>"03","B"=>"19","C"=>"0E","D"=>"09","E"=>"01","F"=>"0D","G"=>"1A","H"=>"14","I"=>"06","J"=>"0B","K"=>"0F","L"=>"12","M"=>"1C","N"=>"0C","O"=>"18","P"=>"16","Q"=>"17","R"=>"0A","S"=>"05","T"=>"10","U"=>"07","V"=>"1E","W"=>"13","X"=>"1D","Y"=>"15","Z"=>"11",
                          "1"=>"17","2"=>"13","3"=>"01","4"=>"0A","5"=>"10","6"=>"15","7"=>"07","8"=>"06","9"=>"18","0"=>"16",
                          "-"=>"03"," "=>"04","'"=>"05",","=>"0C","!"=>"0D",":"=>"0E","("=>"0F","+"=>"11",")"=>"12","£"=>"14","?"=>"19","&"=>"1A","."=>"1C","/"=>"1D",";"=>"1E");
    private $letters = array("A"=>"03","B"=>"19","C"=>"0E","D"=>"09","E"=>"01","F"=>"0D","G"=>"1A","H"=>"14","I"=>"06","J"=>"0B","K"=>"0F","L"=>"12","M"=>"1C","N"=>"0C","O"=>"18","P"=>"16","Q"=>"17","R"=>"0A","S"=>"05","T"=>"10","U"=>"07","V"=>"1E","W"=>"13","X"=>"1D","Y"=>"15","Z"=>"11");

    public function __construct() {
    }
    
    public function getSubtitle() {
        return "Convertir du texte en code Baudot.";
    }
    
    public function getMessage() {
        return "Le code Baudot est insensible à la casse et ne supporte pas les accents. Seuls quelques caractères spéciaux sont supportés.";
    }
    
    public function transcode($input) {
        if (isset($input)) {
            $input = utf8_decode(strtoupper($input));

            if (strlen($input) > 0) {
                $input_chars = str_split($input);
                
                $output = null;
                $mem = null;

                foreach ($input_chars as $char) {
                    if (array_key_exists($char, $this->trad)) {
                        if ($char == " ") {
                            $output .= "0x".$this->trad[$char]." ";
                        }elseif ((!array_key_exists($char, $this->letters) AND $mem == "") OR (!array_key_exists($char, $this->letters) AND array_key_exists($mem, $this->letters))) {
                            $output .= "0x1B ";
                            $output .= "0x".$this->trad[$char]." ";
                            $mem = $char;
                        }elseif ((array_key_exists($char, $this->letters) AND $mem == "") OR (array_key_exists($char, $this->letters) AND !array_key_exists($mem, $this->letters))) {
                            $output .= "0x1F ";
                            $output .= "0x".$this->trad[$char]." ";
                            $mem = $char;
                        }else {
                            $output .= "0x".$this->trad[$char]." ";
                            $mem = $char;
                        }
                    }else {
                        $output .= "<span class=\"unknown\">".utf8_encode($char)."</span> ";
                    }
                }

                return $output;
            }
        }
    }
    
}
