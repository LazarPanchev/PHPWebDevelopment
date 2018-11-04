<?php


spl_autoload_register();

$elements=explode(' ',readline());
$removeOperations=intval(readline());

$addCollection=new AddCollection();
$addRemoveCollection= new AddRemoveCollection();
$myList= new MyList();

$resultAdd=[];
$resultArr2=[];
$resultArr3=[];

foreach ($elements as $element){
    $firstCollectionIndex=$addCollection->Add($element);
    $resultAdd[]=$firstCollectionIndex;
    $secondCollectionIndex=$addRemoveCollection->Add($element);
    $resultArr2[]=$secondCollectionIndex;
    $thirdCollectionIndex=$myList->Add($element);
    $resultArr3[]=$thirdCollectionIndex;
}
echo implode(' ', $resultAdd) . PHP_EOL;
echo implode(' ', $resultArr2). PHP_EOL;
echo implode(' ', $resultArr3). PHP_EOL;

$resultRemove=[];
$resultRemove2=[];
for($i = 0; $i < $removeOperations; $i++) {
    $resultRemove[]=$addRemoveCollection->Remove();
    $resultRemove2[]=$myList->Remove();
}
echo implode(' ',$resultRemove). PHP_EOL;
echo implode(' ',$resultRemove2);
