<?php

namespace Core;

use ReflectionClass;

class DataBinder implements DataBinderInterface
{
    public function bind(array $form, string $className)
    {

        $classInfo = new ReflectionClass($className);

        $properties = $classInfo->getProperties();
        $object = new $className;

        foreach ($properties as $property) {
            $name = $property->getName();
            if (isset($form[$name])) {
                $setter = 'set' . ucfirst($name);
                $object->$setter($form[$name]);
            }
        }
        return $object;
    }

//
//    public function bind(array $form, string $className)
//    {
//        $object = new $className;
//        foreach ($form as $key => $value) {
//            $methodName = 'set' . implode('',
//                    array_map(function ($el) {
//                        return ucfirst($el);
//                    }, explode("_", $key)));
//            if (method_exists($object, $methodName)) {
//                $object->$methodName($value);
//            }
//        }
//
//        return $object;
//    }

//    public function bind(array $from, $className)
//    {
//
//        $object = new $className;
//        foreach ($from as $key => $value) {
//            $methodName = 'set' . implode("",
//                    array_map(function ($el) {
//                        return ucfirst($el);
//                    }, explode("_", $key))
//                );
//
//            if (method_exists($object, $methodName)) {
//                $object->$methodName($value);
//            }
//        }
//
//        return $object;
//    }
}
