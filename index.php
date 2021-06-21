<?php include 'include/leader.php'?>
<!--/.sidebar-->
<?php include "include/side.php"; ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><?php
                   echo 'Welcome,'.$_SESSION['fname']." ".$_SESSION["lname"];
                ?></h2>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-money color-blue"></em>
                        <div class="large"><?php
                            $binder = $con->prepare("SELECT sum(amountPaid) as totalAmount FROM payment");
                            $binder->execute();
                            $row = $binder->fetch(PDO::FETCH_OBJ);
                            echo 'K '.number_format($row->totalAmount);

                            ?></div>
                        <div class="text-muted">Current Money</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
                        <div class="large"><?php
                            $binder = $con->prepare("SELECT count(*) as total FROM student");
                            $binder->execute();
                            $row = $binder->fetch(PDO::FETCH_OBJ);
                            echo $row->total;

                            ?></div>
                        <div class="text-muted">Total Number of Students</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-adn color-teal"></em>
                        <div class="large"><?php
                            $binder = $con->prepare("SELECT count(*) as total FROM users WHERE accountLevel=?");
                            $binder->bindValue(1,'admin');
                            $binder->execute();
                            $row = $binder->fetch(PDO::FETCH_OBJ);
                            echo $row->total;

                            ?></div>
                        <div class="text-muted">Users</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-tachometer color-red"></em>
                        <div class="large"><?php
                            $binder = $con->prepare("SELECT count(*) as total FROM payment");

                            $binder->execute();
                            $row = $binder->fetch(PDO::FETCH_OBJ);
                            echo $row->total;

                            ?></div>
                        <div class="text-muted">Transactions</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Overview
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <!--/.row-->



        <!--/.col-->
<?php  include 'include/footer.php'?>