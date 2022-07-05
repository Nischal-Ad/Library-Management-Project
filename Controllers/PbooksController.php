<?php
   session_start();
   class PbooksController{
      private $book;
      public $count;
      function __construct() {
         
         require_once  'Models/Book.php';
         $this->book = new Book();
           require_once "Models/Student.php";
          $this->student=new Student();

         //  $this->countReceive = $this->book->countReceived();
         //  header('Location: Students/Home');
      }
      
function Index(){
   if(isset($_SESSION['id']) && $_SESSION['sid']) {
      $this->book->setSid($_SESSION['sid']);
    

        $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      $result =  $this->student->studentProfile();
      
        $result1 = $this->book->selectBooks(); 
      require_once "./views/books/Pbooks/index.php";
   } else {
      header("Location: ../Students/index");
   }
}      

 function countReceive() {
     if(isset($_SESSION['sid'])) {
        $sid = $_SESSION['sid'];
         // $sid = $_GET['sid'];
          $this->book->setSid($sid);
      $result =  $this->book->countReceived();
       require_once "Views/User/dashboard.php";

    }
    else {
       header("Location: ../Students/index");
    }
 }


 function search(){
 if(isset($_SESSION['sid'])) {  
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
       $this->book->setSid($sid);
      $result =  $this->student->studentProfile();
     $key = $_GET['search'];
    $result1 = $this->book->selectRecordBasedOnKeyy($key);
        require_once "Views/Books/Pbooks/index.php";
 } else {
       header("Location: ../Students/index");
    }
}
}
?>