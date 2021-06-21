<?php include 'include/leader.php'?>
<!--/.sidebar-->
<?php include "include/side.php"; ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Manage User</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
    </div><!--/.row-->
                <?php
                if (isset($_POST["adminCreate"])) {

                    $firstname = $_POST["f_name"];
                    $lname = $_POST["l_name"];
                    $email = $_POST["email"];

                    $Mobile = $_POST["Mobile"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $repassword = $_POST["repassword"];
                    $type = $_POST["type"];

//                    if (empty($firstname) || empty($lname) || empty($email) || empty($Mobile) || empty($password) || empty($username)) {
//                        echo "<div class='alert alert-warning'>
//                                  <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Please Fill All fields!</b>
//                                  <ol>
//                                    <li>Fullname->$firstname $lname</li>
//                                    <li>Email->$email</li>
//                                    <li>Type -> $type</li>
//                                    <li>Mobile-> $Mobile</li>
//                                    <li>username-> $username</li>
//                                    <li>password-> $password</li>
//                                  </ol>
//                             </div> ";
//
//                    } else {
                        if ($password != $repassword) {
                            echo "<div class='alert alert-warning'>
                                    <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Password does not match!</b>
                               </div> ";
                        } else {
                            $check_valid = "SELECT*FROM users WHERE email = '" . $email . "'";
                            $check_result = $con->query($check_valid);
                            $count = $check_result->rowCount();
                            if ($count > 0) {
                                echo "<div class='alert alert-warning'>
          <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Email is Already been Used !</b>
     </div> ";
                            } else
                                //ID 	int(20) 	            NO 	PRI 	NULL	auto_increment
                                //firstName 	varchar(100) 	NO 		    NULL
                                //surname 	    varchar(100) 	NO 		    NULL
                                //email 	    varchar(200) 	NO 		    NULL
                                //mobile 	    int(11) 	    YES 		NULL
                                //password   	varchar(10) 	NO   		NULL
                                //accountLevel 	varchar(100) 	YES 		NULL
                                //username   	varchar(100) 	YES 		NULL
                                //status
                                $enpPassword = md5($password);
                                $insertion_qury = "INSERT INTO users (id,firstname,surname,email,mobile,username,password,accountLevel,status) 
                                 VALUES (NULL,'{$firstname}','{$lname}','{$email}','{$Mobile}','{$username}',
                                 '{$enpPassword}','{$type}',1)";
                                $result = $con->query($insertion_qury);
                                if ($result) {
                                    echo "<div class='alert alert-info'>
          <h4>Success!</h4>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>User Created</b>
        </div>";
                                } else {
                                    echo "<div class='alert alert-danger'>
                                      <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Create!</b>      
                                     </div> ";

                                }
                            }


//                        }
                }


                ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-12">
                            <div class="container-fluid">
                                <div class="jumbotron">
                                    <div class="acct">
                                        <!--form-->
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div id="AdminAccount">
                                                <form method="post">
                                                    <div id="Admin_msg"></div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="f_name">First Name</label>
                                                            <input type="text" class="form-control" id="f_name" name="f_name"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="l_name">Last Name</label>
                                                            <input type="text" class="form-control" id="l_name" name="l_name"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email"/>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="Mobile">Mobile</label>
                                                            <input type="text" class="form-control" id="Mobile" name="Mobile"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="repassword">Re-enter Password</label>
                                                            <input type="password" class="form-control" id="repassword" name="repassword"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="type">Select Access Level </label>
                                                            <select id="type" name="type" class="form-control">
                                                                <option selected>Select Account Type</option>
                                                                <option>Admin</option>
                                                                <option>Accountant</option>
                                                                <option>student</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" name="username" id="username"/>
                                                        </div>
                                                    </div>

                                                    <p><br/></p>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <button type="submit" class="btn btn-success btn-lg" id="adminCreate" name="adminCreate">Create Account</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.box-footer -->
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.row (main row) -->
                        <!-- /.content -->
                    </div>

                </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--/.row-->

    <div class="row">
        <!--/.col-->


        <!--/.col-->
        <?php  include 'include/footer.php'?>

<!--/.row-->
