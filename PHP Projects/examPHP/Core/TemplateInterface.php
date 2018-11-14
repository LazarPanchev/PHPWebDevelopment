<?php

namespace Core;

interface TemplateInterface
{
    public function  render(string $template, $data=null, array $errors=[],?string $successMessage=null);

}