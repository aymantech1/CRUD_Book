<?php
include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;
session_start();

$update = new Book();
$update->prepare($_POST);
$update->update();
print_r($_POST);