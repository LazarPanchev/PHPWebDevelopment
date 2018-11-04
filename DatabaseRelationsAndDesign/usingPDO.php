<?php
//try{
//    $db=new PDO('mysql:host=localhost; dbname=phpexercise', 'root','');
//    $result=$db->query('SELECT * FROM employees', PDO::FETCH_ASSOC);
//    foreach ($result as $row){
//        print_r($row);
//    }
//}catch (PDOException $e){
//    print 'ERROR!' . $e->getMassage() .  "<br/>";
//}

//using prepare
//$id=2;
//try{
//    $db=new PDO('mysql:host=localhost;dbname=phpexercise', 'root', '');
//    $stm=$db->prepare('SELECT * FROM employees WHERE employee_id=?');
//    if($stm->execute(array($id))){
//        while ($row= $stm->fetch(PDO::FETCH_ASSOC)){
//            print_r($row);
//        }
//    }
//    $stm=null;
//    $db=null;
//}catch (PDOException $e){
//    print "ERROR!: " . $e->getMessage() . "<br/>";
//}

//prepare statement Insert
try{
    $db=new PDO('mysql:host=localhost;dbname=phpexercise', 'root', '');
    $stm=$db->prepare("INSERT INTO employees (name, department_name, salary) VALUES (?,?,?)");
    $stm->bindParam(1,$eName);
    $stm->bindParam(2,$dName);
    $stm->bindParam(3,$salary);

    $eName='Joro2';
    $dName='Marketing';
    $salary='200';
    $stm->execute();
    $eName='Pepito2';
    $dName='HumanResource';
    $salary='1300';
    $stm->execute();

}catch (PDOException $e){
    print "Error! : " . $e->getMessage() . "<br />";
}