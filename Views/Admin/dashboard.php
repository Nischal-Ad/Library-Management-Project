<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <?php
require_once "Views/Shared/adminsidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/ahome.css">
</head>

<body>

    <div class="card-deck">
        <div class="card bg-primary">
            <a href="students/request">
                    <div class="card-body">
                    <h4 class="card-title">Books Requested</h4>
                    <p class="text">Total books requested by students</p>
                    <p class="card-text">
                    <center>    
                    <div>
                        <?
                        $row = $this->result1->fetch_assoc();
                        echo $row['TotalRequest'];
                        ?>
                        </div>
</center>
                    </p>
                </div>
            </a>
        </div>

        <div class="card bg-success">
            <a href="books/pbooks">
                       <div class="card-body">
                    <h4 class="card-title">P Books</h4>
                    <p class="text">Total P-Books in library</p>
                     <p class="card-text">
                     <center>   
                     <div>
                        <?
                        $row = $this->result3->fetch_assoc();
                        echo $row['TotalBooks'];
                        ?>
                        </div>
</center>
                    </p>
                </div>
            </a>
        </div>
        </div>
<br>
         <div class="card-deck">
        <div class="card bg-warning">
            <a href="books/ebooks">
                        <div class="card-body">
                    <h4 class="card-title">E Books</h4>
                    <p class="text">Total E-Books in library</p>
                    <p class="card-text">
                    <center>    
                    <div>
                        <?
                        $row = $this->result2->fetch_assoc();
                        echo $row['TotalEbooks'];
                        ?>
                        </div>
</center>
                    </p>
                </div>
            </a>
        </div>

          <div class="card bg-danger">
            <a href="students/borrow">
                         <div class="card-body">
                    <h4 class="card-title">Books Borrowed</h4>
                    <p class="text">Total books borrowed by students</p>
                     <p class="card-text">
                     <center>   
                     <div>
                        <?
                        $row = $this->result5->fetch_assoc();
                        echo $row['TotalBorrow'];
                        ?>
                        </div>
</center>
                    </p>
                </div>
            </a>
        </div>
        
        </div>
        <br>
 <div class="card-deck">
        <div class="card bg-info">
            <a href="students/Students">
                           <div class="card-body">
                    <h4 class="card-title">Total Students</h4>
                    <p class="text">Total students registered</p>
                    <p class="card-text">
                    <center>    
                    <div>
                        <?
                        $row = $this->result4->fetch_assoc();
                        echo $row['TotalStudents'];
                        ?>
                        </div>
</center>
                    </p>
                </div>
            </a>
        </div>
    </div>


    <?php 
		require_once 'views/shared/linksbottom.php';
	?>
</body>

</html>