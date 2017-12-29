<?php


include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();

if (!empty($_POST)){
    $crud->setName($_POST);
    $crud->setNumber($_POST);

    $crud->storeData();
}else{
    header('location:index.php');
}






