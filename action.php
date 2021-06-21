<?php
include 'include/config.php';
$output = "";
if (isset($_POST["action"])){
    //fname:fname,lname:lname,grade:grade,clas:clas,address:address,dob:dob
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $grade = $_POST['grade'];
    $class = $_POST['clas'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

//    sn 	firstName 	surname 	dob 	grade 	class 	address

    $sql ="INSERT INTO student VALUES (NULL ,?,?,?,?,?,?)";
    $mysq  = $con->prepare($sql);
    $mysq->bindValue(1,$fname);
    $mysq->bindValue(2,$lname);
    $mysq->bindValue(3,$dob);
    $mysq->bindValue(4,$grade);
    $mysq->bindValue(5,$class);
    $mysq->bindValue(6,$address);

    if ($mysq->execute()){
        echo "inserted";
    }else{
        echo $mysq->errorInfo();
    }
}

//view
if (isset($_POST["view"])) {
    $sql = 'SELECT*FROM student';
    $mysq = $con->prepare($sql);
    $mysq->execute();
    while ($row = $mysq->fetch(PDO::FETCH_OBJ)) {
        //    sn 	firstName 	surname 	dob 	grade 	class 	address
            $sn = $row->sn;
            $fname = $row->firstName;
            $lname = $row->surname;
            $dob = $row->dob;
            $grade = $row->grade;
            $class = $row->class;
            $address = $row->address;
            $account = $row->account;
                $active = '';
            if ($account == 0){
                $active .="<a href='javaScript:' class='btn btn-success'  id='createAcc' pid='$sn'><span>Create Account</span></a>";
            }else if ($account ==1){
                $active .="<a href='javaScript:' class='btn btn-info' ><span>Active</span></a>";
            }

        $output .= "<tr>
                   <td>$sn</td>
                   <td>$fname</td>
                   <td>$lname</td>
                   <td>$dob</td>
                   <td>$grade</td>
                   <td>$class</td>
              
                   <td><a href='javaScript:' class='btn btn-default'><span class='fa fa-pencil'></span></a> | 
                   <a href='javaScript:' class='btn btn-danger'><span class='fa fa-trash-o'></span></a> | 
                   $active </td>
                 </tr>";
    }
}


if (isset($_POST["createAccount"])){
//    createAccount:1,pid:pid
    $pid = $_POST["pid"];




    //valiidate
    $ch = "SELECT*FROM users WHERE username=?";
    $pr = $con->prepare($ch);
    $pr->bindValue(1,$pid);
    $pr->execute();
    if ($pr->rowCount()>0){
        $output .= "<div class='alert alert-warning'>
          <h4>Failed!</h4>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Account Already Exist!</b>
        </div>";
    }else {
        $sql = "SELECT*FROM student WHERE sn =:sn";
        $bin = $con->prepare($sql);
        $bin ->bindParam(":sn",$pid);
        $bin->execute();
        $row = $bin->fetch(PDO::FETCH_OBJ);

        $sn = $row->sn;
        $fname = $row->firstName;
        $lname = $row->surname;
        $dob = $row->dob;
        $grade = $row->grade;
        $class = $row->class;
        $address = $row->address;


        $pass = $sn . $fname;

        $password = md5($pass);
//ID	firstName	surname	email	mobile	password	accountLevel	username	status
        $adim = "INSERT INTO users VALUES(NULL,?,?,?,?,?,?,?,?)";
        $insertAdmin = $con->prepare($adim);
        $insertAdmin->bindValue(1, $fname);
        $insertAdmin->bindValue(2, $lname);
        $insertAdmin->bindValue(3, 'n/a');
        $insertAdmin->bindValue(4, 0);
        $insertAdmin->bindValue(5, $password);
        $insertAdmin->bindValue(6, 'student');
        $insertAdmin->bindValue(7, $sn);
        $insertAdmin->bindValue(8, 1);



        if ($insertAdmin->execute()) {


            $st = "UPDATE student SET account=1 WHERE sn = :sn";
            $stp = $con->prepare($st);
            $stp->bindParam(':sn',$sn);
            if($stp->execute()){
                $output .= "<div class='alert alert-info'>
          <h4>Success!</h4>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Account Created!</b>
        </div>";
            }


        } else {
            $output .= "<div class='alert alert-danger'>
          <h4>Failed!</h4>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Create Account...</b>
        </div>";
            $con->errorInfo();
        }
    }
}

echo $output;
