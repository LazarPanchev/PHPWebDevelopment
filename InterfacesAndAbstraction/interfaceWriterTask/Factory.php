<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:17 ч.
 */

class Factory
{
    /**
     * @param string $writerName
     * @return WriterInterface
     * @throws Exception
     */
        public static function getWriter(string $writerName):WriterInterface{

            if(!class_exists($writerName)){
                throw new Exception('Non valid writer');
            }
            /**
             * @var WriterInterface
             */
            return  new $writerName();
        }
}