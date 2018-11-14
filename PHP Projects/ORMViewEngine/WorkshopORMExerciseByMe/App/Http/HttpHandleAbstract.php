<?php

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

class HttpHandleAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template=$template;
        $this->dataBinder=$dataBinder;
    }

    protected function render(string $templateName,$data=null):void{
        $this->template->render($templateName,$data);
    }

    protected function redirect(string $url){
        header("Location: $url");
    }

}