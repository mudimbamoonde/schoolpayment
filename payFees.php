<?php include "include/stHead.php"; ?>
<br>
<div class="col-md-1"></div>
<div class="col-md-2"></div>
<div class="col-md-6">
    <div class="panel panel-warning">
        <div class="panel panel-heading">Make Payments</div>
        <div class="panel-body">
            <?php

            $fullname =  $_SESSION["fname"]." ".$_SESSION["lname"];

            if (isset($_POST["submit"])){
              try {
                  //	paymentID	studentID	amountPaid	term	paymentType	receiptBatchNumber	description	attachment
                  $studentID = $_POST["studentID"];
                  $amount = $_POST["amount"];
                  $term = $_POST["term"];
                  $paymentype = $_POST["paymentype"];
                  $receiptNumber = $_POST["receiptNumber"];
                  $desc = $_POST["desc"];

                  //attachment
                  $fileName = $_FILES["attachment"]["name"];
                  $fileTemLoc = $_FILES["attachment"]["tmp_name"];
                  $fileNametype = $_FILES["attachment"]["type"];
                  $fileNamesize = $_FILES["attachment"]["size"];
                  $fileNameError = $_FILES["attachment"]["error"];

                  //insert
//                  $sql = "INSERT INTO payment(paymentID,studentID,amountPaid,term,paymentType,receiptBatchNumber,description,attachment)
//                              VALUE(null,':studentID',':amountPaid',':term',':paymenttype',':receiptBatchNumber',':description',':attachment')";
//                  $sql = "INSERT INTO `payment` (`paymentID`, `studentID`, `amountPaid`, `term`, `paymentType`, `receiptBatchNumber`, `description`, `attachment`)
//                                VALUES (NULL, ':studentID', ':amountPaid', ':term', ':paymentype', ':receiptNumber', ':description',
//                                  ':attachment')";
                  $sql = "INSERT INTO payment VALUES (NULL,?,?,?,?,?,?,?,NOW(),?)";


                  $binder = $con->prepare($sql);
                  $binder->bindValue(1,$studentID);
                  $binder->bindValue(2,$amount);
                  $binder->bindValue(3,$term);
                  $binder->bindValue(4,$paymentype);
                  $binder->bindValue(5,$receiptNumber);
                  $binder->bindValue(6,$desc);
                  $binder->bindValue(7,$fileName);
                  $binder->bindValue(8,'pending');
//                  $binder->bindParam(":studentID", $studentID);
//                  $binder->bindParam(":amountPaid", $amount);
//                  $binder->bindParam(":term", $term);
//                  $binder->bindParam(":paymentype", $paymentype);
//                  $binder->bindParam(":receiptNumber", $receiptNumber);
//                  $binder->bindParam(":description", $desc);
//                  $binder->bindParam(":attachment", $fileName);

                  $target_dir = "receipt/";
//                  $file  = $studentID.$_SESSION[]
                  $attach = $target_dir.basename($fileName);

                  if (move_uploaded_file($fileTemLoc,$attach)) {
                      if ($binder->execute()) {
                          echo "<script>alert('Successfully')</script>";
                      }else{
                          $error1 = $con->errorInfo();
                          $error1 = $con->errorInfo();
                          echo $error1;
                      }
                  }else{
                      $error1 = $con->errorInfo();
                      echo $error1;
                      var_dump(  $binder->bindParam(":term", $term));
                  }

              }catch (PDOException $e){
                  $error = $e->getMessage();
                  echo "<script>alert($error)</script>";
              }

            }

            ?>
            <form method="post" class="form-horizontal" action="payFees.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="studentID">Student ID</label>
                        <input type="text" class="form-control"  id="studentID" name="studentID" value="<?php echo $_SESSION["username"] ?>"/>
                    </div>
                    <div class="col-md-6">
                        <label for="studentName">Student Name</label>
                        <input type="text" class="form-control" disabled id="studentName" name="studentName"
                               value="<?php echo $fullname ?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="amount">Amount Paid</label>
                        <input type="number" class="form-control" placeholder="eg. ZMW 1,554" id="amount" name="amount"/>
                    </div>
                    <div class="col-md-6">
                        <label for="term">Term </label>
                        <select name="term" id="term" class="form-control">
                            <option>SELECT TERM</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="paymentype">Payment Type</label>
                        <select name="paymentype" id="paymentype" class="form-control">
                            <option>SELECT PAYMENT TYPE</option>
                            <option>School Fee</option>
                            <option>Balance Fee</option>
                            <option>Exams</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="receiptNumber">Receipt Batch Number </label>
                        <input type="text" name="receiptNumber" id="receiptNumber" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="desc">Description</label>
                       <textarea name="desc" id="desc" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="attachment">Attachment</label>
                        <input type="file" name="attachment" id="attachment">
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <input type="submit" name="submit" id="submit" value="Confirm Payment" class="btn btn-success">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!--<
             <div class="row">
                 <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-7">
                                <div class="col-md-7">
                                    <label for="StudentID" >Student ID</label>
                                    <input type="text" name='studentID' id="StudentID" value="180464649" disabled class="form-control" placeholder="StudentID">
                                </div>
                            </div>
               </div>

               <div class="row">
                                <div class="col-md-7">
                                <div class="col-md-7">
                                    <label for="studentName" >Student Name</label>
                                    <input type="text" name="studentName" id="studentName" value="Moonde Mudimba" class="form-control" placeholder="Student Name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
-->