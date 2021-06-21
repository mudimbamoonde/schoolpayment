<?php include "include/stHead.php"; ?>
<br>
<div class="col-md-1"></div>
<div class="col-md-2"></div>
<div class="col-md-6">
    <div class="panel panel-warning">
        <div class="panel panel-heading">Payment History</div>
        <div class="panel-body">
<!--            <a href=""><span class="fa fa-print"></span> Print Receipt </a>-->
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
            $sql = "SELECT * FROM payment INNER JOIN student ON studentID = sn WHERE sn = ?";
            $binder = $con->prepare($sql);
            $binder->bindValue(1, $_SESSION['username']);
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
                                            
                                              </a>
                                               <li href='' class='list-group-item'>
                                          
                                                <p class='list-group-item-text'><b>Payment Type:</b> $paymentType </p>
                                                <p class='list-group-item-text'><b>Term:</b> $term </p>
                                                <p class='list-group-item-text'><b>Amount:</b>  K $amount <b>ZMW</b>  </p>
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