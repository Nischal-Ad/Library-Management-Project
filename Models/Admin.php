<?php

class Admin{
    private $Aid;
    private $Aname;
    private $Apassword;
    private $Aemail;
    private $conn;

function __construct(){
		require_once "service/Config.php";
		$this->conn=Config::getConnection();
	}
    
public function setAid($Aid){
    $this->Aid=$Aid;
}
public function getAid(){
    return $this->Aid;
}

public function setAemail($Aemail){
    $this->Aemail=$Aemail;
}
public function getAemail(){
    return $this->Aemail;
}

public function setAname($Aname){
    $this->Aname=$Aname;
}
public function getAname(){
    return $this->Aname;
}

public function setApassword($Apassword){
    $this->Apassword=$Apassword;
}
public function getApassword(){
    return $this->Apassword;
}



	function CheckAdmin(){
        $sql="SELECT * FROM admin WHERE email='$this->Aemail' AND password='$this->Apassword'";
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
}
?>
