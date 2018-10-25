<?php

class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->length=$length;
        $this->width=$width;
        $this->height=$height;
    }

    /**
     * @return float
     */
    private function getSurfaceArea():float{
        //2lw + 2lh + 2wh
        return (2*$this->length*$this->width) + (2*$this->length*$this->height) + (2*$this->width*$this->height);
    }

    /**
     * @return float
     */

    private function getLateralSurfaceArea():float{
        //Lateral Surface Area = 2lh + 2wh
        return (2*$this->length*$this->height) + (2*$this->width*$this->height);
    }

    /**
     * @return float
     */

    private function getVolume():float{
        return $this->length * $this->width * $this->height;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result= 'Surface Area - ' . number_format($this->getSurfaceArea(),2,'.',''). PHP_EOL;
        $result.= 'Lateral Surface Area - ' . number_format($this->getLateralSurfaceArea(),2,'.',''). PHP_EOL;
        $result .= 'Volume - ' . number_format($this->getVolume(),2,'.',''). PHP_EOL;
        return $result;
    }
}


?>