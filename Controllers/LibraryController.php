<?php
 session_start();
   class LibraryController{
    private $book;
            private $student;
  	   function __construct(){
                   require_once  'Models/Book.php';
         $this->book = new Book();
  	   	  require_once "Models/Student.php";
          $this->student=new Student();
  	   }
function Receive(){
    if(isset($_SESSION['sid'])) {
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
       $this->book->setSid($sid);
      $result =  $this->student->studentProfile();
   $result1 = $this->book->receivedBook();
   
require_once "Views/Books/library/receive.php";
} else {
      header("Location: ../Students/index");
   
     }
}      

function searchReceive(){
 if(isset($_SESSION['sid'])) {  
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
       $this->book->setSid($sid);
      $result = $this->student->studentProfile();
     $key = $_GET['search'];
    $result1 = $this->book->selectRecordBasedOnKeyyyy($key);
        require_once "Views/Books/library/receive.php";
 } else {
       header("Location: ../Students/index");
    }
}

function searchRequest(){
 if(isset($_SESSION['sid'])) {  
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
       $this->book->setSid($sid);
      $result =  $this->student->studentProfile();
     $key = $_GET['search'];
    $result1 = $this->book->selectRecordBasedOnKeyyy($key);
        require_once "Views/Books/library/request.php";
 } else {
       header("Location: ../Students/index");
    }
}

function Request(){
    if(isset($_SESSION['sid'])) {
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      $result =  $this->student->studentProfile();
       $this->book->setSid($sid);
      
       $result1 = $this->book->requestedBook();
require_once "Views/Books/library/request.php";
} else {
      header("Location: ../Students/index");
   
     }
}      

 function decline() {
    if(isset($_SESSION['sid'])) {
       $sid = $_GET['sid'];
       $isbn = $_GET['bisbn'];

       if(is_numeric($sid)) {
            $this->book->setSid($sid);
            $this->book->setBisbn($isbn);

            if($this->book->declineBook()) {
               echo "<script>alert('Book request declined.');
               location = 'request';
               </script>";
            } else {
               echo "<script>alert('Somthing went wrong. Try again!');
               location = 'request';
                </script>";
            }
       } else {
          echo "Somthing went wrong";
       }
    }
 }

}
?>

