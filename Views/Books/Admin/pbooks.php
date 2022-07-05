<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P-Books</title>

    <?php
require_once "Views/Shared/adminsidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/heading.css">
</head>

<body>
    <div style="padding: 5px">
        <h1 align="center">P-Books</h1>
        <div class="d-flex flex-row justify-content-between">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addpbook">
                Add Books
            </button>
            <form class="form-inline" action="books/search">
                <input class="form-control" name="search" type="Search" placeholder="Search" required />
            </form>
            </a>
        </div>

        <!-- model  -->
        <div class="modal" id="addpbook">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Add P-Books</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- model body  -->
                    <div class="modal-body">
                        <form method="POST" action="Books/AddBook" class="form-group">
                            <div class="form-group">
                                <input class="form-control" type="number" name="isbn" placeholder="ISBN No." required />
                                <br>
                                <input class="form-control" type="text" name="name" placeholder="Name" required />
                                <br>
                                <input class="form-control" type="text" name="publication" placeholder="Publication"
                                    required />
                                <br>
                                <input class="form-control" type="text" name="category" placeholder="Category"
                                    required />
                                <br>
                                <input class="form-control" type="text" name="author" placeholder="Auther" required />
                                <br>
                                <input class="form-control" type="text" name="price" placeholder="Price" required />
                                <br>
                                <input class="form-control" type="text" name="stock" placeholder="Stock" required />
                            </div>
                        
                    </div>

                    <!-- model footer  -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="register" value="Add" class="btn btn-success">
                    </div>
    `            </form>
                </div>
            </div>
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
                    
                    while($row=$result->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row['bisbn_no'];?></td>
                        <td><?=$row['bname'];?></td>
                        <td><?=$row['bauthor'];?></td>
                        <td><?=$row['bcategory'];?></td>
                        <td><?=$row['bprice'];?></td>
                        <td><?=$row['bpublication'];?></td>
                        <td  style= "font-color: yellow;"><?=$row['bstock'];?></td>
                        <td>
                          <a href ="value="<?=$row['bisbn_no'];?>"  class="btn btn-primary update-btn" data-toggle="modal"
                                data-target="#updatebook<?=$row['bisbn_no'];?>">
                                Update
                            </a>
                                    <div class="modal" id="updatebook<?=$row['bisbn_no'];?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal header-->
                        <div class="modal-header">
                            <h4 class="modal-title">Update P-Books</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- model body  -->
                        <div class="modal-body">
                            <?php 
                                // $row = $result->fetch_assoc();
                            ?>
                            <form method="POST" action="books/updateBooks" class="form-group">
                                <div class="form-group">
                                    <input class="form-control" placeholder="ISBN_NO" type="number" name="isbn" value="<?=$row['bisbn_no'];?>"
                                        required />
                                    <br>
                                    <input class="form-control" type="text" placeholder="Name" name="name" value="<?=$row['bname'];?>"
                                        required />
                                    <br>
                                    <input class="form-control" type="text" placeholder="Author" name="author" value="<?=$row['bauthor'];?>"
                                        required />
                                    <br>
                                    <input class="form-control" type="text" name="category" placeholder="Category" value="<?=$row['bcategory'];?>"
                                        required />
                                    <br>
                                    <input class="form-control" type="text" name="publication" placeholder="Publication" value="<?=$row['bpublication'];?>"
                                        required />
                                    <br>
                                    <input class="form-control" type="text" name="price" value="<?=$row['bprice'];?>" placeholder="Price">
                                    <br>
                                    <input class="form-control" type="text" name="stock" placeholder="Stock">
                                </div>
                            
                        </div>

                        <!-- model footer  -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <a class="btn btn-success" id="update1">Update</a> -->
                              <input type="submit" name="update" value="Update" class="btn btn-success ">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                           <button value="<?=$row['bisbn_no'];?>" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete">Delete</button>

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
            let isbn = $(this).val();
            $('#yes-btn').attr("href", "Books/deleteBook?isbn="+isbn);
        });

          $('.update-btn').on('click', function() {
            let isbn = $(this).val();
            $('#update1').attr("href", "Books/updateBook?isbn="+isbn);
        });
    </script>
</body>

</html>