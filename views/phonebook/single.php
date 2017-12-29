<?php
/**
 * Created by PhpStorm.
 * User: Mahmud
 * Date: 12/29/2017
 * Time: 12:01 PM
 */

include_once '../../src/Admin/PhoneBook/Crud.php';
$crud = new Crud();
if (isset($_POST['userid'])){
    $value=$crud->showOne($_POST['userid']);

    echo json_encode($value);

}