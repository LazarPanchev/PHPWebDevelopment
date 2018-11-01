<?php

namespace Models;

use Database\PDODatabase;
use DTO\ProductDTO;

class Products
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * Products constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function getListByUser()
    {
        $userId=intval($_SESSION['user_id']);
        $statement=$this->db->query('SELECT p.product_id AS productId, 
                                           p.product_name AS productName,
                                           c.cat_name AS categoryName,
                                           p.cat_id AS categoryId
                                           FROM products AS p
                                           INNER JOIN categories AS c
                                           ON p.cat_id = c.cat_id
                                           WHERE user_id=:userId
                                           ORDER BY p.product_id;');
        $resultSet=$statement->execute([':userId' =>$userId]);
        return $resultSet->fetchAll(ProductDTO::class);   //this select return this object
    }

    public function getOne(int $product_id)
    {
        $statement = $this->db->query('SELECT p.product_id AS productId,
                                             p.product_name AS productName,
                                             p.price AS price,
                                             p.description AS description,
                                             c.cat_name AS categoryName,
                                             p.create_date AS createDate,
                                             p.last_update AS lastUpdate,
                                             p.cat_id AS categoryId,
                                             p.image AS image
                                             FROM products AS p
                                             INNER JOIN categories AS c
                                             ON p.cat_id = c.cat_id
                                             WHERE product_id = :product_id');

        $resultSetOne=$statement->execute([':product_id'=>$product_id]);
        return $resultSetOne->fetchOne(ProductDTO::class);
    }

    public function createProduct($productName, $price, $description, $categoryId, $userId)
    {
         $statement = $this->db->query('INSERT INTO products (product_name,price,description,cat_id,user_id)
                                              VALUES (:productName, :price, :description, :catId, :userId);');
         $resultSet=$statement->execute([':productName'=>$productName, ':price'=>$price,
             ':description'=>$description, ':catId'=>$categoryId, ':userId'=>$userId]);
         return $this->db->getLastId();
    }

    public function updateProduct($productId, $productName, $price, $description, $categoryId)
    {
        $statement = $this->db->query('UPDATE products 
                                             SET product_name=:productName, price=:price,
                                             description=:description, cat_id=:catId
                                             WHERE product_id=:productId');
        $statement->execute([':productName'=>$productName, ':price'=>$price,
            ':description'=>$description, ':catId'=>$categoryId, ':productId'=>$productId]);
    }

    public function deleteProduct($product_id)
    {
        $statement = $this->db->query('DELETE FROM products 
                                                   WHERE product_id=:productId');
        $statement->execute([':productId'=>$product_id]);
    }

    public function uploadImage(string $imageName, int $product_id){
        $statement = $this->db->query('UPDATE products 
                                                   SET image=:imageName
                                                   WHERE product_id= :productId');
        $statement->execute([':imageName'=>$imageName, ':productId'=>$product_id]);
    }
}

?>