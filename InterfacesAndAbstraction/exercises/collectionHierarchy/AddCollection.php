<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 18:34 ч.
 */

class AddCollection extends Collection implements IAddable
{
    public function Add(string $element): int
    {
        $this->collection[]=$element;
        return count($this->collection)-1;
    }

}