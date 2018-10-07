<?php

class DateModifier{
    private $date1;
    private $date2;

    public function __construct(string $date1,string $date2)
    {
        $this->setFirstDate($date1);
        $this->setSecondDate($date2);
    }

    private function setFirstDate($date1){
        $parsedDate=str_replace(" ",'/',$date1);
        $this->date1=date_create($parsedDate);
    }
    private function setSecondDate($date2){
        $parsedDate=str_replace(" ",'/',$date2);
        $this->date2=date_create($parsedDate);
    }
    public function getDifference(){
        return date_diff($this->date1,$this->date2)->format("%a");
    }
}
$firstDate=readline();
$secondDate=readline();
$dateModifier=new DateModifier($firstDate,$secondDate);
echo $dateModifier->getDifference();
?>