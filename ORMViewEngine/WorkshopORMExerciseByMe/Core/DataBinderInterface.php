<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 20:48 ч.
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $form,  string $className);
}