<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 17:40
 */

namespace Core;


use App\Data\UserDTO;

interface DataBinderInterface
{
    public function bind(array $form,string $className);

}