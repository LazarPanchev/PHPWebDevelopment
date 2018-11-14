<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 9:26
 */

namespace Core;

use Database\PDOResultSet;

class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY='App/Templates/';
    const TEMPLATE_EXTENSION='.php';

    public function render(string $templateName, $data)
    {
        require_once self::TEMPLATE_DIRECTORY . $templateName .
            self::TEMPLATE_EXTENSION;

    }
}