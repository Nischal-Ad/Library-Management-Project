<?php

class Librarian{
    private $Lid;
    private $Lemail;
    private $Laddress;
    private $Lphone;
    private $Lpassword;
    private $Lusername;
    private $Lcpassword;
    private $Lgender;
    private $Limage;
    private $conn;

    function __construct(){
		require_once "service/Config.php";
		$this->conn=Config::getConnection();
	}

public function setLid($Lid){
    $this->Lid=$Lid;
}
public function getLid(){
    return $this->Lid;
}

public function setLusername($Lusername){
    $this->Lusername=$Lusername;
}
public function getLusername(){
    return $this->Lusername;
}

public function setLemail($Lemail){
    $this->Lemail=$Lemail;
}
public function getLemail(){
    return $this->Lemail;
}
public function setLaddress($Laddress){
    $this->Laddress=$Laddress;
}
public function getLaddress(){
    return $this->Laddress;
}
public function setLphone($Lphone){
    $this->Lphone=$Lphone;
}
public function getLphone(){
    return $this->Lphone;
}

public function setLpassword($Lpassword){
    $this->Lpassword=$Lpassword;
}
public function getLpassword(){
    return $this->Lpassword;
}

public function setLcpassword($Lcpassword){
    $this->Lcpassword=$Lcpassword;
}
public function getLcpassword(){
    return $this->Lcpassword;
}

public function setLgender($Lgender){
    $this->Lgender=$Lgender;
}
public function getLgender(){
    return $this->Lgender;
}
public function setLimage($Limage){
    $this->Limage=$Limage;
}
public function getLimage(){
    return $this->Limage;
}


// method 
	function checkLibrarian(){
        $sql="SELECT lid FROM librarian WHERE lemail='$this->Lemail' AND lpassword='$this->Lpassword'";
        $result=$this->conn->query($sql);
        return $result;
	}

      public function registeradmin(){
          

    $sql="INSERT INTO librarian(username,password,email,address,phone,gender,pic) VALUES
          ('$this->Lusername','$this->Lpassword','$this->Lemail','$this->Laddress','$this->Lphone','$this->Lgender','$this->Limage')";
            $result=$this->conn->query($sql);
            return $result;
       }

         function countRequested(){
 
 $sql = "SELECT COUNT(sid) AS TotalRequest FROM request WHERE isBorrowed= 0"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}

    function countEbooks(){
 
 $sql = "SELECT COUNT(*) AS TotalEbooks FROM ebooks"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}

  function countBooks(){
 
 $sql = "SELECT COUNT(*) AS TotalBooks FROM books"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}

function countStudents(){
 
 $sql = "SELECT COUNT(*) AS TotalStudents FROM student"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}

function countBorrowed(){
 
 $sql = "SELECT COUNT(sid) AS TotalBorrow FROM request WHERE isBorrowed= 1"; 
    $result = $this->conn->query($sql);
   if($result){
    return $result;
}   
}
}


?>