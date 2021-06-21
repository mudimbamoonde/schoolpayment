$(document).ready(function () {

//add student
    $("#submit").click(function (event) {
        event.preventDefault();
        var address = $("#address").val();
        var clas = $("#class").val();
        var grade = $("#grade").val();
        var lname = $("#lname").val();
        var fname = $("#fname").val();
        var dob = $("#dob").val();

        $.ajax({
            url:"action.php",
            type:"POST",
            data:{action:1,fname:fname,lname:lname,grade:grade,clas:clas,address:address,dob:dob},
            success:function (data) {
                alert(data)
                address.set('')
            }
        });
    });

//viewStudent
    viewStudent();
    function viewStudent()  {
        // student display
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{view:1},
            success:function (data) {
                $("#studisplay").html(data);
            }
        });
    }


    //Create Account
    $('body').delegate("#createAcc","click",function (event) {
       event.preventDefault();
      var pid = $(this).attr("pid");
       // alert("The code is: " + ip);
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{createAccount:1,pid:pid},
            success:function (data) {
                $("#mgs").html(data);
            }
        });
    });



});