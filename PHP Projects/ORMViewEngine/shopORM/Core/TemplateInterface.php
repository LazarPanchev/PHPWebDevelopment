<?php

namespace Core;

use Database\PDOResultSet;

interface TemplateInterface
{
    public function render(string $templateName,PDOResultSet $data);
}