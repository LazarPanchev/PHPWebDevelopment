<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $money;

    /**
     * @var array
     */
    private $bagOfProducts;

    /**
     * Person constructor.
     * @param string $name
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->bagOfProducts=[];
    }

    /**
     * @param string $name
     * @throws Exception
     */
    private function setName(string $name):void{
        if($name==''){   //if(empty($name)
            throw new Exception('Name cannot be empty');
        }
        $this->name=$name;
    }

    /**
     * @param float $money
     * @throws Exception
     */
    private function setMoney(float $money):void{
        if($money<0){
            throw new Exception('Money cannot be negative');
        }
        $this->money=$money;
    }

    /**
     * @return float
     */
    public function getMoney():float{
        return $this->money;
    }

    /**
     * @return array
     */
    public function getProducts():array {
        return $this->bagOfProducts;
    }

    /**
     * @param string $productName
     */
    private function addProduct(string $productName){
        $this->bagOfProducts[]=$productName;
    }

    /**
     * @param string $productName
     * @param float $cost
     */
    public function makeBought(string $productName, float $cost):void{
        $this->addProduct($productName);
        $this->money-=$cost;
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function buyProduct(Product $product){
        if ($this->getMoney() >= $product->getCost()) {
            $this->makeBought($product->getName(), $product->getCost());
            echo "{$this->name} bought {$product->getName()}" . PHP_EOL;
        } else {
            throw new Exception("{$this->name} can't afford {$product->getName()}" . PHP_EOL);
        }
    }
    /**
     * @return int
     */
    public function getCountOfProducts():int{
        return count($this->bagOfProducts);
    }

    public function __toString()
    {
        $result='';
        if ($this->getCountOfProducts() == 0) {
            $result.= "{$this->name} - Nothing bought" . PHP_EOL;
        } else {
            $result.= "{$this->name} - " . implode(',', $this->getProducts()) . PHP_EOL;
        }

        return $result;
    }

}

?>