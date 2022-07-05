<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P-Books</title>

    <?php
require_once "Views/Shared/sidenav.php";
?>

</head>

<body>


    <div class="container-fluid" style="padding: 5px;">
        <div class="d-flex flex-row justify-content-between">
            <h1>P-Books</h1>



             <form class="form-inline" action="Pbooks/search">
                <input class="form-control" type="search" name="search" placeholder="Search" required />
            </form>

            </a>
        </div>

        <div class="table-responsive" style="margin-top: 1vh">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>ISBN. No</th>
                        <th>Name</th>
                         <th>Author</th>
                          <th>Category</th>      
                        <th>Price</th>
                        <th>Publication</th>
                        <th>stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    while($row=$result1->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row['bisbn_no'];?></td>
                        <td><?=$row['bname'];?></td>
                        <td><?=$row['bauthor'];?></td>
                        <td><?=$row['bcategory'];?></td>
                        <td><?=$row['bprice'];?></td>
                        <td><?=$row['bpublication'];?></td>
                        <td><?=$row['bstock'];?></td>
                        <td>
                            <a href="Books/requestBook?isbn=<?=$row['bisbn_no'];?>" class="btn btn-success">Request</a>

                        </td>
                    </tr>
                    <?php  }?>
                </tbody>
            </table>
        </div>
    </div>




    <?php 
		require_once 'views/shared/linksbottom.php';
	?>
</body>

</html>