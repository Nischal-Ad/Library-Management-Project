<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Details</title>

    <?php
require_once "Views/Shared/adminsidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/heading.css">
</head>

<body>

    <div style="padding: 5px">
        <h1 align="center">Students Details</h1>
        <div class="d-flex flex-row justify-content-between">
            <a href="students/register" class="btn btn-success">Add Students</a>
            <form class="form-inline" action="Students/search">
                <input class="form-control" type="Search" name="search" placeholder="Search" required />
            </form>
            </a>
        </div>

        <div class="table-responsive" style="margin-top: 1vh; padding: 5px">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>STU. ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                     <?php
                    $sid=1;
                    while($row=$result->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$sid;?></td>
                        <td><?=$row['sname'];?></td>
                        <td><?=$row['semail'];?></td>
                        <td><?=$row['sadd'];?></td>
                        <td><?=$row['snumber'];?></td>
                        <td><?=$row['sgender'];?></td>
                        <td><img src="images/Student/<?=$row['simage'];?>" class="simg" height="50"></td>
                        <td>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#updatestudent">
                                Update
                            </button> -->
                            <button value="<?=$row['sid'];?>" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete">Delete</button>

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
   <?php $sid++; }?>
                 
                </tbody>
            </table>
            <!-- <div class="modal" id="updatestudent">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                       
                        <div class="modal-header">
                            <h4 class="modal-title">Update Student</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <div class="modal-body">
                            <form method="POST" action="#" class="form-group">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="id" value="15785" required />
                                    <br>
                                    <input class="form-control" type="text" name="username" value="Nischal Adhikari"
                                        required />
                                    <br>
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                    <br>
                                    <input class="form-control" type="text" name="address" placeholder="Address">
                                    <br>
                                    <input class="form-control" type="number" name="cnum" placeholder="Contact No.">

                                </div>
                            </form>
                        </div>

                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" name="register" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </div> -->

                <?php 
		require_once 'views/shared/linksbottom.php';
	?>
    <script>
        $('.delete-btn').on('click', function() {
            let sid = $(this).val();
            $('#yes-btn').attr("href", "Students/deleteStudent?sid="+sid);
        });
    </script>
</body>

</html>