<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 1.11.2018 г.
 * Time: 8:15
 */

namespace Core;

class View
{
    private const LAYOUT_FOLDER = 'Views';

    /**
     * @var string
     */
    private $controllerName;

    /**
     * @var string
     */
    private $actionName;

    /**
     * View constructor.
     * @param string $controllerName
     * @param string $actionName
     */
    public function __construct(string $controllerName, string $actionName)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    }


    public function renderView( $data=null){
        include(self::LAYOUT_FOLDER . '/Layout/header.html');
        include(self::LAYOUT_FOLDER . '/' . $this->controllerName. '/' .$this->actionName .  '.php');
        include(self::LAYOUT_FOLDER . '/Layout/footer.html');
    }

}