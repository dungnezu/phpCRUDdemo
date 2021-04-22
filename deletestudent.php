<?php
$connection= require_once './Connection.php';

if(isset($_GET['id'])){
    $connection->deleteStudent($_GET['id']);
}