<?php

namespace Core;

use ReflectionClass;

class DataBinder implements DataBinderInterface
{
    public function bind(array $form,  string $className)
    {
        $classInfo = new ReflectionClass($className);

        $object= new $className;
        foreach ($form as $formName=>$formValue){
            if($classInfo->hasProperty($formName)){
                $classProperty = $classInfo->getProperty($formName);
                $classProperty->setAccessible(true);
                $classProperty->setValue($object, $formValue);
            }
        }
        return $object;
    }
}