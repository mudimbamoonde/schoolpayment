<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"] ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li class="parent "><a data-toggle="collapse" href="#student">
                <em class="fa fa-users">&nbsp;</em> Manage Student <span data-toggle="collapse" href="#student" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="student">
                <li><a class="" href="addStudent.php">
                         Create Student Record
                    </a></li>
                <li><a class="" href="viewStudent.php">
                         Show Students
                    </a></li>
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#school">
                <em class="fa fa-sellsy">&nbsp;</em> Manage School <span data-toggle="collapse" href="#school" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="school">
                <li><a class="" href="pendingp.php">Pending Payments</a></li>
                <li><a class="" href="ApprovedPay.php">Paid Student</a></li>
                <li><a class="" href="rejectPay.php">Reject Payments</a></li>
<!--                <li><a class="" href="#">School Fees</a></li>-->
<!--                <li><a class="" href="#">Accommodations</a></li>-->
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#user">
                <em class="fa fa-save">&nbsp;</em> Manage Users <span data-toggle="collapse" href="#user" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="user">
                <li><a class="" href="addAdmin.php">
                        Add User
                    </a></li>
                <li><a class="" href="viewUser.php">
                        View Users
                    </a></li>

                <li><a class="" href="studentLogin.php">
                        Student Login
                    </a></li>
            </ul>
        </li>

<!--        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">-->
<!--                <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>-->
<!--            </a>-->
<!--            <ul class="children collapse" id="sub-item-1">-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1-->
<!--                    </a></li>-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2-->
<!--                    </a></li>-->
<!--                <li><a class="" href="#">-->
<!--                        <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3-->
<!--                    </a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--        -->
        <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>