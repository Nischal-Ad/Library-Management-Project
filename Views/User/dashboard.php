<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php
require_once "Views/Shared/sidenav.php";
?>
    <link rel="stylesheet" href="Libraries/Css/dashboard.css">


</head>

<body>

    <div id="demo" class="carousel slide" data-ride="carousel" style="padding: 3px">
        <ul class="carousel-indicators">
            <li data-slide-to="0" class="active"></li>
            <li data-slide-to="1"></li>
            <li data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a style="color: white" href="pbooks/index">
                    <img src="images/2.jpg">
                    <div class="carousel-caption">
                        <div class="opacity bg-dark">
                            <h2>Request Books</h2>
                            <p class="text">Hurry Up! Books are running out of the stock!! <br>Request Fast!!</p>
                        </div>
                </a>
            </div>

        </div>
        <div class="carousel-item">
            <a style="color: white" href="students/about">
                <img src="images/students.jpg">
                <div class="carousel-caption">
                    <div class="opacity bg-dark">
                        <h2>Online Library</h2>
                        <p class="text">Wanna know about us!!<br>Let you kmow something about us!!</p>
                    </div>
                </div>
        </div>
        <div class="carousel-item">
            <a style="color: white" href="ebooks/index">
                <img src="images/6.jpg">
                <div class="carousel-caption">
                    <div class="opacity bg-dark">
                        <h2>E-Books</h2>
                        <p class="text">OW Awesome!!<br>Grab your premium pack to access E-Books!!</p>
                    </div>
                </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    </div>
    <br><br>

    <style>
    .card-body {
        display: inline;
        justify-content: center;
        align-items: center;
    }
    </style>
<?php
  $row = $result->fetch_assoc();
?>
    <div class="container">
        <div class="card-deck">
            <div class="card bg-primary">
                <a href="library/request">
                    <div class="card-body text-center">
                        <h4 class="card-title">Books Requested</h4>
                        <p class="p">Let's see what we have Requested</p>
                        <div>
                        <?
                        $row = $this->result2->fetch_assoc();
                        echo $row['TotalRequest'];
                        ?>
                        </div>
                    </div>
                </a>
            </div>

            <div class="card bg-success">
                <a href="library/receive">
                    <div class="card-body text-center">
                        <h4 class="card-title">Books Received</h4>
                        <p class="p">Let's see what we have Received</p>
                        <!-- <p class="card-text">8</p> -->
                        <div>
                        <?
                        $row = $this->result1->fetch_assoc();
                        echo $row['TotalRequest'];
                        ?>
                        </div>

                    </div>
                </a>
            </div>

        </div>
    </div>
    <br>

    <?php 
		require_once 'views/shared/linksbottom.php';
	?>
</body>

</html>
