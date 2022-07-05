<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Books</title>

    <?php
require_once "Views/Shared/sidenav.php";
?>
</head>

<body>


    <div class="container-fluid" style="padding: 5px;">
        <div class="d-flex flex-row justify-content-between">
            <h1>E-Books</h1>

            <form class="form-inline" action="ebooks/search">
                <input class="form-control" type="search" name="search" class="placeicon" placeholder="Search" required />

            </form>

            </a>
        </div>
        <div class="table-responsive" style="margin-top: 1vh">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                          <th>Author</th>
                              <th>Category</th>
                        <th>Publication</th>
                    
                      
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

  <?php
                    while($row=$result1->fetch_assoc()) { 
                        ?>

                    <tr>
                        <td><?=$row['eid'];?></td>
                        <td><?=$row['ename'];?></td>
                        <td><?=$row['eauthor'];?></td>
                        <td><?=$row['ecategory'];?></td>

                        <td>
                           <?=$row['epublication'];?>
                        </td>
                        <td>

                            <a href="#" class="btn btn-success">Download</a>

                        </td>
                    </tr>
                  
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php 
		require_once 'views/shared/linksbottom.php';
	?>
</body>

</html>