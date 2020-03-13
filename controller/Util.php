<?php
    
    class Util{

        function returnNumbers($str) {
            return preg_replace("/[^0-9]/", "", $str);
        }

        function inverteDate($data){
           if(count(explode("/",$data)) > 1){
               return implode("-",array_reverse(explode("/",$data)));
           }elseif(count(explode("-",$data)) > 1){
               return implode("/",array_reverse(explode("-",$data)));
           }
        }

        function convertDatePTBR($separator, $data){
            $date = date('d'.$separator.'m'.$separator.'Y', strtotime($data));
            return $date;
        }

        function convertDateUS($separator, $data){
          $date = date('Y'.$separator.'m'.$separator.'d', strtotime($data));
          return $date;
        }

        function verifyMail($mail){
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                return true;
            }else{
                return false;
            }
        }

        function raw_json_encode($input, $flags = 0) {
            $fails = implode('|', array_filter(array(
                '\\\\',
                $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
                $flags & JSON_HEX_AMP ? 'u0026' : '',
                $flags & JSON_HEX_APOS ? 'u0027' : '',
                $flags & JSON_HEX_QUOT ? 'u0022' : '',
            )));
            $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
            $callback = function ($m) {
                return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
            };
            return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
        }

        function mask($mask, $string) {
            $maskared = '';
            $k = 0;
            for($i = 0; $i<=strlen($mask)-1; $i++) {
                if($mask[$i] == '#') {
                    if(isset($string[$k])) {
                        $maskared .= $string[$k++];
                    }
                }else {
                    if(isset($mask[$i])) {
                        $maskared .= $mask[$i];
                    }
                }
            }
            return $maskared;
        }

    }
