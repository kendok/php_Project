<?php
/**
 * hjj
 */



/**
 * this is a comment
 */
namespace Itb;
/**
 * lets goo
 * Class MainController
 */
use PDO;

/**
 * Class ProductRepository
 * @package Itb
 */
class ProductRepository
{
    /**
     * this establish connection
     * @return PDO
     */
    public  function get_connection()
    {
        $server = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = 'auth';

        try {
            $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

            return $conn;
        } catch (PDOException $e) {
            die("Connection failed:" . $e->getMessage());
        }
    }


    /**
     * this gets all products
     * @return array
     */
    public function get_all_products()
    {
        $conn = $this->get_connection();

        // SQL query
        $sql = 'SELECT * FROM products';

        // execute query and collect results
        $statement = $conn->query($sql);
        $products = $statement->fetchAll();

        return $products;
    }

    /**
     * this gets one product
     * @param $id
     * @return mixed|null
     */
    public function get_one_product($id)
    {
        $conn = $this->get_connection();

        $sql = "SELECT * FROM products WHERE id = $id";
        $statement = $conn->query($sql);

        if ($row = $statement->fetch()) {
            return $row;
        } else {
            return null;
        }
    }


    /**
     * this deletes product
     * @param $id
     * @return bool
     */
    public function delete_product($id)
    {
        $conn = $this->get_connection();

        $sql = "DELETE FROM products WHERE id=$id";

        $numRowsAffected = $conn->exec($sql);


        if ($numRowsAffected > 0) {
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    /**
     * This inserts into the db
     * @param $productName
     * @param $productPrice
     * @param $productCode
     * @param $productImage
     * @param $productDesc
     * @return bool
     */
    public function create_product($productName, $productPrice, $productCode, $productImage, $productDesc)
    {
        $conn = $this->get_connection();

        $sql = 'INSERT into products (productName,productCode, productPrice,  productImage,productDesc) VALUES (:productName,:productCode,:productPrice,:productImage,:productDesc)';

        $numRowsAffected = $conn->prepare($sql);

        $numRowsAffected->bindParam(':productName', $productName);
        $numRowsAffected->bindParam(':productCode', $productCode);
        $numRowsAffected->bindParam(':productPrice', $productPrice);
        $numRowsAffected->bindParam(':productImage', $productImage);
        $numRowsAffected->bindParam(':productDesc', $productDesc);
        $numRowsAffected->execute();


        $results = $numRowsAffected->fetch(PDO::FETCH_ASSOC);


        if (count($results) > 0) {
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }


    /**
     * updates the product
     * @param $id
     * @param $productName
     * @param $productPrice
     * @param $productCode
     * @param $productImage
     * @param $productDesc
     * @return bool
     */
    public function update_product($id, $productName, $productPrice, $productCode, $productImage, $productDesc)
    {
        $conn = $this->get_connection();

        $sql = "UPDATE products SET id = :id,productName = :productName, productPrice = :productPrice, productCode = :productCode, 
    productImage = :productImage,productDesc = :productDesc WHERE id=$id";

        $numRowsAffected = $conn->prepare($sql);
        $numRowsAffected->bindParam(':id', $id);
        $numRowsAffected->bindParam(':productName', $productName);
        $numRowsAffected->bindParam(':productPrice', $productPrice);
        $numRowsAffected->bindParam(':productCode', $productCode);
        $numRowsAffected->bindParam(':productImage', $productImage);
        $numRowsAffected->bindParam(':productDesc', $productDesc);
        $numRowsAffected->execute();

        $results = $numRowsAffected->fetch(PDO::FETCH_ASSOC);

        //  var_dump($numRowsAffected);
        //  die();


        if (count($results) > 0) {
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }

    /**
     * this updates the user
     * @param $id
     * @param $user_image
     * @return bool
     */
    public function update_user($id, $user_image)
    {
        $conn = $this->get_connection();


        $sql = "UPDATE users SET user_image = '" . $user_image . "' WHERE id=" . $id;




        $numRowsAffected = $conn->prepare($sql);
        $numRowsAffected->bindParam(':id', $id);
        $numRowsAffected->bindParam(':user_image', $user_image);
        $numRowsAffected->execute();

        $results = $numRowsAffected->fetch(PDO::FETCH_ASSOC);


        if (count($results) > 0) {
            $_SESSION ['user_image']= $user_image;
            $queryWasSuccessful = true;
        } else {
            $queryWasSuccessful = false;
        }

        return $queryWasSuccessful;
    }
}