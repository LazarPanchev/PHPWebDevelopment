<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 17:41
 */

namespace Core;


use Database\DatabaseInterface;
use ReflectionClass;

class DataBinder implements DataBinderInterface
{
    public function bind(array $form, string $className)
    {
        $classInfo = new ReflectionClass($className);

        $object= new $className;

        foreach ($form as $formKey=>$formValue){
            if($classInfo->hasProperty($formKey)){
                $property= $classInfo->getProperty($formKey);
                $property->setAccessible(true);
                $property->setValue($object,$formValue);
            }
        }

        return $object;

    }
}