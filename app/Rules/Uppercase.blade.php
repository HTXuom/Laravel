<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rules;


class Uppercase extends Rules
{

    private $attribute =null;
    public function _contruct(){
      
    }



 public function passes($attribute, $value){
    $this->attribute =$attribute;l
    var_dump($attribute);
    die();
    if($value===b_strtoupper($value,'UTF-8')){
        return true;
    }
    return false;
}

 public function message(){
   $customMessage ='validation.custom'.($this->attribute).'.uppercase');
   dd($customMessage);

    //return 'The validation error message ';
if(trans($customMessage)!=$customMessage{
return trans($customMessage);

}
  
   return trans('vcalidation.uppercase');
}


}