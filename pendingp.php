<?php include 'include/leader.php'?>
    <!--/.sidebar-->
<?php include "include/side.php"; ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Manage Payment</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Approve Payments</h1>
            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Payments
                    </div>
                    <div class="panel-body">
<!--                        Modal-->
<!--                        <div class="modal fade" id="moreDatails" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel" aria-hidden="true">-->
<!--                            <div class="modal-dialog" role="document">-->
<!--                                <div class="modal-content">-->
<!--                                    <div class="modal-header">-->
<!--                                        <h4 class="modal-title" id="firefoxModalLabel">More Detail</h4>-->
<!--                                    </div>-->
<!--                                    <div class="modal-body">-->
<!---->
<!--                                        <div id="displayInformation"></div>-->
<!---->
<!--                                    </div>-->
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        Modal-->

                        <div class="canvas-wrapper">
                            <?php
                            if (isset($_GET["approve"])){
                                $app = $_GET["approve"];
                                $studentID = $_GET["studentID"];
                                $sql  ="UPDATE payment SET statusApproval=? WHERE studentID = ?";
                                $bin = $con->prepare($sql);
                                $bin->bindValue(1,'approved');
                                $bin->bindValue(2,$studentID);
                                if($bin->execute()){
                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Payment Approved</strong> 
</div>';
                                    echo "<script> window.location ='pendingp.php' </script>";
                                }else{
                                    echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Payment Failed to Approve</strong> 
</div>';
                                    echo "<script> window.location ='pendingp.php' </script>";
                                }
                            }

                            if (isset($_GET["reject"])){
                                $app = $_GET["reject"];
                                $studentID = $_GET["studentID"];
                                $sql  ="UPDATE payment SET statusApproval=? WHERE studentID = ?";
                                $bin = $con->prepare($sql);
                                $bin->bindValue(1,'rejected');
                                $bin->bindValue(2,$studentID);
                                if($bin->execute()){
                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Payment Rejected</strong> 
</div>';
                                    echo "<script> window.location ='pendingp.php' </script>";
                                }else{
                                    echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Payment Failed to Reject</strong> 
</div>';
                                    echo "<script> window.location ='pendingp.php' </script>";
                                }
                            }

                            ?>
                            <table class="table table-bordered table-responsive ">
                                <thead class="bg-primary">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Payment ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Amount Paid</th>
                                    <th>Term</th>
                                    <th>Grade</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                /*
                                 *  1	paymentIDPrimary
                                    2	studentID
                                    3	amountPaid
                                    4	term
                                    5	paymentType
                                    6	receiptBatchNumber
                                    7	description
                                    8	attachment
                                    9	dateOfPayments
                                    10	statusApproval

                                 * */
                                $sql = "SELECT * FROM payment INNER JOIN student ON studentID = sn WHERE statusApproval = ?";
                                $binder = $con->prepare($sql);
                                $binder->bindValue(1,"pending");
                                $binder->execute();
                                if ($binder->rowCount()>0){
                                  while($row = $binder->fetch(PDO::FETCH_OBJ)){
                                      /*
                                       *  sn
                                        firstName
                                        surname
                                        dob
                                        grade
                                        class
                                        address
                                        account
                                       * */
                                      //Student Details
                                      $sn = $row->sn;
                                      $fname = $row->firstName;
                                      $lname = $row->surname;
                                      $grade = $row->grade;
                                      $class = $row->class;

                                      //Account
                                      $payID = $row->paymentID;
                                      $statusApproval = $row->statusApproval;
                                      $amount = number_format($row->amountPaid,2);
                                      $term = $row->term;
                                      $paymentType = $row->paymentType;
                                      $receiptBatchNumber = $row->receiptBatchNumber;
                                      $description = $row->description;
                                      $attachment = $row->attachment;
                                      $dateOfPayments = $row->dateOfPayments;

                                      echo "
                                      <tr>
                                      <td>$sn</td>
                                    <td><a href='viewPayment.php?stID=$sn' class='btn btn-info'>$payID</a></td>
                                    <td>$fname</td>
                                    <td>$lname</td>
                                    <td>$amount</td>
                                    <td>$term</td>
                                    <td>$grade</td>
                                    <td><a href='?approve=$payID & studentID=$sn' class='btn btn-success'>Approve</a> |
                                     <a href='?reject=$payID & studentID=$sn' class='btn btn-danger'>Reject</a> </td>
                                     </tr>
                                      ";
                                  }
                                }else{

                                  echo " <td>0</td>
                                    <td><a href='?payID=0' class='btn btn-info'>0</a></td>
                                    <td>No Payments Made</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>0</td>
                                    <td><a href='' class='btn btn-success disabled'>Approve</a> </td>
                                    ";
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