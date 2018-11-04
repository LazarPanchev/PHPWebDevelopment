<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 23:38 ч.
 */

interface TouchScreen
{

    public function moveFinger();

    public function clickFinger();

    public function writeText();
}