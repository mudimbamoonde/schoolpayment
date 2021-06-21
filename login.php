<?php
include "include/config.php";
session_start();
if (isset($_SESSION["id"])){
    if ($_SESSION["AccessLevel"]== "Student"){
        header("location:student.php");
    }
    if ($_SESSION["AccessLevel"] == "Admin"){
        header("location:index.php");
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login: School</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
                    <?php
                    if (isset($_POST["submit"])){

                        $username  = trim($_POST["username"]);
                        $pass  = trim($_POST["password"]);
                        $accessLevel = trim($_POST["accesslevel"]);

                        $hashed = md5($pass);
                        $sql = "SELECT*FROM users WHERE username = ? OR password = ? ";
                        $binder = $con->prepare($sql);
                        $binder->bindValue(1,$username);
                        $binder->bindValue(2,$hashed);
                        $binder->execute();
                        if ($binder->rowCount()==1){
                            $row = $binder->fetch(PDO::FETCH_OBJ);
                            /*
                                1	ID
                                2	firstName
                                3	surname
                                4	email
                                5	mobile
                                6	password
                                7	accountLevel
                                8	username
                                9	status
                             * */
                            //$_SESSION["AccessLevel"] = $accessLevel;
                            $_SESSION["id"] = $row->ID;
                            $_SESSION["fname"] = $row->firstName;
                            $_SESSION["lname"] = $row->surname;
                            $_SESSION["email"] = $row->email;
                            $_SESSION["mobile"] = $row->mobile;
                            $_SESSION["accountLevel"] = $row->accountLevel;
                            $_SESSION["username"] = $row->username;
                            $_SESSION["status"] = $row->status;

                            $_SESSION["AccessLevel"] = $_SESSION["accountLevel"];

                            if ( $_SESSION["accountLevel"]=='student'){
                                header("location:student.php");
                            }
                            if ($_SESSION["accountLevel"]=='Admin'){
                                header("location:index.php");
                            }

                        }else{
                            echo "<div class='alert alert-danger'>
                              <h4>Wrong Password!</h4>
                              <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
                              <b>Enter a correct Password/Username!</b>
                           </div>";
                        }
                    }
                    ?>
					<form role="form" action="login.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>

<!--                            <div class="form-group">-->
<!--                               <select name="accesslevel" class="form-control" title="accesslevel">-->
<!--                                   <option disabled>SELECT ACCESS LEVEL</option>-->
<!--                                   <option>Student</option>-->
<!--                                   <option>Admin</option>-->
<!--                               </select>-->
<!--                            </div>-->

							<button type="submit" name="submit" id="submit" class="btn btn-primary">Login</button>
                        </fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
