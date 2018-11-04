<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 14:58 ч.
 */

interface ICheckerId
{
    public function checkId(string $id):bool;

}