<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 2.11.2018 г.
 * Time: 18:56 ч.
 */

namespace Core;


interface DataBinderInterface
{
        public function bind(array $form, $className);
}