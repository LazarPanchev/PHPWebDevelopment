<?php

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_ROOT='App/Templates/';
    const TEMPLATE_EXTENSION='.php';

    public function render(string $template, $data=null, array $errors=[],?string $successMessage=null)
    {
        require_once self::TEMPLATE_ROOT . $template . self::TEMPLATE_EXTENSION;
    }
}