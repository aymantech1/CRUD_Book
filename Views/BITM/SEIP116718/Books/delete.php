<?php

include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

$id = $_GET['id'];
echo $id;

$delete = new Book();
$delete ->permanentDelete($id);