<?php
class DecimalNumber{
    public $number;

    public function reversedOrd(){
        $numInReversedOrd='';
        for ($i=strlen($this->number)-1; $i>=0; $i--){
            $numInReversedOrd.=$this->number[$i];
        }
        return $numInReversedOrd;
    }
}
$input=readline();
$num=new DecimalNumber();
$num->number=$input;
echo $num->reversedOrd();

?>