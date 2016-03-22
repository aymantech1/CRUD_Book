<?php
include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

session_start();
if (isset($_SESSION['Message']) ) {
    echo $_SESSION['Message'];
   unset($_SESSION['Message']);
}

$books = new Book();
$allbooks = $books->index();
//echo"<pre>";
//print_r($allbooks);
//echo"</pre>";
?>
<html>
    <head>
        <title>Book | Home</title>
    </head>
    <body>
        <a href="create.php">Create Book Title</a>
        <a href="deleteitem.php"> Delete Item</a>
        
        <table border="1">
            <tr>
                <th>Serial</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
         <?php 
         if(isset($allbooks) && !empty($allbooks)){
            $serial = 0;
            foreach($allbooks as $row){
                $serial++;
          ?>
            <tr>
                <td><?php echo $serial?></td>
                <td><?php echo $row['title']?></td>
                <td>
                    <a href="show.php?id=<?php echo $row['id']?>">Show Details</a>
                    <a href="edit.php?id=<?php echo $row['id']?>">Edit</a>
                    <a href="softdelete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php
            }
         }
         else
         {
             ?>
            <tr>
                   <td colspan="3"><?php echo "No data available";?></td>
            </tr>
            <?php
         }
            ?>
        </table>
    </body>
</html>