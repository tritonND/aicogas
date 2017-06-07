/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

e.preventDefault();
console.log("now here1");

var cnum = $('#cnum').val();
var name = $('#name').val();
var phone = $('#phone').val();
var addr = $('#addr').val();

if (name==="" || phone==="" || addr ===""){
    swal({
        title: "Incomplete Entry",
        text: "Fill empty Fields",
        timer: 3000,
        showConfirmButton: false
    });
}
else{
    var x = $.ajax({
        type: "POST",
        url: 'php/newEnt.php',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        //   data: "username="+encodeURIComponent(username)+"&password="+encodeURIComponent(password),
        data: "addr=" + encodeURIComponent(addr) + "&cnum=" + encodeURIComponent(cnum) + "&name=" + encodeURIComponent(name) + "&phone=" + encodeURIComponent(phone),
        dataType: "text"
    });


    x.done(function (serverResponse) {
        console.log(serverResponse);
        if (serverResponse.trim() == 'successful') {
            console.log("Successful");
            $('#successmsg').collapse('show');
            setTimeout(function () {
                $('#successmsg').fadeOut('fast');
            }, 3000);


            swal({
                    title: "Successful !",
                    text: "New Customer was registered Successfully",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    html: true
                    // imageUrl: "images/thumb.png"
                },
                function () {
                    location.href = "home.php";
                });

        }
        else {
            console.log("Error");
            $('#errormsg').collapse('show');
            // $('#basicinfoform')[0].reset();
            setTimeout(function () {
                $('#errormsg').fadeOut('fast');
            }, 5000);
        }
        console.log("Completed");

    })








    //   console.log("hii");
    //   console.log(formdata);

    $.ajax({
        url: 'php/updatecust.php',
        type: 'POST',
        data: formdata,
        dataType: 'json'
    })
    // console.log("hi22i");

        .done(function () {
            console.log("update done");

            swal({
                    title: "Update Performed!",
                    text: "A registered customer has been UPDATED",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    html: true
                    // imageUrl: "images/thumb.png"
                },
                function(){
                    location.href="home.php" ;
                });

        })

















    <?php
    session_start();
header('Content-type: application/json; charset=UTF-8');

//require_once 'dbconfig.php';
include "php/dbconnect.php";
$resarray = array();
if (isset($_POST['cnum']) && !empty($_POST['cnum'])) {
    $id = strip_tags(($_POST['cnum']));
    $query = "SELECT * FROM ".$_SESSION['brid']." WHERE cnum ='$id'";

    //echo $query;
    // $query = "SELECT * FROM ".$_SESSION['brid']." WHERE cnum=:cnum";
    //  $stmt = $DBcon->prepare( $query );
    //  $stmt->execute(array(':cnum'=>$id));
    //  $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $result1 = mysqli_query($con, $query) or die("error occured");
    while($row1 = mysqli_fetch_assoc($result1))
    {
        $resarray = $row1;
    }

    // $myarray = array($resarray);
    $myarray = array($resarray);

    echo json_encode($myarray);
    exit;
}



<script>
$(document).ready(function() {
    $('#entryform11').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            }
        }
    });
});
</script>



<script>
    function treat(){    
$(document).ready(function()
{             
       
 $(document).on("click", "#treat", function(event)
    {    
   
      var message =$('#txt_fname').val();
      console.log(message);

    
     
	$(document).on("click", "#treat", function(e){
		var message = $("#txt_lname").val();
                
        }
    }
}}

        console.log(message);
		e.preventDefault();
		
		 // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
                console.log("in");
		$.ajax({
			url: 'uduser.php',
			type: 'POST',
			
			dataType: 'json'
		})
		.done(function(data){
			 
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#txt_fname').html(data.SentBy);
			$('#txt_lname').html(data.Message);
			$('#txt_email').html(data.DateSent);
			$('#txt_position').html(data.ID);
                        $('#txt_category').html(data.Category);
			$('#txt_office').html(data.FilePath);
			$('#modal-loader').hide();    // hide ajax loader
                        
                        console.log("Completed");
                       
		})
		.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
		
	});
	
});
}
</script>





<script>
    function treat(){    
$(document).ready(function()
{             
       
 $(document).on("click", "#treat", function(event)
    {    
   
      var message =$('#txt_fname').val();
      console.log(message);

    
     
	$(document).on("click", "#treat", function(e){
		var message = $("#txt_lname").val();
                
        }
    }
}}

        console.log(message);
		e.preventDefault();
		
		 // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
                console.log("in");
		$.ajax({
			url: 'uduser.php',
			type: 'POST',
			
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#txt_fname').html(data.SentBy);
			$('#txt_lname').html(data.Message);
			$('#txt_email').html(data.DateSent);
			$('#txt_position').html(data.ID);
                        $('#txt_category').html(data.Category);
			$('#txt_office').html(data.FilePath);
			$('#modal-loader').hide();    // hide ajax loader
                        
                        console.log("Completed");
                       
		})
		.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
		
	});
	
});
}
</script>



