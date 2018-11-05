<form>
    <textarea rows="10" name="text"></textarea><br>
    <input type="submit" value="Extract">
</form>

<?php
if(isset($_GET['text'])){
    $input=$_GET['text'];
    preg_match_all("/[A-Za-z]+/",$input,$resultArr);
    $capitalCaseWords=[];
    $resultArr=array_filter($resultArr[0],function ($el){
        return strtoupper($el)==$el;
    });
    echo implode(', ',$resultArr);

}
?>