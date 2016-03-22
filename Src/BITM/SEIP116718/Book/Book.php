<?php

namespace App\BITM\SEIP116718\Book;

class Book {
    public $id = "";
    public $title = "";
    
    public function __construct() {
        $conn = mysql_connect('localhost', 'root', '') or die("Unable to connect");
        mysql_select_db('atomicproject') or die('Unable to connect with DB');
    }
    
    public function prepare($data = ""){
        $this->id = $data['id'];
        $this->title = $data['title'];
    }
    
    public function storeDataInDatabase(){
        
        session_start();
        $query ="INSERT INTO `books` (`id`, `title`) VALUES (NULL, '".$this->title."');";
        
        if(mysql_query($query)){
            $_SESSION['Massage'] = "Successfully Done";
        }
        else
            $_SESSION['Massage'] = "Not Done By Me Sorry ";
        
        header('location:create.php');
            
    }
    
    public function index(){
        $mydata = array();
        $qurey = "SELECT * FROM `books` WHERE deleted_at IS NULL";
        $result = mysql_query($qurey);
        while($row = mysql_fetch_assoc($result)){
            $mydata[] = $row;
        }
        return $mydata;
        }
    
        public function show($id=''){
            $this->id = $id;
            $query ="SELECT * FROM books WHERE id=".$this->id ;
            $result = mysql_query($query);
            $row = mysql_fetch_assoc($result);
            return $row;
        }
        
        public function update(){
            $query = "UPDATE `atomicproject`.`books` SET `title` = '".$this->title."' WHERE `books`.`id` =".$this->id;
            mysql_query($query);
            $_SESSION['Message'] = "<h2>" . "Data Successfully Updated" . "</h2>";
        header('location:index.php');
        }
          public function softdelete(){
        session_start();
        $query = "UPDATE `atomicproject`.`books` SET `deleted_at` = '".date('Y-m-d')."' WHERE `books`.`id` =".$this->id;
        mysql_query($query);
        $_SESSION['Message'] = "<h1>" . "Deleted Successfully" . "</h1>";
        header('location:index.php');
    }
    
    public function deleteitems(){
        $mydata = array();
        $qurey = "SELECT * FROM `books` WHERE deleted_at IS Not NULL";
        $result = mysql_query($qurey);
        while($row = mysql_fetch_assoc($result)){
            $mydata[] = $row;
        }
        return $mydata;
    }
    
    public function restoreData($id=''){
        session_start();
        $this->id = $id;
        $qurey = "UPDATE `books` SET `deleted_at` = NULL WHERE `books`.`id` =".$this->id;
        $result = mysql_query($qurey);
        $_SESSION['Message'] = "<h2>" . "Data Successfully Restore" . "</h2>";
        header('location:index.php');
        
    }

        public function permanentDelete($id=''){
        $this->id= $id;
        $query = "DELETE FROM `atomicproject`.`books` WHERE `books`.`id` =".$this->id;
        mysql_query($query);
        $_SESSION['Message'] = "<h1>". "Deleted Successfully" ."</h1>";
        header('location:index.php');
        $_SESSION['Message'] = "<h1>". "Deleted Successfully" ."</h1>";
    }
}
