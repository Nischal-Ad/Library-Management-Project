<?php
session_start();
   class StudentsController{
            private $student;
            public $result1;
            public $result2;
  	   function __construct(){
  	   	  require_once "Models/Student.php";
          $this->student=new Student();
  	   }

function Index(){
require_once "Views/User/index.php";
}      

function Home(){
      
        if(isset($_SESSION['sid'])) {
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      $result =  $this->student->studentProfile();
      $this->result1 = $this->student->countReceived();
       $this->result2 = $this->student->countRequested();
         require_once "Views/User/dashboard.php";

         
   } else {
      header("Location: ../Students/index");
   
     }
}  



function About(){
      if(isset($_SESSION['sid'])) {
       $sid = $_SESSION['sid'];
       $this->student->setSid($sid);
      //  echo"Hekko";
      //  die;
      $result =  $this->student->studentProfile();
require_once "Views/User/about.php";
   } else {
      header("Location: ../Students/index");
   }

}  
function Borrow(){
   $result = $this->student->booksBorrowded();
   
require_once "Views/students/borrow.php";
} 

function Request(){

require_once "Views/students/request.php";
} 

function Register(){
require_once "Views/students/register.php";
}    


function Details(){
 if(isset($_SESSION['id'])) {  
      $result = $this->student->selectAllRecord();
require_once "Views/students/index.php";
 } else {
        header("Location: ../admin/index");
    }
}

function search(){
 if(isset($_SESSION['id'])) {  
     $key = $_GET['search'];
    $result = $this->student->selectRecordBasedOnKey($key);
        require_once "Views/students/index.php";
 } else {
        header("Location: ../admin/index");
    }
}

function LoginCheck(){
if(empty($_POST["Semail"]) || empty($_POST["Spassword"]))
{
echo "Enter data in all feild";
}
else
{
     $Semail=$_POST["Semail"];
     $Spassword=$_POST["Spassword"];

     $this->student->setSemail($Semail);
     $this->student->setSpassword($Spassword);

     $result=$this->student->checkStudent();
     $rowcount=mysqli_num_rows($result);
     if($rowcount==0){
         echo "<script> alert ('Login Failed!'); 
           location='index';  </script>";
        }
        else{
            $row = $result->fetch_assoc();

            $_SESSION['id'] = uniqid();
            $_SESSION['sid'] = $row['sid'];
            header('Location: ../students/home');
        }               
}
}

function logout() {
    if(isset($_SESSION['sid'])) {
            session_destroy();
            header("Location: ../Students/index");
    } 
}

function RegisterCheck(){
if(empty($_POST["Semail"]) 
|| empty($_POST["Saddress"]) || empty($_POST["Sphone"]) || empty($_POST["Sgender"]))
{
    echo "Enter data in all feild";
}
else{
     $Sname=$_POST["Susername"];
    $Semail=$_POST["Semail"];
     $Saddress=$_POST["Saddress"];
     $Sphone=$_POST["Sphone"];
     $Sgender=$_POST["Sgender"];
     $Simage = $_FILES['Simage'];

     if($Simage['size'] == 0 || $Simage['error'] > 0) {
        echo "<script> alert ('Please upload a photo.') </script>";
     } 
     
     // validation part goes here


     // check  email existance
     $this->student->setSemail($Semail);
     if(!($this->student->checkMail())) {
         echo "<script> alert ('Email already exist!') </script>";
         die;
     }
     

     $this->student->setSname($Sname);
      $this->student->setSphone($Sphone);
       $this->student->setSemail($Semail); 
     $this->student->setSgender($Sgender);
         $this->student->setSimage($Simage);
       $this->student->setSaddress($Saddress);
       $this->student->image = $Simage;


       if($this->student->insertStudent()) {
          
            echo "<script> alert ('Student added successfully!'); 
            location= 'Details';
            </script>";

       } else {
                    echo "<script> alert ('Unable to insert record!');  
                        location = 'register';
                    </script>";

       }


    }


}


function fetchProfile(){
    if(isset($_SESSION['id'])) {
     
           require_once "Views/students/profile.php";
}
else {
          header("Location: ../Students/index");
       }
      }

 function deleteStudent() {
    if(isset($_SESSION['id'])) {
       $sid = $_GET['sid'];
       // validate it

       if(is_numeric($sid)) {
         
         $this->student->setsid($sid);
         if($this->student->deleteStudent()) {
            echo "<script>alert('Students record deleted successfully.');
               location = 'details';
            </script>";
         } else {
            echo "<script>alert('Somthing went wrong. Try again!');
             location = 'details';
            </script>";
         }

       } else {
          echo "Somthing went wrong!";
       }
    }
 }

 

function changePassword(){
 if(isset($_SESSION['sid'])) {
    if(isset($_POST['submit'])){
				$old = $_POST['oldpass'];
				$new = $_POST['newpass'];
            	$cnew = $_POST['cpass'];
               if($_POST['newpass']!=$_POST['cpass']){
                  	echo "<script> alert ('Incorrect Password!');
					        location='home';
					       </script>";
                     // echo "wrong";
               }
               else{
				 $sid = $_SESSION['sid'];
				$this->student->setSid($sid);
				$this->student->setSpassword($old);
				$result=$this->student->checkPassword();
     $rowcount=mysqli_num_rows($result);
				if($rowcount==0){
					echo "<script> alert ('Incorrect Password!');
					        location='home';
					       </script>";
				}else{
					$this->student->setSid($sid);
//  $this->student->setSnewpassword($new);
        $this->student->setScpassword($cnew);
           
					$result=$this->student->changePassword();
					echo "<script> alert ('Password Changed!');
					location='home';
					</script>";
            }
         }
			}


}
else {
       header("Location: ../Students/index");
    }

}
   }
?>

