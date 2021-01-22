<?php

    function post($par, $guv=true){
        if($guv){
            return htmlspecialchars(addcslashes(strip_tags(trim($_POST[$par]))));
        }
        else{
            return trim($_POST[$par]);
        }
    }

    function get($par, $guv=true){
        if($guv){
            return htmlspecialchars(addcslashes(strip_tags(trim($_GET[$par]))));
        }
        else{
            return trim($_GET[$par]);
        }
    }
    
    function yeniGuvenlik($par){
        if(is_array($par)){
            foreach($par as $p => $v){
                if(!is_array($p)){
                    $p[$v] = @htmlspecialchars(strip_tags(urldecode(mysql_escape_string(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($v)))))))));
                }
                else{
                    $p[$v] = yeniGuvenlik($v);
                }
            }
        }
        else{
                $par = @htmlspecialchars(strip_tags(urldecode(mysql_escape_string(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($par)))))))));
        }
        return $par;
    }