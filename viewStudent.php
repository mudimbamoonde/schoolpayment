<?php include 'include/leader.php'?>
    <!--/.sidebar-->
<?php include "include/side.php"; ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Manage Student</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Student</h1>
            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student
                    </div>
                    <div id="mgs"></div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <table class="table table-bordered table-responsive ">
                                <thead class="bg-danger">
                                    <tr>
                                        <th>Student Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date of Birth</th>
                                        <th>Grade</th>
                                        <th>Class</th>

                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody id="studisplay">

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