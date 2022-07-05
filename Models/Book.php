<?php

class Book{
    private $Bisbn;
    private $Bname;
    private $Bpublication;
    private $Bcategory;
    private $Bstock;
    private $Bprice;
    private $Bauthor;
    private $Lid;
    private $Sid;
     private $conn;

    function __construct(){
		require_once "service/Config.php";
		$this->conn=Config::getConnection();
	}


public function setBisbn($Bisbn){
    $this->Bisbn = $Bisbn;
}
public function getBisbn(){
    return $this->Bisbn;
}
public function setLid($Lid){
    $this->Lid=$Lid;
}
public function getLid(){
    return $this->Lid;
}

public function setSid($Sid){
    $this->Sid=$Sid;
}
public function getSid(){
    return $this->Sid;
}

public function setBname($Bname){
    $this->Bname = $Bname;
}
public function getBname(){
    return $this->Bname;
}

public function setBpublication($Bpublication){
    $this->Bpublication = $Bpublication;
}
public function getBpublication(){
    return $this->Bpublication;
}

public function setBcategory($Bcategory){
    $this->Bcategory = $Bcategory;
}
public function getBcategory(){
    return $this->Bcategory;
}

public function setBstock($Bstock){
    $this->Bstock = $Bstock;
}
public function getBstock(){
    return $this->Bstock;
}

public function setBprice($Bprice){
    $this->Bprice = $Bprice;
}
public function getBprice(){
    return $this->Bprice;
}

public function setBauthor($Bauthor){
    $this->Bauthor = $Bauthor;
}
public function getBauthor(){
    return $this->Bauthor;
}

function selectAllRecord() {
    $sql = "SELECT * FROM books";

    $result = $this->conn->query($sql);

    return $result;
}

function selectBooks() {
    $sql = "SELECT * FROM books WHERE bisbn_no NOT IN(SELECT bisbn_no FROM request WHERE sid = '$this->Sid')";

    $result = $this->conn->query($sql);

    return $result;
}



function addBook() {

    $sql = "INSERT INTO books (bisbn_no,bname,bauthor,bcategory,bprice, bpublication,bstock,lid) VALUES ('$this->Bisbn', '$this->Bname', '$this->Bauthor', '$this->Bcategory', '$this->Bprice', '$this->Bpublication', '$this->Bstock', '$this->Lid')";

    $result = $this->conn->query($sql);
    return $result;
}

 function updateBook(){
           $sql="UPDATE books SET bisbn_no='$this->Bisbn', bname='$this->Bname', bauthor='$this->Bauthor',bcategory='$this->Bcategory',bprice='$this->Bprice',bpublication='$this->Bpublication', bstock=bstock +'$this->Bstock' WHERE bisbn_no='$this->Bisbn'";
        $result = $this->conn->query($sql);
        return $result;
        // echo $sql;
    }

    function selectAllEbooks() {
    $sql = "SELECT * FROM ebooks";

    $result = $this->conn->query($sql);

    return $result;
}

function deleteBook(){
    $sql = "DELETE FROM books WHERE bisbn_no = '$this->Bisbn'";

    $result = $this->conn->query($sql);
    return $result;
}



function requestBook() {

    $sql = "INSERT INTO request (sid, bisbn_no) VALUES ('$this->Sid', '$this->Bisbn')";
    $sql1 = "UPDATE books SET bstock = bstock -1 WHERE bisbn_no = '$this->Bisbn'";

    $this->conn->query("START TRANSACTION");
    $r1 = $this->conn->query($sql);
    $r2 = $this->conn->query($sql1);

    if($r1 && $r2) {
        $this->conn->query("COMMIT");
        return true;
    } else {
        $this->conn->query("ROLLBACK");
        return false;
    }
    return false;

}
// function countRequested(){
 

//     $result = $this->conn->query($sql);
//     return $result;
// }

// function countReceived(){
//    $sql = "SELECT COUNT(sid) AS TotalRequest FROM request WHERE sid= '$this->sid'"; 
//     $result = $this->conn->query($sql);

// if($result){
//     return $result;
// }    
// }

function bookRequested(){
    $sql = "SELECT books.bisbn_no, bname, bauthor, bpublication, bprice, sname, request.sid FROM books,request,student WHERE request.sid = student.sid AND request.bisbn_no = books.bisbn_no AND request.isBorrowed = 0";

    $result = $this->conn->query($sql);
    return $result;
}

    function acceptBook() {
        $sql = "UPDATE request SET isBorrowed = 1 WHERE sid = '$this->Sid' AND bisbn_no = '$this->Bisbn'";

        $result = $this->conn->query($sql);
         return $result;
    }

function receivedBook() {
        $sql = "SELECT * FROM request,books WHERE sid = '$this->Sid' AND isBorrowed= 1 AND request.bisbn_no=books.bisbn_no"; 

        $result = $this->conn->query($sql);
    
         return $result;
    }

    function requestedBook() {
        $sql = "SELECT * FROM request,books WHERE sid = '$this->Sid' AND isBorrowed= 0 AND request.bisbn_no=books.bisbn_no"; 

        $result = $this->conn->query($sql);
    
         return $result;
    }

      function declineBook() {
        $sql = "DELETE FROM request WHERE sid = '$this->Sid' AND bisbn_no = '$this->Bisbn'";
        $sql1 = "UPDATE books SET bstock = bstock +1 WHERE bisbn_no = '$this->Bisbn'";

    $this->conn->query("START TRANSACTION");
    $r1 = $this->conn->query($sql);
    $r2 = $this->conn->query($sql1);

    if($r1 && $r2) {
        $this->conn->query("COMMIT");
        return true;
    } else {
        $this->conn->query("ROLLBACK");
        return false;
    }
    return false;
        $result = $this->conn->query($sql);
         return $result;
    }

     function submittedBook() {
        $sql = "DELETE FROM request WHERE sid = '$this->Sid' AND bisbn_no = '$this->Bisbn'";
        $sql1 = "UPDATE books SET bstock = bstock +1 WHERE bisbn_no = '$this->Bisbn'";

    $this->conn->query("START TRANSACTION");
    $r1 = $this->conn->query($sql);
    $r2 = $this->conn->query($sql1);

    if($r1 && $r2) {
        $this->conn->query("COMMIT");
        return true;
    } else {
        $this->conn->query("ROLLBACK");
        return false;
    }
    return false;
        $result = $this->conn->query($sql);
         return $result;
    }

    // function seletcBook() {
    //     $sql = "SELECT * FROM books";
    // }

   

    function seleteEbook() {
        $sql = "SELECT * FROM ebooks";
         $result = $this->conn->query($sql);
    return $result;
    }


    function selectRecordBasedOnKey($key) {
    $sql = "SELECT * FROM ebooks WHERE ename LIKE "."'$key"."%' OR epublication LIKE "."'$key"."%' OR ecategory LIKE "."'$key"."%' OR eauthor LIKE "."'$key"."%'";
    $result = $this->conn->query($sql);
    return $result;
}

 function selectRecordBasedOnKeyy($key) {
    $sql = "SELECT * FROM books WHERE bname LIKE "."'$key"."%'  OR bpublication LIKE "."'$key"."%' OR bcategory LIKE "."'$key"."%' OR bauthor LIKE "."'$key"."%'";
    // $sql = "SELECT * FROM books,request WHERE request.bisbn_no=books.bisbn_no AND bname LIKE "."'$key"."%'  OR bpublication LIKE "."'$key"."%' OR bcategory LIKE "."'$key"."%' OR bauthor LIKE "."'$key"."%' AND books.bisbn_no <> request.bisbn_no";
    $result = $this->conn->query($sql);
    return $result;
}

 function selectRecordBasedOnKeyyy($key) {
    $sql = "SELECT * FROM books,request WHERE bname LIKE "."'$key"."%' AND request.bisbn_no=books.bisbn_no AND sid = '$this->Sid' AND isBorrowed= 1";
    $result = $this->conn->query($sql);
    return $result;
}

function selectRecordBasedOnKeyyyy($key) {
    $sql = "SELECT * FROM request,books WHERE bname LIKE "."'$key"."%' AND request.bisbn_no=books.bisbn_no AND sid = '$this->Sid' AND isBorrowed= 1";
    $result = $this->conn->query($sql);
    return $result;
}

function selectRecordBasedOnKeyBorrow($key) {
    $sql = "SELECT * FROM request INNER JOIN books INNER JOIN student ON books.bisbn_no=request.bisbn_no
     AND student.sid=request.sid WHERE sname LIKE "."'$key"."%' AND isBorrowed= 1";
    $result = $this->conn->query($sql);
    return $result;
}

function selectRecordBasedOnKeyRequest($key) {
    $sql = "SELECT * FROM request INNER JOIN books INNER JOIN student ON books.bisbn_no=request.bisbn_no
     AND student.sid=request.sid WHERE sname LIKE "."'$key"."%' AND isBorrowed= 0";
    $result = $this->conn->query($sql);
    return $result;
    
}
}
?>