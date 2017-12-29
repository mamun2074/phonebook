<?php
/**
 * Created by PhpStorm.
 * User: Mahmud
 * Date: 12/29/2017
 * Time: 7:55 AM
 */


include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();
$crud->trashRow($_GET['id']);

header('location:index.php');