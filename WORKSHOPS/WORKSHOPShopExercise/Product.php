<?php

class Product
{
    /**
     * @var PDO
     */
    private $db;

    public function __construct(PDO $db)
    {
        $this->db=$db;

    }

    public function getAll(){
        $dbName='shop';
        $statement=$this->db->query('SELECT product_id, product_name, price
                                                FROM products 
                                                ORDER BY product_id;');
        while ($row=$statement->fetch(PDO::FETCH_ASSOC)){
            yield $row;
        }
    }

    public function getOne($id){
        $statement=$this->db->prepare('SELECT p.product_id, p.product_name, p.price, c.cat_id,
                                                c.cat_name, p.description, p.create_date, p.last_update,p.image
                                                FROM products AS p
                                                INNER JOIN categories AS c
                                                ON p.cat_id = c.cat_id
                                                WHERE p.product_id=:id;');
        $statement->bindParam('id', $id);
        $statement->execute();
        $product=$statement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function createProduct($productName, $price, $category, $description){
        $statement=$this->db->prepare('INSERT INTO products (product_name, price, cat_id,
                                                description)
                                                VALUES (:productName, :price, :category, :description);');
        $statement->bindParam('productName',$productName);
        $statement->bindParam('price',$price);
        $statement->bindParam('category',$category);
        $statement->bindParam('description',$description);
        $statement->execute();

        return $this->db->lastInsertId();
    }

    public function editProduct($productId, $productName, $price, $category, $description)
    {
        $statement=$this->db->prepare('UPDATE products
                                               SET product_name=:productName, price=:price, cat_id=:catId, description=:description
                                               WHERE product_id=:productId;');

        $statement->bindParam('productName',$productName);
        $statement->bindParam('price',$price);
        $statement->bindParam('catId',$category);
        $statement->bindParam('description',$description);
        $statement->bindParam('productId',$productId);
        $statement->execute();
    }

    public function deleteProduct($productId)
    {
        $statement=$this->db->prepare('DELETE FROM products
                                                WHERE product_id=:productId;');
        $statement->bindParam('productId', $productId);
        $statement->execute();
    }

    public function uploadImage($fileName, $productId)
    {
        $statement = $this->db->prepare('UPDATE products 
                                                   SET image=:imageName
                                                   WHERE product_id= :productId');
        $statement->bindParam('imageName',$fileName);
        $statement->bindParam('productId',$productId);

        $statement->execute();
    }

}