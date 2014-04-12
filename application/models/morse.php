<?php

class Morse extends CI_Model {
    
    private $trad = array("A"=>".-","B"=>"-...","C"=>"-.-.","D"=>"-..","E"=>".","F"=>"..-.","G"=>"--.","H"=>"....","I"=>"..","J"=>".---","K"=>"-.-","L"=>".-..","M"=>"--","N"=>"-.","O"=>"---","P"=>".--.","Q"=>"--.-","R"=>".-.","S"=>"...","T"=>"-","U"=>"..-","V"=>"...-","W"=>".--","X"=>"-..-","Y"=>"-.--","Z"=>"--..",
                          "1"=>".----","2"=>"..---","3"=>"...--","4"=>"....-","5"=>".....","6"=>"-....","7"=>"--...","8"=>"---..","9"=>"----.","0"=>"-----",
                          " "=>"&nbsp;");
    
    public function __construct() {
    }
    
    public function getSubtitle() {
        return "Convertir du texte en alphabet Morse.";
    }
    
    public function getMessage() {
        return "L'alphabet Morse est insensible à la casse et ne supporte pas les accents ni les caractères spéciaux.";
    }
    
    public function transcode($input) {
        if (isset($input)) {
            $input = utf8_decode(strtoupper($input));

            if (strlen($input) > 0) {
                $input_chars = str_split($input);

                $output = null;

                foreach ($input_chars as $char) {
                    if (array_key_exists($char, $this->trad)) {
                        if ($this->trad[$char] != "&nbsp;") {
                            $output .= $this->trad[$char]." ";
                        }else {
                            $output .= "&nbsp;";
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
