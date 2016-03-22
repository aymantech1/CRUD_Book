<?php
$id = $_GET['id'];
//echo $id;
include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

$restore = new Book();

$re = $restore->restoreData($id);

echo $re;
