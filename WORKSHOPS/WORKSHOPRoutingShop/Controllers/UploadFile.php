<?php

namespace Controllers;


class UploadFile extends BaseController
{
    public function uploadFile(){
        spl_autoload_register();         //auto include - the class name must be equal to file name

        $db = DBConnection::getConnection();
        $products_obj = new ProductsController($db);

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