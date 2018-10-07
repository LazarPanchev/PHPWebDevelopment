<form method="get">
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        Number 1:
        <input type="text" name="number_one"/>
    </div>
    <div>
        Number 2:
        <input type="text" name="number_two"/>
    </div>
    <div>
        <input type="submit" name="calculate" value="Calculate!">
    </div>
</form>

<?php
if(isset($_GET['calculate'])){
    $operation=$_GET['operation'];
    $num1=$_GET['number_one'];
    $num2=$_GET['number_two'];
    $result=0;
    switch ($operation){
        case 'sum':
            $result=floatval($num1)+floatval($num2);
            break;
        case 'subtract':
            $result=floatval($num1)-floatval($num2);
            break;
        default:
            $result= "Invalid operaton!";
    }
    echo " <input type='text' disabled='disabled' readonly='readonly' value='" . $result .  "'/>";
}




?>