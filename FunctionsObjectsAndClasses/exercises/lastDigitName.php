<?php
class Number{
    public $number;

    public function englishName(){

        $lastDigit=($this->number)%10;
        $names=['zero','one','two','three','four','five','six','seven','eight','nine','ten'];

        return $names[$lastDigit];
    }
}
$input=intval(readline());
$number=new Number();
$number->number=$input;
echo $number->englishName()
?>