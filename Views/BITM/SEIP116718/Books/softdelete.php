<?php

include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

session_start();
if (isset($_SESSION['Message'])) {
    echo $_SESSION['Message'];
    unset($_SESSION['Message']);
}

$id  = $_GET['id'];
echo $id;

$softdel = new Book();
$softdel->prepare($_GET);
$alldel = $softdel->softdelete();

