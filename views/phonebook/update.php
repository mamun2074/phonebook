<?php
/**
 * Created by PhpStorm.
 * User: Mahmud
 * Date: 12/28/2017
 * Time: 11:44 AM
 */



include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();

if (!empty($_POST)){
    $crud->setName($_POST);
    $crud->setNumber($_POST);

    $crud->updateData($_POST['id']);
    header('location:update.php');

}else{
    header('location:index.php');
}

