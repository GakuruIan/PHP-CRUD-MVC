<?php

namespace app\utils;
 
 class UtilHelper{

    public static function RandomString($num){
        $String='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str='';
        for($i=0;$i<$num;$i++){
            $index=rand(0,strlen($String)-1);
            $str.=$String[$index];
        }
        return $str;
    }
 }