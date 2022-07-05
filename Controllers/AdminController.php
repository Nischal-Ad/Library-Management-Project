<?php
    session_start();
   class AdminController{
     private $librarian;
      public $result1;
      public $result2;
      public $result3;
      public $result4;
      public $result5;

  	function __construct(){
  	   	  require_once "models/Librarian.php";
          $this->librarian = new Librarian();
        
  	   }
      
function Index(){
require_once "Views/admin/index.php";
}



function logout() {
    if(isset($_SESSION['id'])) {
            session_destroy();
            header("Location: /lms/admin/index");
    } 
}

function Home(){
    if(isset($_SESSION['id'])) {
         $this->result1 = $this->librarian->countRequested();
            $this->result2 = $this->librarian->countEbooks();
            $this->result3 = $this->librarian->countBooks();
            $this->result4 = $this->librarian->countStudents();
            $this->result5 = $this->librarian->countBorrowed();

        require_once "Views/admin/dashboard.php";
    } else {
        header("Location: ../admin/index");
    }
}    

function Register(){
    if(isset($_SESSION['id'])) {
require_once "Views/admin/register.php";
 } else {
        header("Location: ../admin/index");
    }
}    

function LoginCheck(){
if(empty($_POST["lemail"]) && empty($_POST["lpassword"]))
{
echo "Enter data in all feild";
}
else
{
     $Lemail=trim($_POST["lemail"]);
     $Lpassword= $_POST["lpassword"];

     // validation part
     if(!filter_var($Lemail,FILTER_VALIDATE_EMAIL)) {
         echo "<script> alert('Please enter valid email');
         location = 'index';
         </script>";
     }

     $this->librarian->setLemail($Lemail);
     $this->librarian->setLpassword($Lpassword);

     $result=$this->librarian->checkLibrarian();
     $rowcount=mysqli_num_rows($result);
     if($rowcount==0){
         echo "<script> alert ('Incorrect email or password!'); 
           location='index';  </script>";
        }
        else{
            $row = $result->fetch_assoc();

            $_SESSION['id'] = uniqid();
            $_SESSION['lid'] = $row['lid'];
            header('Location: ../admin/home');
        }               
}
}

// function RegisterCheck(){
// if(empty($_POST["Lemail"]) || empty($_POST["Lpassword"]) || empty($_POST["Lcpassword"]) || empty($_POST["Lusername"]) 
// || empty($_POST["Laddress"]) || empty($_POST["Lphone"]) || empty($_POST["Lgender"]) || empty($_POST["Limage"]))
// {
//     echo "Enter data in all feild";
// }
// else{
//      $Lusername=$_POST["Lusername"];
//     $Lemail=$_POST["Lemail"];
//      $Lpassword=$_POST["Lpassword"];
//      $Lcpassword=$_POST["Lcpassword"];
//      $Laddress=$_POST["Laddress"];
//      $Lphone=$_POST["Lphone"];
//      $Lgender=$_POST["Lgender"];
//      $Limage = $_FILES['Limage'];
// if ($Lcpassword === $Lpassword) {
//        $sql="select * from librarian WHERE (email='$Lemail');";
//          	  	$conn=new mysqli("localhost","root","","library");
//         $res=mysqli_query($conn,$sql);
//         if (mysqli_num_rows($res) > 0) {
//         // output data of each row
//         $row = mysqli_fetch_assoc($res);
//         }
//         if ($Lemail==$row['email'])
//         {
//             echo "Email already exists";
//         }
//         else{ 
//     print_r($Limage);
// $filename = $Limage['name'];
// $destfile = "Images/Admin/".$filename;
// if(move_uploaded_file($Limage['tmp_name'], $destfile)){
// echo "successfully";
// }
// else{
//     echo 'failed';
// }
// $Limage = "/lms/views/Images/Admin/".$filename;
//       $this->librarian->setLusername($Lusername);
//      $this->librarian->setLemail($Lemail);
//      $this->librarian->setLpassword($Lpassword);
//             //    $this->librarian->Lcpassword=$Lcpassword;
//                  $this->librarian->setLaddress($Laddress);
//           $this->librarian->setLphone($Lphone);
//            $this->librarian->setLgender($Lgender);
//                    $this->librarian->setLimage($Limage);

//                     $result=$this->librarian->registeradmin();
//                 if($result==TRUE){
//                 	echo "<script> alert ('Inserted Successfully!'); 
//    location='Register';
//                      </script>";
//                 }else{
//                 	echo "<script> alert ('Failed to Insert!'); 
//       location='Register';
//                      </script>";
//                 }
                
// }
        
//         }
   
// else{
//     echo 'password incorrect';
// }
        
// }
// }
}


?>