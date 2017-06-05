<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home | Dashboard</title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
 <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<script src="../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css"> 
<link href="../css/agency.css" rel="stylesheet">
<link href="../css/half-slider.css" rel="stylesheet">
 <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
   
 
<style>
        
.card {
  border-radius: 6px;
  box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
  background-color: #FFFFFF;
  color: #252422;
  margin-bottom: 20px;
  position: relative;
  z-index: 1;
  font-family: 'Ubuntu', sans-serif;
}
.card .content {
  padding: 15px 15px 10px 15px;
}
.card .header {
  padding: 20px 20px 0;
}
.card .description {
  font-size: 16px;
  color: #66615b;
}
.card h6 {
  font-size: 12px;
  margin: 0;
}
.card .category,
.card label {
  font-size: 14px;
  font-weight: 400;
  color: #9A9A9A;
  margin-bottom: 0px;
}
.card .category i,
.card label i {
  font-size: 16px;
}
.card label {
  font-size: 15px;
  margin-bottom: 5px;
}
.card .title {
  margin: 0;
  color: #252422;
  font-weight: 300;
}
.card .avatar {
  width: 50px;
  height: 50px;
  overflow: hidden;
  border-radius: 50%;
  margin-right: 5px;
}
.card .footer {
  padding: 0;
  line-height: 30px;
}
.card .footer .legend {
  padding: 5px 0;
}
.card .footer hr {
  margin-top: 5px;
  margin-bottom: 5px;
}
.card .stats {
  color: #a9a9a9;
  font-weight: 300;
}
.card .stats i {
  margin-right: 2px;
  min-width: 15px;
  display: inline-block;
}
.card .footer div {
  display: inline-block;
}
.card .author {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
}
.card .author i {
  font-size: 14px;
}
.card.card-separator:after {
  height: 100%;
  right: -15px;
  top: 0;
  width: 1px;
  background-color: #DDDDDD;
  content: "";
  position: absolute;
}
.card .ct-chart {
  margin: 0 5px 80px 5px;
  height: 700px;
}
.card .table tbody td:first-child,
.card .table thead th:first-child {
  padding-left: 15px;
}
.card .table tbody td:last-child,
.card .table thead th:last-child {
  padding-right: 15px;
}
    </style>

</head>

<body>

  <section style="padding: 3px 0; text-align: center; background-color: #647174">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h3 style="color: #ffffff">My App</h3>
                </div>
            </div>
        </div>
       </section>
      
  

  <section class="bg-light-gray" style="padding: 30px 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
 <ul class="nav nav-pills nav-stacked">
     <li role="presentation" class="active"><a href="dashboard.php">Dashboard</a></li>
     <li role="presentation" class="active"><a href="tickets.php">View Tickets</a></li>
  <li role="presentation" class="active"><a href="adminph.php">Admin PH Panel</a></li>
   <li role="presentation" class="active"><a href="admingh.php">Admin GH Panel</a></li>
</ul>
     </div>      


<div class="col-sm-8">  
                <div class="row">
                   
            <div class="col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Admin Dashboard</h4>
                                <p class="category">Summary of System </p>
                            </div>
        <div class="content table-responsive" >
        <div id="chartActivity" class="ct-chart ">         
        <table id="myTable"  class="table table-responsive table-condensed table-striped table-bordered table-hover">
        <thead class="bg-primary">
            <tr >
           
            <th>Participants</th>
            <th>Username</th> 
            <th>Phone</th>
            <th>Action</th> 
        </tr>
      </thead>
            		
      <tbody>
            		
        <?php	
            require_once 'dbconfig.php';           		
            $query = "SELECT * FROM users WHERE ACTIVE = 1 ";
            $stmt = $DBcon->prepare( $query );
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	?>
	            <tr>
	         	     <td><?php echo $row['EMAIL']; ?></td>
                             <td><?php echo $row['FIRSTNAME']; ?></td>
                             <td><?php echo $row['PHONE']; ?></td>
     <td>
     <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['EMAIL']; ?>" id="getUser" class="btn btn-sm btn-info"> View</button>
     </td>
		    </tr>
		<?php  }  ?>
            		
      </tbody>
</table>   
                    </div>  
               
             </div>    
           </div>
         </div>   
       </div>
     </div>  <div class="col-sm-2"></div>
   </div>
 </div>          
</section>
        

    <footer style="background: #546063; padding: 15px 0">
        <div class="container" >
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright" style="color: #ffffff; font-family: 'Segoe UI'">Copyright &copy; New App 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



        
        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                 <form name="modform" id="modform">
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                              User Information
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                        
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<!-- <img src="ajax-loader.gif"> -->
                       	   </div>
                       
                       	   <div id="dynamic-content">
                                        
                           <div class="row"> 
                                <div class="col-md-12"> 
                            	
                            	<div class="table-responsive">
                                 
                                    
                                <table class="table table-striped table-bordered">
                           		<tr>
                            	<th>Username</th>
                            	<td id="txt_email"></td>
                                </tr>
                                 
                                <tr>
                                <th>Full Name</th>
                                <td id="txt_fname"></td>
                                </tr>
                                
                                <tr>
                            	<th>Phone</th>
                            	<td id="txt_category"></td>
                                </tr>
                                       		
                                <tr>
                                <th>ID</th>
                                <td id="txt_position"></td>
                                </tr>
                                       		
                                
                                </table>
                     
                                </div>
                                       
                                </div> 
                          </div>
                          
                          </div> 
                             
                        </div> 
              <div class="modal-footer"> 
                <button type="button" class="btn btn-danger" id="ignore" data-dismiss="modal">Ignore</button>
                <button type="button" class="btn btn-primary" id="treat" name="treat"   data-dismiss="modal">Deactivate</button>
              </div> 
                        
                 </div>   </form>
              </div>
       </div><!-- /.modal -->    
    
   


<script src="../assets/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
	var formdata = "" ;
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id'); // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
		$.ajax({
			url: 'getuser1.php',
			type: 'POST',
			data: 'email='+uid,
			dataType: 'json'
		})
		.done(function(data){
			console.log(data);
			$('#dynamic-content').hide(); // hide dynamic div
			$('#dynamic-content').show(); // show dynamic div
			$('#txt_fname').html(data.FIRSTNAME);
			$('#txt_lname').html(data.FIRSTNAME);
			$('#txt_email').html(data.EMAIL);
			$('#txt_position').html(data.ID);
            $('#txt_category').html(data.PHONE);
			//$('#txt_office').html(data.FilePath);
			$('#modal-loader').hide();    // hide ajax loader
                        
                        console.log("Completed");
                        $(document).on('click', '#treat', function(e){
                        console.log("here") ; console.log(data) ;
                       
                        formdata = data;
                        
                     //   console.log("hii");
                     //   console.log(formdata);
                        
   $.ajax({
			url: 'uduser1.php',
			type: 'POST',
			data: formdata,
			dataType: 'json'
		})
      // console.log("hi22i");  
      
      swal({
  title: "Successful !",
  text: "Successfully Deactivated the Client",
  showCancelButton: false,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
  html: true
 // imageUrl: "images/thumb.png"
},
function(){
  location.href="dashboard.php" ;
});



     });
                })
	.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
       
	});
        
       
	
});

</script>




 <script src="../js/agency.min.js"></script>
 <script src="../js/js/spin.min.js"></script>
 <script src="../js/js/sweetalert.min.js"></script>
 <script src="../myjs/login.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
 
    
<script>
$(document).ready(function(){
    $('#myTable').DataTable();

});
</script>
</body>
</html>