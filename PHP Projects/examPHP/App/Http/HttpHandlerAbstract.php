<?php

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandlerAbstract
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
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template=$template;
        $this->dataBinder=$dataBinder;
    }

    public function render(string $template, $data=null, array $errors=[],?string $successMessage=null){
        $this->template->render($template, $data, $errors,$successMessage);
    }

    public function redirect(string $url){
        header("Location: $url");
    }
}