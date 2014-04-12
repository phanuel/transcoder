<?php

class Code_factory {
    
    public static function create($code){
      $code = strtolower($code);
      
      $CI =& get_instance();
       
      switch ($code){
         case 'morse':
            $CI->load->model('morse');
            $code = new $CI->morse();
            break;
         case 'baudot':
            $CI->load->model('baudot');
            $code = new $CI->baudot();
            break;
        case 'radix-50':
            $CI->load->model('radix50');
            $code = new $CI->radix50();
            break;
        case 'sixbit':
            $CI->load->model('sixbit');
            $code = new $CI->sixbit();
            break;
        case 'ascii':
            $CI->load->model('ascii');
            $code = new $CI->ascii();
            break;
         default:
            throw new Exception ('Type de code inconnu: '.$code);
      }
      
      return $code;
   }
   
}
