<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 9.11.2018 г.
 * Time: 15:55
 */

namespace Core;


class DataBinderError implements DataBinderInterface
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