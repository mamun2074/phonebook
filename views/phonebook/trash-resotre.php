<?php
/**
 * Created by PhpStorm.
 * User: Mahmud
 * Date: 12/29/2017
 * Time: 8:28 AM
 */

include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();

$crud->reStoreTrash($_GET['id']);
header('location:index.php');