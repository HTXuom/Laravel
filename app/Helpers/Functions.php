<?php
use\App\Models\Groups;
function isUppercase($fail,$value,$message){
        if($value!=mb_strtoupper($value,'UTF-8')){
        $fail($message);
        }
    }


    function getAllgroup(){
        $groups = new Groups;
    return Groups::getAll();
    }
