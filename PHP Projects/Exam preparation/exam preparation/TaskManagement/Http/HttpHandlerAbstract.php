<?php

namespace TaskManagement\Http;


use Core\DataBinderError;
use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinderError;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     * @param DataBinderInterface $dataBinder
     * @param DataBinderInterface $dataBinderError
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder, DataBinderInterface $dataBinderError)
    {
        $this->template = $template;
        $this->dataBinder=$dataBinder;
        $this->dataBinderError=$dataBinderError;
    }

    protected function render(string $templateName, $data =null, array $errors=[]):void
    {
        $this->template->render($templateName, $data, $errors);
    }

    protected function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }

}