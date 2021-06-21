<?php include 'config.php'?>
<?php
session_start();
if (!isset($_SESSION["id"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCHOOL PAY</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="javascript:">Student Dashboard</a>
            <ul class="nav navbar-top-links navbar-left">
                <li class="dropdown"><a href="student.php">Home</a> </li>
                <li class="dropdown"><a href="payFees.php">Pay School Fees</a></li>
                <li class="dropdown"><a href="history.php">Payment History</a></li>
               
                <li class="dropdown"><a href="updateProfile.php?userID=<?php echo $_SESSION["username"] ?>">Update Profile</a></li>
                <li class="dropdown text-danger"><a href="logout.php"><?php echo $_SESSION["fname"]." ". $_SESSION["lname"]?></a></li>

<!--                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">-->
<!--                        <em class="fa fa-bell"></em><span class="label label-info">5</span>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-alerts">-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-envelope"></em> 1 New Message-->
<!--                                    <span class="pull-right text-muted small">3 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-heart"></em> 12 New Likes-->
<!--                                    <span class="pull-right text-muted small">4 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-user"></em> 5 New Followers-->
<!--                                    <span class="pull-right text-muted small">4 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                    </ul>-->
<!---->
<!--                </li>-->

</ul>
</div>
</div><!-- /.container-fluid -->
</nav>
<!--Boarder-->

