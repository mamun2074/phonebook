<?php

/**
 * Created by PhpStorm.
 * User: Mahmud
 * Date: 12/28/2017
 * Time: 9:18 AM
 */
class Crud
{
    private $id='';
    private $name='';
    private $number='';

    /**
     * @param string $id
     */
    public function setId($values)
    {
        $this->id = $values['id'];
    }

    /**
     * @param array $values
     */
    public function setName($values)
    {
        if (!empty($values['name'])){
            $this->name = $values['name'];
        }else{

            session_start();
            $_SESSION['error']="<span style='color: red'>Put your name first</span>";
            header('Location: ../../views/phonebook/create.php');
            die();
        }
    }

    /**
     * @param array $values
     */
    public function setNumber($values)
    {
        if (!empty($values['number'])){
            $this->number = $values['number'];
        }else{
            session_start();
            $_SESSION['error']="<span style='color: red;'> Put your Number </span>";
            header('Location: ../../views/phonebook/create.php');
            die();
        }
    }

//    public function output(){
//        echo $this->name;
//        echo $this->number;
//    }


    public function storeData(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');
            $query="INSERT INTO `Users`(`name`, `number`) VALUES (:name,:number)";
            $stmt = $pdo->prepare($query);
            $success=$stmt->execute(array(
                ':name' => $this->name,
                ':number'=>$this->number,
            ));
            if (!empty($success)){

                session_start();
                $_SESSION['error']="<span class='btn btn-success' style='color: white;'>Success fully added </span>";
                header('Location: ../../views/phonebook/index.php');
                die();
            }

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


//    update value

    public function updateData($id){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');
            $query="UPDATE `Users` SET `name`=:name,`number`=:number WHERE `id`=$id";

            $stmt = $pdo->prepare($query);
            $update=$stmt->execute(array(
                ':name'   => $this->name,
                ':number' => $this->number,
            ));

            if (!empty($update)) {
                session_start();
                $_SESSION['error'] = "<span class='btn btn-success' style='color: white;'>Success fully updated </span>";
                header('Location: ../../views/phonebook/index.php');
            }else{
                session_start();
                $_SESSION['error'] = "<span class='btn btn-danger' style='color: green;'>Not Updated yet </span>";
                header('Location: ../../views/phonebook/index.php');
            }

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


//    show all phone book name & number
    public function showAll(){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="SELECT * FROM `users` WHERE `edit_at`=0";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $values=$stmt->fetchAll();
            return $values;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    //    show One phone book name & number
    public function showOne($id){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="SELECT  `name`, `number`  FROM `Users` WHERE `id`=$id";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $values=$stmt->fetch();
            return $values;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

//    Trash
    public function trashRow($id){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="UPDATE `users` SET `edit_at`=:edit_at WHERE `id`=$id";

            $stmt = $pdo->prepare($query);
            $trash=$stmt->execute(array(
                ':edit_at'   => date('Y-m-d'),

            ));
            if (!empty($trash)){
                session_start();
                $_SESSION['error'] = "<span class='btn btn-success' style='color: white;'>Success fully Trashed </span>";
                header('Location: ../../views/phonebook/index.php');
            }else{
                session_start();
                $_SESSION['error'] = "<span class='btn btn-danger' style='color: green;'>Not trashed yet </span>";
                header('Location: ../../views/phonebook/index.php');
            }


        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

//    Show trash lilst

    public function showAlltrashlist(){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="SELECT * FROM `users` WHERE `edit_at`!=0";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $values=$stmt->fetchAll();
            return $values;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

//    ReStore trash list

    public function reStoreTrash($id){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="UPDATE `users` SET `edit_at`=:edit_at WHERE `id`=$id";

            $stmt = $pdo->prepare($query);
            $trashRestore=$stmt->execute(array(
                ':edit_at'   => '0000-00-00',

            ));
            if (!empty($trashRestore)){
                session_start();
                $_SESSION['error'] = "<span class='btn btn-success' style='color: white;'>Success fully Restore </span>";
                header('Location: ../../views/phonebook/index.php');
            }else{
                session_start();
                $_SESSION['error'] = "<span class='btn btn-danger' style='color: green;'>Not Restore yet </span>";
                header('Location: ../../views/phonebook/index.php');
            }


        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


//    Delete
    public function deleteRow($id){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phonebook', 'root', '');

            $query="DELETE FROM `users` WHERE `id`=$id";
            $stmt = $pdo->prepare($query);

            $delete=$stmt->execute();

            if (!empty($delete)) {
                session_start();
                $_SESSION['error'] = "<span class='btn btn-success' style='color: white;'>Success fully delete </span>";
                header('Location: ../../views/phonebook/index.php');
            }else{
                session_start();
                $_SESSION['error'] = "<span class='btn btn-danger' style='color: green;'>Not delete yet </span>";
                header('Location: ../../views/phonebook/index.php');
            }

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}