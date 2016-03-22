<?php
session_start();

if(isset($_SESSION['Massage'])){
    echo $_SESSION['Massage'];
    unset($_SESSION['Massage']);
}
?>
<html>
    <head>
        <title>
            Create | Book 
        </title>
    </head>
    <body>
        <fieldset>
            <legend>
                Add Book Title
            </legend>
            <form action="store.php" method="post">
                <label for="title">Enter Book Title</label>
                <input id="title" name="title" type="test" placeholder="Book Title">.<br><br>
                <button type="submit" tabindex="1">Save</button>
                <button type="submit" >Save & Create Again</button>
                <input type ="reset" value="reset"/>
            </form>
        </fieldset>
    </body>
</html>
