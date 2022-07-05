<?php
session_start();
   class BooksController{
      private $book;
       private $ebook;

      function __construct() {
         require_once  'Models/Book.php';

         $this->book = new Book();

          require_once  'Models/Ebook.php';

         $this->ebook = new Ebook();
      }
      
function Ebooks(){
   if(isset($_SESSION['id'])) { 
       $result = $this->book->selectAllEbooks();
require_once "Views/Books/admin/ebooks.php";
   }else {
       header("Location: ../admin/index");
    }
}  

function Pbooks(){
    if(isset($_SESSION['id'])) {
   $result = $this->book->selectAllRecord();
   require_once "Views/Books/admin/pbooks.php";
} else{
 header("Location: ../admin/index");
}
}

function search(){
 if(isset($_SESSION['id'])) {  
      
     $key = $_GET['search'];
    $result = $this->book->selectRecordBasedOnKeyy($key);
      require_once "Views/Books/admin/pbooks.php";
 } else {
    header("Location: ../admin/index");
    }
}

function searchEbooks(){
 if(isset($_SESSION['id'])) {  
     $key = $_GET['search'];
    $result = $this->book->selectRecordBasedOnKey($key);
       require_once "Views/Books/admin/ebooks.php";
 } else {
       header("Location: ../admin/index");
    }
}

function Request(){
   if(isset($_SESSION['id']) && isset($_SESSION['lid'])) {
      $result = $this->book->bookRequested();
      require_once "Views/students/request.php";
   }
}

function AddBook(){
if(isset($_SESSION['id']) && isset($_SESSION['lid'])) {
   if(empty($_POST["isbn"]) || empty($_POST["name"]) || empty($_POST["publication"]) || empty($_POST["category"]) || empty($_POST["author"]) || empty($_POST["price"]) || empty($_POST["stock"]))
{
echo "Enter data in all feild";
}
else
{
   $Bisbn=trim($_POST["isbn"]);
   $Bname=trim($_POST["name"]);
   $Bpublication=trim($_POST["publication"]);
   $Bcategory=trim($_POST["category"]);
   $Bauthor=trim($_POST["author"]);
   $Bprice=trim($_POST["price"]);
   $Bstock=trim($_POST["stock"]);

   //validation part goes here

   $this->book->setBisbn($Bisbn);
   $this->book->setBname($Bname);
   $this->book->setBpublication($Bpublication);
   $this->book->setBcategory($Bcategory);
   $this->book->setBauthor($Bauthor);
   $this->book->setBprice($Bprice);
   $this->book->setBstock($Bstock);
   $this->book->setLid($_SESSION['lid']);
   
   if($this->book->addBook()) {
      echo "<script>alert('Student added successfully!');
         location = 'pbooks';
      </script>";
   } else {
      echo "<script>alert('Unable to insert record. Try');
      
       location = 'pbooks';
      
      </script>";
   }
}
}else {
    header("Location: ../admin/index");
    }
}

 function deleteBook() {
    if(isset($_SESSION['id'])) {
       $bisbn = $_GET['isbn'];
       // validate it

     
         
         $this->book->setBisbn($bisbn);
         if($this->book->deleteBook()) {
            echo "<script>alert('Successfully book record deleted.');
               location = 'pbooks';
            </script>";
         } else {
            echo "<script>alert('Somthing went wrong. Try again!');
             location = 'pbooks';
            </script>";
         }

       
    }
 }
 
 function deleteEbook() {
    if(isset($_SESSION['id'])) {
       $eid = $_GET['id'];
       // validate it

     
         
         $this->ebook->setEid($eid);
         if($this->ebook->deleteEbook()) {
            echo "<script>alert('Successfully book record deleted.');
               location = 'ebooks';
            </script>";
         } else {
            echo "<script>alert('Somthing went wrong. Try again!');
             location = 'ebooks';
            </script>";
         }

      
    } else {
    header("Location: ../admin/index");
    }
 } 
 
 function requestBook() {
    if(isset($_SESSION['id']) && isset($_SESSION['sid'])) {
       $isbn = $_GET['isbn'];

       // don't forgot to validate it

       // set it to model
      $this->book->setBisbn($isbn);
      $this->book->setSid($_SESSION['sid']);
       
      if($this->book->requestBook()) {
         echo "<script>alert('Successfully book requested.');
               location = '../pbooks/index';
            </script>";
      } else {
         echo "<script>alert('Somthing went wrong. Try again!');
             location = '../pbooks/index';
            </script>";
      }

    }
 }

 function accept() {
    if(isset($_SESSION['id'])) {
       $sid = $_GET['sid'];
       $isbn = $_GET['bisbn'];

       if(is_numeric($sid)) {
            $this->book->setSid($sid);
            $this->book->setBisbn($isbn);

            if($this->book->acceptBook()) {
               echo "<script>alert('Successfully book request accepted.');
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

 function searchBorrow(){
 if(isset($_SESSION['id'])) {  
     $key = $_GET['search'];
    $result = $this->book->selectRecordBasedOnKeyBorrow($key);
       require_once "Views/students/borrow.php";
 } else {
    header("Location: ../admin/index");
    }
}

function searchRequest(){
 if(isset($_SESSION['id'])) {  
     $key = $_GET['search'];
    $result = $this->book->selectRecordBasedOnKeyRequest($key);
       require_once "Views/students/request.php";
 } else {
    header("Location: ../admin/index");
    }
}

 function decline() {
    if(isset($_SESSION['id'])) {
       $sid = $_GET['sid'];
       $isbn = $_GET['bisbn'];

       if(is_numeric($sid)) {
            $this->book->setSid($sid);
            $this->book->setBisbn($isbn);

            if($this->book->declineBook()) {
               echo "<script>alert('Book request declined.');
               location = '/lms/students/request';
               </script>";
            } else {
               echo "<script>alert('Somthing went wrong. Try again!');
               location = '/lms/students/request';
                </script>";
            }
       } else {
          echo "Somthing went wrong";
       }
    }
 }

 function submit() {
    if(isset($_SESSION['id'])) {
       $sid = $_GET['sid'];
       $isbn = $_GET['bisbn'];

      
            $this->book->setSid($sid);
            $this->book->setBisbn($isbn);

            if($this->book->submittedBook()) {
               echo "<script>alert('Book Submitted.');
                location = '/lms/students/borrow';
               </script>";
               //  header("Location: ../admin/index");
            } else {
               echo "<script>alert('Somthing went wrong. Try again!');
               location = '/lms/students/borrow';
                </script>";
            }
       
    }
 }


function updateBooks(){
   if(isset($_SESSION['id'])) {
      // $bisbn_no=$_POST['bisbn_no'];
		// 		$bname=$_POST['bname'];
		// 		$bauthor=$_POST['bauthor'];
		// 		$bcategory=$_POST['bcategory'];
		// 		$bprice=$_POST['bprice'];
		// 		$bpublication=$_POST['bpublication'];
		// 		$bstock=$_POST['bstock'];
				// if (empty($fid)||empty($aname)||empty($aemail)||empty($apassword)||empty($askill)||empty($aaddress)||empty($aphone)) {
				// 	echo "<script>alert('All field required');
				// 	location = 'freelancer';
				// 	</script>";

				// }else{ 

 if(empty($_POST["isbn"]) || empty($_POST["name"]) || empty($_POST["publication"]) || empty($_POST["category"]) || empty($_POST["author"]) || empty($_POST["price"]) || empty($_POST["stock"]))
{
 echo "<script>alert('Enter data in all feild!');
         location = 'pbooks';
      </script>";
}
else
{
   $Bisbn=trim($_POST["isbn"]);
   $Bname=trim($_POST["name"]);
   $Bpublication=trim($_POST["publication"]);
   $Bcategory=trim($_POST["category"]);
   $Bauthor=trim($_POST["author"]);
   $Bprice=trim($_POST["price"]);
   $Bstock=trim($_POST["stock"]);


					   $this->book->setBisbn($Bisbn);
   $this->book->setBname($Bname);
   $this->book->setBpublication($Bpublication);
   $this->book->setBcategory($Bcategory);
   $this->book->setBauthor($Bauthor);
   $this->book->setBprice($Bprice);
   $this->book->setBstock($Bstock);
   $this->book->setLid($_SESSION['lid']);



				 if($this->book->updateBook()) {
      echo "<script>alert('books added successfully!');
         location = 'pbooks';
      </script>";
   } else {
      echo "<script>alert('Unable to update books!');
      
       location = 'pbooks';
      
      </script>";
   }

   }
}
}
   }
?>