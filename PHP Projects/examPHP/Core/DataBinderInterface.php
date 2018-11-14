<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 12.11.2018 г.
 * Time: 15:59
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $form,string $className);

    public function bindReflection(array $form,string $className);

}