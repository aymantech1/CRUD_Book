<?php

include_once '../../../../vendor/autoload.php';

use App\BITM\SEIP116718\Book\Book;

$processingData = new Book();

$processingData->prepare($_POST);

$processingData->storeDataInDatabase();
