<?php

include_once '../../src/Admin/PhoneBook/Crud.php';


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $crud = new Crud();
    $crud->deleteRow($_GET['id']);

} else {

    header('location:index.php');
}
header('location:index.php');




