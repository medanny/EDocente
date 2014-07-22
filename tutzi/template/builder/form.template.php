<?php

  class Form//Inicio de clase
{

    var $HTML;

    function  Form(){
    $this->HTML=" ";
    }
    function inicForm($action,$type){
    $this->htmlAdd('<form action="'.$action.'" method="'.$type.'">');

    }
    function addinput($type,$name,$class, $placeholder){
    $this->htmlAdd('<div class="form-group">
                        <input type="'.$type.'" name="'.$name.'" class="'.$class.'" placeholder="'.$placeholder.'"/>
                    </div>');

    }
    function addbutton($type,$class,$text){
    $this->htmlAdd('<button type="'.$type.'" class="'.$class.'">'.$text.'</button>');
    }
    function addhtml($html){
    $this->htmlAdd($html);
        

    }
    function render(){

    return $this->HTML;
     $this->HTML=" ";

    }

    

    function htmlAdd($text){
    $this->HTML=$this->HTML.$text;
    }

}

$form = new Form();
?>