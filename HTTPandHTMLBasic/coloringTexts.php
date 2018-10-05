<?php
if(isset($_GET['input'])){
    $wordCount=[];

    $input=$_GET['input'];

    $input=preg_split("/[^A-Za-z]+/", $input,-1,
        PREG_SPLIT_NO_EMPTY);


    foreach ($input as $item){
        $item=strtolower($item);
        if(!array_key_exists($item,$wordCount)){
            $wordCount[$item]=1;
        }else{
            $wordCount[$item]++;
        }
    }

    echo "<table border='2'>";
    foreach ($wordCount as $key=>$value){
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";

}
?>