<!-- Page Content Holder -->
<link rel="stylesheet" href="Libraries/Css/sidenav.css">
<div id="content">

    <nav class="navbar navbar-expand-sm navbar-lightsticky-top">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="navbar-btn btn btn-light">
                <i class="fas fa-bars"></i>
            </button>


            <ul class="nav navbar-nav d-flex flex-row" style="max-width: 100%; overflow:hidden;">
                
                <li class="nav-item dropdown active d-inline-flex">
                    <div class="user">
                        <a class="nav-link dropdown-toggle" href="#profiledrop" aria-haspopup="true"
                            aria-expanded="false" data-toggle="collapse">
                            
                            <img class="d-inline user" src="images/user.jpg" width="35" height="25" alt="logo">


                            <p class="d-inline text-dark" id="profilename">ADMIN</p>



                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <div class="dropdown-menu-right bg-light text-dark collapse list-unstyled profiledrop" id="profiledrop">

        <center>
            <img src="images/user.jpg" class="rounded-circle img" height="70" width="90">
            <h4 class="profile">ADMIN</h4>
             <p class="pdef">
                 admin@gmail.com
</p>
        </center>

       

        <a href="
            <?php 
             
                    echo "admin/logout";
                
            ?>
        " class="btn btn-danger float-right">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>
