<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 18:24 ч.
 */

class MyList extends Collection implements IAddable,IRemovable,IUsable
{

    public function Add(string $element): int
    {
        array_unshift($this->collection,$element);
        return 0;
    }

    public function Remove(): string
    {
        return array_shift($this->collection);
    }

    public function Used(): int
    {
        return  implode(' ', $this->collection);
    }
}