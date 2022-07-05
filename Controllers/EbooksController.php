<?php
  session_start();
   class EbooksController{
       private $book;
      function __construct() {
         require_once  'Models/Book.php';
         $this->book = new Book();
          require_once "Models/Student.php";
          $this->student=new Student();
      }
      
function Index(){
    if(isset($_SESSION['sid'])) {
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      $result =  $this->student->studentProfile();
      $result1 = $this->book->seleteEbook();
require_once "Views/Books/Ebooks/index.php";
} else {
      header("Location: ../Students/index");
   }     
}

function search(){
 if(isset($_SESSION['sid'])) {  
     $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      $result =  $this->student->studentProfile();
     $key = $_GET['search'];
    $result1 = $this->book->selectRecordBasedOnKey($key);
        require_once "Views/Books/Ebooks/index.php";
 } else {
       header("Location: ../Students/index");
    }
}

}
?>