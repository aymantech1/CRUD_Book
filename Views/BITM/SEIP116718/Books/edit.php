<?php
include_once '../../../../vendor/autoload.php';
use App\BITM\SEIP116718\Book\Book;

session_start();
if (isset($_SESSION['Message'])) {
    echo $_SESSION['Message'];
    unset($_SESSION['Message']);
}

$id = $_GET['id'];

$edit = new Book();
$show = $edit->show($id);
//print_r($show);
?>

<html>
    <head>
        <title>
            Update Your Book name
        </title>
    </head>
    <body>
        <fieldset>
            <legend>
                Update Favorite Book name
            </legend>
            <form action="update.php" method="post">
                <label for="update_id">Update Book Name</label>
                <input type="text" name="title" id="update_id" value="<?php echo $show['title'];?>">
                <input type="submit" value="Update">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                
            </form>
        </fieldset>
    </body>
</html>