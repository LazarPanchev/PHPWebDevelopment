<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 14:51 ч.
 */

namespace Core;


interface TemplateInterface
{
    public function render(string $templateName,array $data=[], array $errors=[]);
}