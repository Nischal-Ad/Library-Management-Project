<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Books</title>

    <?php
require_once "Views/Shared/adminsidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/heading.css">
</head>

<body>

    <div style="padding: 5px">
        <h1 align="center">E-Books</h1>
        <div class="d-flex flex-row justify-content-between">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addebook">
                Add E-Books
            </button>
            <form class="form-inline" action="books/searchEbooks">
                <input class="form-control" name="search" type="Search" placeholder="Search" required />
            </form>
            </a>
        </div>

        <!-- model  -->
        <div class="modal" id="addebook">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Add E-Books</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- model body  -->
                    <div class="modal-body">
                        <form method="POST" action="#" class="form-group">
                            <div class="form-group">
                                <input class="form-control" type="number" name="id" placeholder="ID" required />
                                <br>
                                <input class="form-control" type="text" name="name" placeholder="Name" required />
                                <br>
                                <input class="form-control" type="text" name="publication" placeholder="Publication"
                                    required />
                                <br>
                                <input class="form-control" type="text" name="category" placeholder="Category"
                                    required />
                                <br>
                                <input class="form-control" type="text" name="auther" placeholder="Auther" required />
                            </div>
                        </form>
                    </div>

                    <!-- model footer  -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="register" value="Add" class="btn btn-success">
                    </div>

                </div>
            </div>
        </div>


        <div class="table-responsive" style="margin-top: 1vh">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Publication</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      <?php
                    
                    while($row=$result->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row['eid'];?></td>
                        <td><?=$row['ename'];?></td>
                        <td><?=$row['eauthor'];?></td>
                        <td><?=$row['ecategory'];?></td>

                        <td>
                           <?=$row['epublication'];?>
                        </td>
                        <td> 
                              <button value="<?=$row['eid'];?>" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete">Delete</button>

  <!-- The Modal -->
  <div class="modal fade" id="delete">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are You Sure?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <center>
      <i class="fas fa-exclamation-triangle text-danger fa-10x"></i></center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="" id="yes-btn" class="btn btn-success">Yes</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>
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
     <script>
        $('.delete-btn').on('click', function() {
            let id = $(this).val();
            $('#yes-btn').attr("href", "Books/deleteEbook?id="+id);
        });

    </script>
</body>

</html>