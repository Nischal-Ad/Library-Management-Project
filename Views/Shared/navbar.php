<!-- Page Content Holder -->
<link rel="stylesheet" href="Libraries/Css/sidenav.css">
<div id="content">

    <nav class="navbar navbar-expand-sm navbar-lightsticky-top">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="navbar-btn btn btn-light">
                <i class="fas fa-bars"></i>
            </button>

<?php

        require_once "Views/students/profile.php";
            ?>
            <ul class="nav navbar-nav d-flex flex-row" style="max-width: 100%; overflow:hidden;">
                
                <li class="nav-item dropdown active d-inline-flex">
                    <div class="user">
                        <a class="nav-link dropdown-toggle" href="#profiledrop" aria-haspopup="true"
                            aria-expanded="false" data-toggle="collapse">
                            
                            <img class="d-inline user" src="images/user.jpg" width="35" height="25" alt="logo">
<?php
  $row = $result->fetch_assoc();
?>

                            <p class="d-inline text-dark" id="profilename"><?=$row['sname'];?></p>



                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <div class="dropdown-menu-right bg-light text-dark collapse list-unstyled profiledrop" id="profiledrop">

        <center>
            <img src="images/Student/<?=$row['simage'];?>" class="rounded-circle img" height="70" width="90">
            <h4 class="profile"><?=$row['sname'];?></h4>
            <p class="pdef">
   <?=$row['semail'];?>
       <br>
       <?=$row['snumber'];?>      
       <br>
      <?=$row['sadd'];?>
            </p>
        </center>

        <!-- <button type="button" class="btn btn-warning mr-auto" data-toggle="modal" data-target="#changepassword">
            <i class="fas fa-lock"></i>
            Change Password
        </button> -->

         <a href ="#"  class="btn btn-warning mr-auto" data-toggle="modal"
                                data-target="#changepassword">
                               <i class="fas fa-lock"></i>
            Change Password
                            </a>

        <a href="
            <?php 
                if(isset($_SESSION['sid'])) {
                    echo "Students/logout";
                } else {
                    echo "admin/logout";
                }
            ?>
        " class="btn btn-danger float-right">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>


    <div class="modal fade" id="changepassword">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form method="POST" action="students/changePassword" class="form-group">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Old Password" type="password" name="oldpass"
                                        required />
                                    <br>
                                    <input class="form-control" placeholder="Enter Your New Password" type="password" name="newpass"
                                        required />
                                        <br>
                                    <input class="form-control" type="password" placeholder="Enter Your Confirm Password" name="cpass"
                                        required />
                                        <br>
                                       
                                    </div>
        </div>
        
        <!-- Modal footer -->
         <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <!-- <a class="btn btn-warning" id="updatepass">changePassword</a> -->
                             <input type="submit" name="submit" value="changePassword" class="btn btn-warning">
                        </div>
                        </form>
        
      </div>
    </div>
  </div>