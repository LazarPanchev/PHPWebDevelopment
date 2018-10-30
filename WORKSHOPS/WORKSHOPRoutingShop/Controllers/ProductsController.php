<?php

namespace Controllers;


use Exception;
use Models\Products;  //equal to Models\Products as Products
use Models\Categories;

class ProductsController extends BaseController
{

    /**
     * BaseController constructor.
     * @param $db_connection
     * @param string $controllerName
     */
    public function __construct($db_connection, string $controllerName)
    {
        parent::__construct($db_connection, $controllerName);
        $this->model = new Products($this->db_connection);
    }

    public function index()    //action
    {
        if($_SESSION['user_id']){
            $data['products'] = $this->model->getListByUser();
        }else{
            $data['products'] = $this->model->getList();
        }
        $this->renderView(__FUNCTION__, $data);
    }

    public function createEdit($product_id)
    {
        $data['categories_model'] = new Categories($this->db_connection);

        $data['product'] = ['product_id' => '', 'product_name' => '', 'price' => '', 'description' => '', 'cat_id' => ''];

        //if we have something in $_POST we will create or just see the form to create
        if ($_POST) {                       // if we have something in $_Post so we are here from submit form otherwise we come here from hyperlink createProduct
            //we use the same page for show the table createProducty and send the information for create a new product
            $this->db_connection->beginTransaction();    //example for transaction
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $cat_id = $_POST['cat_id'];
            $product_id = $_POST['product_id'] ?? null;

            if (!$product_id) {
                $product_id = $this->model->createProduct($product_name, $price, $description, $cat_id);
                $mode = 1;
            } else {       //update
                $this->model->updateProduct($product_id, $product_name, $price, $description, $cat_id);
                $mode = 2;
            }
            $this->db_connection->commit();

            header('Location: /PHPExercise/WORKSHOPRoutingShop/ProductsController/view/' . $product_id);
            exit;

        }

        if ($product_id != null) {
            $data['product']['product_id'] = $product_id;
            $data['product'] = $this->model->getOne(intval($product_id));
        }

        $this->renderView(__FUNCTION__, $data);
    }

    /**
     * @param $product_id
     * @throws Exception
     */
    public function view($product_id)
    {
        if (!$product_id) {
            throw new Exception('No product id!');
        }

        $data['product'] = $this->model->getOne($product_id);

        if (!$data['product']) {
            throw new Exception('No product found!');
        }

        $this->renderView(__FUNCTION__, $data);
    }

    public function delete($product_id)
    {
        $data['product_id'] = $product_id;
        if (isset($_POST['product_id'])) {
            $this->model->deleteProduct($product_id);
            header("Location: /PHPExercise/WORKSHOPRoutingShop/");
            die();

        }

        $this->renderView(__FUNCTION__, $data);
    }


}
