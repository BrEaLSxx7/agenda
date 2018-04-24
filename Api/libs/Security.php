<?php

class Security
{
    public function has(string $pass){
        return crypt($pass,password_hash($pass,1));
    }
    public function genToken($long) {
        $key = '';
        $chars = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($chars)-1;
        for($i=0;$i < $long;$i++) $key .= $chars{mt_rand(0,$max)};
        return $key;
    }

}