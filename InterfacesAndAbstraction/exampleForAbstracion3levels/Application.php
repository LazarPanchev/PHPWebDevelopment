<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.10.2018 г.
 * Time: 10:24
 */

class Application
{
    const line=['student Lazar l.panchev@abv.bg', 'student Ivelina iva@abv.bg', 'teacher Mirela mima@abv.bg', 'director Georgi dir@abv.bg', 'End'];
    /**
     * @var Person[]
     */
    private $results = [];

    /**
     * @throws Exception
     */
    public function run()
    {
        $this->readData();
        $this->printData();
    }

    /**
     * @throws Exception
     */
    private function readData()
    {
        $counter = 0;
        while (self::line[$counter]) {
            if (self::line[$counter] == 'End') {
                break;
            }

            [$type, $name, $email] = explode(' ', self::line[$counter]);
            if (!class_exists($type)) {
                throw new Exception("Wrong type data: ");
            }
            $this->results[]= new $type($name, $email);
            $counter++;
        }
    }

    private function printData():void
    {
        foreach ($this->results as $obj) {
            $obj->printData();
        }
    }
}