<?php

namespace Core;


class DataBinder implements DataBinderInterface
{
    /**
     * @param array $form
     * @param string $className
     * @return mixed
     */
    public function bind(array $form, string $className)
    {
        $object = new $className();
        foreach ($form as $key => $value) {
            $methodName = 'set' .  implode('',
                    array_map(function ($el) {
                    return ucfirst($el);
                }, explode('_', $key)));
            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }
        return $object;
    }

    /**
     * @param array $form
     * @param string $className
     * @return mixed
     * @throws \ReflectionException
     */
    public function bindReflection(array $form, string $className)
    {
        $classInfo = new \ReflectionClass($className);
        $object = new $className();

        foreach ($form as $key => $value) {
            $key=implode('',array_map(function ($el){
                return ucfirst($el);
            },explode('_',$key)));
            $key=lcfirst($key);
            if ($classInfo->hasProperty($key)) {
                $property = $classInfo->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }
        return $object;
    }
}