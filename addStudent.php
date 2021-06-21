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
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <form class="form-horizontal" method="post">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">First Name</label>
                                        <div class="col-md-9">
                                            <input id="fname" name="fname" type="text" placeholder="Your First Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="lname">Last Name</label>
                                        <div class="col-md-9">
                                            <input id="lname" name="lname" type="text" placeholder="Your Last Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="dob">Date of Birth</label>
                                        <div class="col-md-9">
                                            <input id="dob" name="dob" type="date" placeholder="Date of Birth" class="form-control">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Grade</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="grade" name="grade">
                                                <option>SELECT GRADE</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="class">Your Class</label>
                                        <div class="col-md-9">
                                            <input id="class" name="class" type="text" placeholder="Enter Class" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Address body -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="message">Your Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="address" name="address" placeholder="Please enter your address here..." rows="5"></textarea>
                                        </div>
                                    </div>
                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-12 widget-right">
                                            <a href="javascript:" id="submit" class="btn btn-default btn-md pull-right">Submit</a>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
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