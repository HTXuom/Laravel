<?php
function isUppercase($fail,$value,$message){
        if($value!=mb_strtoupper($value,'UTF-8')){
        $fail($message);
        }
    }