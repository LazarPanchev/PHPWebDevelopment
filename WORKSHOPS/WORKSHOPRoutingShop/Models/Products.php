<?php

namespace Models;

use PDO;

class Products
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Products constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        $statement = $this->db->query('SELECT p.product_id, p.product_name,
                                                c.cat_name, p.cat_id
                                               FROM products AS p
                                               INNER JOIN categories AS c
                                               ON p.cat_id = c.cat_id
                                               ORDER BY p.product_id;');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {             //equal to fetchAll - return a array
            yield $row;                                                           //using yield no need to return the variable brings the iterator
        }
    }

    public function getListByUser()
    {
        $userId=intval($_SESSION['user_id']);
        $statement = $this->db->prepare('SELECT p.product_id, p.product_name,
                                                c.cat_name, p.cat_id
                                                FROM products AS p
                                                INNER JOIN categories AS c
                                                ON p.cat_id = c.cat_id
                                                WHERE user_id=:userId
                                                ORDER BY p.product_id;');

        $statement->bindParam('userId',$userId);
        $statement->execute();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {             //equal to fetchAll - return a array
            yield $row;                                                           //using yield no need to return the variable brings the iterator
        }
    }

    public function getOne(int $product_id)
    {
        $statement = $this->db->prepare('SELECT p.product_id, p.product_name, p.price,
                                               p.description, c.cat_name, p.create_date, p.last_update, p.cat_id, p.image
                                               FROM products AS p
                                               INNER JOIN categories AS c
                                               ON p.cat_id = c.cat_id
                                               WHERE product_id=:product_id');

        $statement->bindParam('product_id', $product_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($product_name, $price, $description, $cat_id)
    {
         $statement = $this->db->prepare('INSERT INTO products (product_name,price,description,cat_id)
                                                    VALUES (:productName, :price, :description, :catId);');
         $statement->bindParam('productName',$product_name);
         $statement->bindParam('price',$price);
         $statement->bindParam('description',$description);
         $statement->bindParam('catId',$cat_id);
         $statement->execute();

         return $this->db->lastInsertId();   //return last inserted id
    }

    public function updateProduct($product_id, $product_name, $price, $description, $cat_id)
    {
        $statement = $this->db->prepare('UPDATE products 
                                                   SET product_name=:productName, price=:price, description=:description, cat_id=:catId
                                                   WHERE product_id=:productId');
        $statement->bindParam('productName',$product_name);
        $statement->bindParam('price',$price);
        $statement->bindParam('description',$description);
        $statement->bindParam('catId',$cat_id);
        $statement->bindParam('productId',$product_id);

        $statement->execute();
    }

    public function deleteProduct($product_id)
    {
        $statement = $this->db->prepare('DELETE FROM products 
                                                   WHERE product_id=:productId');
        $statement->bindParam('productId',$product_id);
        return $statement->execute();
    }

    public function uploadImage(string $imageName, int $product_id){
        $statement = $this->db->prepare('UPDATE products 
                                                   SET image=:imageName
                                                   WHERE product_id= :productId');
        $statement->bindParam('imageName',$imageName);
        $statement->bindParam('productId',$product_id);

        $statement->execute();
    }
}

?>