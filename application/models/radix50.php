<?php

class Radix50 extends CI_Model {
    
    private $trad = array("A"=>"11","B"=>"12","C"=>"13","D"=>"14","E"=>"15","F"=>"16","G"=>"17","H"=>"18","I"=>"19","J"=>"20","K"=>"21","L"=>"22","M"=>"23","N"=>"24","O"=>"25","P"=>"26","Q"=>"27","R"=>"28","S"=>"29","T"=>"30","U"=>"31","V"=>"32","W"=>"33","X"=>"34","Y"=>"35","Z"=>"36",
                          "1"=>"2","2"=>"3","3"=>"4","4"=>"5","5"=>"6","6"=>"7","7"=>"8","8"=>"9","9"=>"10","0"=>"1",
                          " "=>"0","."=>"37","$"=>"38","%"=>"39");
    
    public function __construct() {
    }
    
    public function getSubtitle() {
        return "Convertir du texte en code RADIX-50.";
    }
    
    public function getMessage() {
        return "Le code RADIX-50 est insensible à la casse et ne supporte pas les accents. Les caractères spéciaux ne sont pas supportés, sauf \"$\" et \"%\".";
    }

    public function transcode($input) {
        if (isset($input)) {
            $input = utf8_decode(strtoupper($input));

            if (strlen($input) > 0) {
                // the string must be divisible by three => adding spaces as long as it is not the case
                while (!is_int(strlen($input) / 3)) {
                    $input = $input." ";
                }

                $input_chars = str_split($input);

                $char_codes = null;

                foreach ($input_chars as $char) {
                    if (array_key_exists($char, $this->trad)) {
                        $char_codes .= $this->trad[$char]."/";
                    }else {
                        $char_codes .= "?/";
                    }
                }

                $split = explode("/", $char_codes);

                $output = null;

                $count = count($split) -1;
                for ($i = 0; $i < $count; $i = $i + 3) {
                    $result = ((($split[$i] * 40) + $split[$i+1]) * 40) + $split[$i+2] ." ";
                    
                    if ($split[$i] == "?" OR $split[$i+1] == "?" OR $split[$i+2] == "?") {
                        $output .= "<span class=\"unknown\">".$result."</span>";
                    }else {
                        $output .= $result;
                    }
                }

                return $output;
            }
        }
    }
    
}
