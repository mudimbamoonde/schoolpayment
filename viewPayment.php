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
            <h1 class="page-header"View Payments</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View
                </div>
                <div class="panel-body">

                    <div class="canvas-wrapper">

                        <div class="media">
                            <?php

                            $st =$_GET["stID"] ;
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
                            $sql = "SELECT * FROM payment INNER JOIN student ON studentID = sn WHERE sn = ?";
                            $binder = $con->prepare($sql);
                            $binder->bindValue(1, $st);
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
                                       <div class='list-group'>
                                              <a href='' class='list-group-item active'>
                                                <h4 class='list-group-item-heading'>$dateOfPayments</h4>
                                                <p class='list-group-item-text'>$fname $lname</p>
                                              </a>
                                               <li href='' class='list-group-item'>
                                          
                                                <p class='list-group-item-text'><b>Payment Type:</b> $paymentType </p>
                                                <p class='list-group-item-text'><b>Term:</b> $term </p>
                                                <p class='list-group-item-text'><b>Amount: </b> K $amount <b>ZMW</b>  </p>
                                                <p class='list-group-item-text'><b>Status of Approval:</b> $statusApproval  </p>
                                                <p class='list-group-item-text'><b>Receipt Batch Number:</b> $receiptBatchNumber </p>
                                                <p class='list-group-item-text'><b>Description:</b> $description </p>
                                                <p class='list-group-item-text'><b>Attachment:</b> <a href='receipt/$attachment'><span class='fa fa-download'></span></a> </p>
                                              </li>
                                    </div>";
                                }
                            }else{

                                echo "
                                      <div class='list-group'>
                                              <a href='' class='list-group-item active'>
                                                <h4 class='list-group-item-heading'>0000/00/00</h4>
                                                <p class='list-group-item-text'>No payments Made</p>
                                              </a>
                                    </div>
                                    ";
                            }

                            ?>

                        </div>
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