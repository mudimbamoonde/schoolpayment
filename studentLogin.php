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
            <h1 class="page-header">View Student Login</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="viewStudent.php" class="btn btn-primary"><span class="fa fa-plus"></span></a> Create Account
                </div>
                <div id="mgs"></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <table class="table table-bordered table-responsive ">
                            <thead class="bg-danger">
                            <tr>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Access Level</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>

                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT*FROM users WHERE accountLevel=?";
                            $binder = $con->prepare($sql);
                            $binder->bindValue(1,'Student');
                            $binder->execute();
                            $n =0;
                            while($row = $binder->fetch(PDO::FETCH_OBJ)){
                                $n++;
                                $id = $row->ID;
                                $username = $row->username;
                                $firstName = $row->firstName;
                                $surname = $row->surname;
                                $email = $row->email;
                                $mobile  = $row->mobile;
                                $accountLevel = $row->accountLevel;
                                $status = $row->status;
                                $pass = $row->password;


                                if ($status==0){
                                    $st = "<span class='btn btn-danger'>inActive</span>";
                                }else{
                                    $st = "<span class='btn btn-success'>Active</span>";

                                }
                                echo "<tr>
                                                <td>$n</td>
                                                <td>$firstName</td>
                                                <td>$surname</td>
                                                <td>$accountLevel</td>
                                                <td>$email</td>
                                                <td>$username</td>
                                                <td>$st</td>
                                                <td><a href='javaScript:;' class='btn btn-success'><span class='fa fa-pencil'></span></a> | 
                                                <a href='javaScript:;' class='btn btn-danger'><span class='fa fa-trash-o'></span></a> </td>
                                        </tr>";


                            }

                            ?>

                            </tbody>
                        </table>
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