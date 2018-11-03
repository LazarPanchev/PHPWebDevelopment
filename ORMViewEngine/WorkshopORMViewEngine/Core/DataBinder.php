<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 2.11.2018 г.
 * Time: 18:57 ч.
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function bind(array $form, $className)
    {
        $classInfo= new \ReflectionClass($className);

        $object= new $className;
        foreach ($form as $key=>$value){
            if($classInfo->hasProperty($key)){
                $property = $classInfo->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }
         return $object;
    }
}