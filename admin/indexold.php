<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home | Dashboard</title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
  margin: 20px 0 20px;
  height: auto;
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

	<div class="container">
    
    	<div class="page-header">
        <h3><a href="#" target="_blank">MySQL Data using Ajax & PHP</a></h3>
        </div>
        
        <div class="row">
        
        	<div class="col-lg-12">
            	
            		<table id="myTable" class="table table-striped table-bordered">
            		
            		<thead>
            			<tr>
            				<th>Full Name</th>
            				<th>View Profile</th>
            			</tr>
            		</thead>
            		
            		<tbody>
            		
            		<?php
            		
            		require_once 'dbconfig.php';
            		
            		$query = "SELECT * FROM support";
            		$stmt = $DBcon->prepare( $query );
            		$stmt->execute();
            		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
						<td><?php echo $row['SentBy']."&nbsp;".$row['SentBy']; ?></td>
						<td>
						<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['ID']; ?>" id="getUser" class="btn btn-sm btn-info"> View</button>
						</td>
						</tr>
						<?php
					}
            		?>
            		
            		</tbody>
            		</table>      
                
            </div>
        
        </div>
        
        
        
        
        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> User Profile
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                       
                       	   <div id="dynamic-content">
                                        
                           <div class="row"> 
                                <div class="col-md-12"> 
                            	
                            	<div class="table-responsive">
                            	
                                <table class="table table-striped table-bordered">
                           		<tr>
                            	<th>First Name</th>
                            	<td id="txt_fname"></td>
                                </tr>
                                     
                                <tr>
                            	<th>Last Name</th>
                            	<td id="txt_lname"></td>
                                </tr>
                                       		
                                <tr>
                                <th>Email ID</th>
                                <td id="txt_email"></td>
                                </tr>
                                       		
                                <tr>
                                <th>Position</th>
                                <td id="txt_position"></td>
                                </tr>
                                       		
                                <tr>
                                <th>Office</th>
                                <td id="txt_office"></td>
                                </tr>
                                       		
                                </table>
                                
                                </div>
                                       
                                </div> 
                          </div>
                          
                          </div> 
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
       </div><!-- /.modal -->    
    
    </div>


<script src="../assets/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
	
	$(document).on('click', '#getUser', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id'); // get id of clicked row
		
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		
		$.ajax({
			url: 'getuser.php',
			type: 'POST',
			data: 'id='+uid,
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
			$('#txt_office').html(data.FilePath);
			$('#modal-loader').hide();    // hide ajax loader
		})
		.fail(function(){
			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
		
	});
	
});

</script>
<script src="../js/jquery.dataTables.min.js"></script>
 
    
<script>
$(document).ready(function(){
    $('#myTable').DataTable();

});
</script>
</body>
</html>