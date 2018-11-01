<?php

namespace Controllers;


use DTO\ProductDTO;
use Exception;
use Models\Products;  //equal to Models\Products as Products
use Models\Categories;

class ProductsController extends BaseController
{

    public function index()    //action
    {
        $products = null;
        $model = new Products($this->db_connection);
        if ($_SESSION['user_id']) {
            $products = $model->getListByUser();
        } else {
            $this->redirect('/users/login');
        }
        $this->view->renderView($products);
    }

    /**
     * @param $product_id
     * @throws Exception
     */
    public function view($product_id)
    {
       $model = new Products($this->db_connection);
        $product = null;
        if (!$product_id) {
            throw new Exception('No product id!');
        }
        $product = $model->getOne($product_id);
        if (!$product) {
            throw new Exception('No product found!');
        }

        $this->view->renderView($product);
    }

    public function createEdit(?int $product_id)
    {
        $data = new ProductDTO();
        $model = new Products($this->db_connection);
        //if we have something in $_POST we will create or just see the form to create
        if ($_POST) {                       // if we have something in $_Post so we are here from submit form otherwise we come here from hyperlink createProduct
            //we use the same page for show the table createProducty and send the information for create a new product
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $cat_id = $_POST['cat_id'];
            $product_id = $_POST['product_id'] ?? null;
            $userId = ($_SESSION['user_id']);
            if (!$product_id) {
                $product_id = $model->createProduct($product_name, $price, $description, $cat_id, $userId);
            } else {       //update
                $model->updateProduct($product_id, $product_name, $price, $description, $cat_id);
            }
            $this->redirect('/Products/view/' . $product_id);
        }

        if ($product_id != null) {
            $data = $model->getOne(intval($product_id));
        }

        $categoriesModel = new Categories($this->db_connection);
        $data->setCatList($categoriesModel->getList());

        $this->view->renderView($data);
    }


    public function delete($product_id)
    {
        $model = new Products($this->db_connection);
        $data['product_id'] = $product_id;
        if (isset($_POST['product_id'])) {
            $model->deleteProduct($product_id);
            $this->redirect('/');
        }

        $this->view->renderView($data);
    }

    public function fileUpload()
    {
        $products_obj = new Products($this->db_connection);

        $currentDir = getcwd();   //return the current directory with the project
        $uploadDirectory = "/uploads/";  //here will save the files

        $errors = []; // Store all foreseen and unforseen errors here

        $fileExtensions = ['jpeg', 'jpg', 'png']; // Get all the file extensions allows extensions

        $fileName = $_FILES['myfile']['name'];  //from inner array $_FILE
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];

        $file = explode('.', $fileName);
        $fileExtension = strtolower(end($file));

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName); //take the path current dir and concatenate the other path

        if (isset($_POST['submit'])) {

            $productId = $_POST['product_id']; //comes from the hidden field
            $products_obj->uploadImage($fileName, $productId);
            header('Location: viewProduct.php?product_id=' . $productId . '&isUploaded=1');

            if (!in_array($fileExtension, $fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }

            if ($fileSize > 2000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }

            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath); //physical put the file in the dir

                if ($didUpload) {
                    echo "The file " . basename($fileName) . " has been uploaded";
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }
        }
    }


}
