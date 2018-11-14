<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 12.11.2018 г.
 * Time: 20:46 ч.
 */

namespace App\DTO;

use Exception;

class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $errorMessage
     * @throws Exception
     */
    public static function validate($min, $max, $value, $errorMessage)
    {
        if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
            throw new Exception($errorMessage);
        }
    }

    /**
     * @param string $date
     * @throws Exception
     */
    public static function validateDate(string $date,$errorMessage)
    {
        preg_match("/\b[0-9]{4}-[0-9]{2}-[0-9]{2}\b/", $date, $match);
        if(count($match)===0){
            throw new Exception($errorMessage);
        }
    }
}