<?php

include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

$id = $_GET['id'];
//echo $id;

$book = new Book();

$onebook = $book->show($id);

//print_r($onebook);
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>
    <tr>
        <td><?php echo $onebook['id']?></td>
        <td><?php echo $onebook['title']?></td>
        <td><?php echo $onebook['created_at']?></td>
        <td>
            <a href="edit.php?id=<?php echo $onebook['id']?>">Edit</a> |
            <a href="softdelete.php?id=<?php echo $onebook['id']; ?>">Delete</a> 
        </td>
    </tr>
</table>