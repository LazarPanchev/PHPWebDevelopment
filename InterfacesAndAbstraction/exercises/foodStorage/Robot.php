<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.10.2018 г.
 * Time: 14:57 ч.
 */

class Robot implements ICheckerId
{
    private $model;
    private $id;

    /**
     * Robot constructor.
     * @param $model
     * @param $id
     */
    public function __construct($model, $id)
    {
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function checkId(string $id):bool
    {
        $countDigits=strlen($id);
        return substr($this->id,-$countDigits)==$id;
    }
}