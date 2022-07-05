<?php

// data members and their getter setter

// data members
class Student{
    private $Sid;
    private $Sname;
    private $Sphone;
    //private $Susername;
    private $Semail;
    private $Spassword;
      private $Snewpassword;
    private $Scpassword;
    private $Saddress;
    private $Simage;
    private $Sgender;
    private $conn;
    public $image;

  function __construct(){
		require_once "service/Config.php";
		$this->conn=Config::getConnection();
	}
    
// publlic getter and setter for privvate data members 
public function setSid($Sid){
    $this->Sid = $Sid;
}
public function getSid(){
    return $this->Sid;
}

public function setSusername($Susername){
    $this->Susername = $Susername;
}
public function getSusername(){
    return $this->Susername;
}

public function setSname($Sname){
    $this->Sname = $Sname;
}
public function getSname(){
    return $this->Sname;
}

public function setSphone($Sphone){
    $this->Sphone = $Sphone;
}
public function getSphone(){
    return $this->Sphone;
}

public function setSemail($Semail){
    $this->Semail = $Semail;
}
public function getSemail(){
    return $this->Semail;
}

public function setSpassword($Spassword){
    $this->Spassword = $Spassword;
}
public function getSpassword(){
    return $this->Spassword;
}

public function setSnewpassword($Snewpassword){
    $this->Snewpassword = $Snewpassword;
}
public function getSnewpassword(){
    return $this->Snewpassword;
}

public function setScpassword($Scpassword){
    $this->Scpassword = $Scpassword;
}
public function getScpassword(){
    return $this->Scpassword;
}

public function setSaddress($Saddress){
    $this->Saddress = $Saddress;
}
public function getSaddress(){
    return $this->Saddress;
}

public function setSimage($Simage){
    $this->Simage = $Simage;
}
public function getSimage(){
    return $this->Simage;
}

public function setSgender($Sgender){
    $this->Sgender = $Sgender;
}
public function getSgender(){
    return $this->Sgender;
}

public function booksBorrowded(){
     $sql = "SELECT * FROM request INNER JOIN books INNER JOIN student ON request.bisbn_no = books.bisbn_no AND request.sid = student.sid; "; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}
function countReceived(){
   $sql = "SELECT COUNT(sid) AS TotalRequest FROM request WHERE sid= '{$_SESSION['sid']}' AND isBorrowed= 1"; 
    $result = $this->conn->query($sql);

 $result = $this->conn->query($sql);
   if($result){
    return $result;
}    
}

function countRequested(){
 
 $sql = "SELECT COUNT(sid) AS TotalRequest FROM request WHERE sid= '{$_SESSION['sid']}' AND isBorrowed= 0"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}

// method 
	function checkStudent() {
        
        $sql = "SELECT sid FROM student WHERE semail = '$this->Semail' AND spassword = '$this->Spassword'";

        $result=$this->conn->query($sql);
        return $result;
	}



       function checkMail() {
           $sql = "SELECT semail FROM student WHERE semail = '$this->Semail'";
           $result = $this->conn->query($sql);
           if(mysqli_num_rows($result) === 0) {
               return true;
           }
           return false;
       }

       function insertStudent() {
            // call function to generate random password here
            $this->Spassword = $this->randomPassword();

            // call function to upload image
            if($this->uploadImage()) {

                $sql = "INSERT INTO student (sname, semail, snumber, spassword, sadd, sgender,simage) VALUES ('$this->Sname', '$this->Semail', '$this->Sphone', '$this->Spassword', '$this->Saddress', '$this->Sgender', '$this->Simage')";


                if($this->conn->query($sql)) {
                    return true;
                } else {
                    // make else part and if query is unable to execute
                    // delete uploaded image by taking its name
                }
                return false;
            }
            return false;
           
       }

       function randomPassword() {
            // $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $alphabet = '12345678';
            $pass = array(); //remember to declare $pass as an array
            // $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            // for ($i = 0; $i < 8; $i++) {
            //     $n = rand(0, $alphaLength);
                $pass[] = $alphabet;
            // }
            return implode($pass); //turn the array into a string
        }

       function uploadImage() {
       $fileTmpName = $this->image['tmp_name'];
		$fileSize = $this->image['size'];
		$fileError = $this->image['error'];
		$fileType = $this->image['type'];
 $fileName = $this->image['name'];
		$fileExt = explode('.',$fileName);

	   
			$fileActualExt = strtolower(end($fileExt));

		$allow = array('jpg','jpeg', 'png', 'gif');

        	if(in_array($fileActualExt, $allow)) {
			if($fileError === 0) {
				if($fileSize < 5000000) {
					$fileNameNew = uniqid('',true).".".$fileActualExt;
					$fileDest = 'Images/Student/'.$fileNameNew;
                    $this->Simage = $fileNameNew;
					move_uploaded_file($fileTmpName, $fileDest);
					return true;
				} 

            } 
            return false;   

    }
}

function selectAllRecord() {
    $sql = "SELECT * FROM student ORDER BY sid DESC";

    $result = $this->conn->query($sql);

    return $result;

}
function deleteStudent(){
    $sql = "DELETE FROM student WHERE sid = '$this->Sid'";

    $result = $this->conn->query($sql);
    return $result;
}

function studentProfile() {

    $sql = "SELECT * FROM student WHERE sid = '$this->Sid'";
    // echo $this->Sid;
    // die;
    $result = $this->conn->query($sql);

    return $result;
}


function selectRecordBasedOnKey($key) {
    $sql = "SELECT * FROM student WHERE sname LIKE "."'$key"."%'";
    $result = $this->conn->query($sql);
    return $result;
}

 function changePassword(){
        $sql = "UPDATE student SET spassword = '$this->Scpassword' WHERE sid = '$this->Sid'";
        $result = $this->conn->query($sql);
        return $result;
    }

    function checkPassword(){
        $sql = "SELECT sid FROM student WHERE sid = '$this->Sid' AND spassword = '$this->Spassword'";
     
        $result=$this->conn->query($sql);
        return $result;
    }
}
?>
