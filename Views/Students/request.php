<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Requested</title>

    <?php
require_once "Views/Shared/adminsidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/heading.css">
</head>

<body>

    <div style="padding: 5px">
        <h1 align="center">Books Requested</h1>
        <div class="float-right">
            <form class="form-inline" action="books/searchRequest">
                <input class="form-control" name="search" type="Search" placeholder="Search" required />
            </form>
            </a>
        </div>

        <div class="table-responsive" style="margin-top: 1vh; padding: 5px">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                      
                       <th>Student ID</th>
                        <th>Student Name</th>
                         <th>ISBN NO.</th>
                        <th>Book Name</th>
                        <th>Publication</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php  while($row = $result->fetch_assoc()) {?>
                    <tr>
                        <td><?=$row['sid'];?></td>
                        <td><?=$row['sname'];?></td>
                        <td><?=$row['bisbn_no'];?></td>
                        <td><?=$row['bname'];?></td>
                        <td><?=$row['bpublication'];?></td>
                        <td><?=$row['bauthor'];?></td>
                        <td><?=$row['bprice'];?></td>
                        <td>
                            <a href="Books/accept?sid=<?=$row['sid'];?>&&bisbn=<?=$row['bisbn_no'];?>" class="btn btn-success">Accept</a>
                               <a href="Books/decline?sid=<?=$row['sid'];?>&&bisbn=<?=$row['bisbn_no'];?>" class="btn btn-danger">Decline</a>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
		require_once 'views/shared/linksbottom.php';
	?>
</body>

</html>