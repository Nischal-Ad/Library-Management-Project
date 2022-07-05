<?php
  class Config{

  	  public static function getConnection(){
  	  	$conn=new mysqli("localhost","root","","e_library");
  	  	return $conn;
  	  }
  	  
  }

?>