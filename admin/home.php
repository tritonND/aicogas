<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
?>
<?php
include "php/dbconnect.php";
session_start();

$user = $_SESSION['user'];
$branch = $_SESSION['branch'];
$firstname = $_SESSION['firstname'];
$brid = $_SESSION['brid'];


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

    <script src="../js/spin.min.js"></script>

    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('../assets/fonts/Montserrat-Light.eot'); /* IE9 Compat Modes */
            src: url('../assets/fonts/Montserrat-Light.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('../assets/fonts/Montserrat-Light.woff2') format('woff2'), /* Super Modern Browsers */
            url('../assets/fonts/Montserrat-Light.woff') format('woff') /* Pretty Modern Browsers */
                /*    url('../assets/fonts/Montserrat-Light.ttf')  format('truetype'), Safari, Android, iOS */
            /*  url('webfont.svg#svgFontName') format('svg'); /* Legacy iOS */
        }
    </style>


    <style>

        .card {
            border-radius: 6px;
            box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
            background-color: #FFFFFF;
            color: #252422;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            font-family: Montserrat;
            /* font-family: 'Ubuntu', sans-serif; */
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
            height: 600px;
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

<body style="font-family: Montserrat !important;">

<section style="padding: 3px 0; text-align: center; background-color: #647174">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h3 style="color: #ffffff">AICO GAS</h3>
            </div>
        </div>
    </div>
</section>


<section style="padding: 3px 0; text-align: center;" class="btn-primary active">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h5 style="color: #ffffff">CUSTOMER LOYALTY CARD DATABASE SYSTEM</h5>
            </div>
        </div>
    </div>
</section>


<section class="bg-light-gray" style="padding: 30px 0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="home.php">Dashboard</a></li>

                    <?php
                    if ($_SESSION['user'] == "ADMIN")
                    {
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"arc.php\">Airport Road Customers</a></li>";
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"adc.php\">Aduwawa Customers</a></li>";
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"ugc.php\">Ugbowo Customers</a></li>";
                     //   echo "<li role=\"presentation\" class=\"active\"><a href=\"adc.php\">Aduwawa Customers</a></li>";
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"csvimport.php\">Import Data</a></li>";
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"php/logout.php\">Logout</a></li>";

                    }
                    else
                    {
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"php/csvexp.php\">Export Data</a></li>";
                        echo "<li role=\"presentation\" class=\"active\"><a href=\"php/logout.php\">Logout</a></li>";
                    }
                    ?>


                </ul>
            </div>


            <div class="col-sm-8">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="header">
                                <?php
                                if ($_SESSION['user'] =="ADMIN")
                                {
                                    echo " <h4 class=\"title\">Admin Dashboard - All Customers </h4>";
                                }
                                else
                                {
                                    echo " <h4 class=\"title\">User Dashboard: ".$branch." Customers </h4>";
                                }
                                ?>
                                <!-- <h4 class="title">Dashboard  <?php // echo $branch;?>  Customers </h4>  -->

                                <p class="category">System Summary </p>
                            </div>


                            <?php
                            if($_SESSION['user'] == "ADMIN")
                            {

                            }
                            else {
                                echo "  <div class=\"row\">
                                <hr>
                                <div class=\"col-sm-5\"> </div>
                                <div class=\" col-md-5 col-md-offset-5\">
                                    <button data-toggle=\"modal\" id=\"newEnt\" name=\"newEnt\" class=\"btn  btn-primary\"> New Entry</button>
                                </div>
                            </div>";
                            }
                            ?>

                            <!--
                            <div class="row">
                                <hr>
                                <div class="col-sm-5"> </div>
                                <div class=" col-md-5 col-md-offset-5">
                                    <button data-toggle="modal" data-target="#view-modal2" id="newEnt" name="newEnt" class="btn  btn-primary"> New Entry</button>
                                </div>

                            </div>  -->


                            <div id="newEntry" class="row" style="display: none" >
                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">

                                        <div class="alert alert-success collapse" id="successmsg">
                                            <strong>Successfull! </strong> Customer added to the database.
                                        </div>
                                        <div class="alert alert-danger collapse" id="dangermsg">
                                            <strong>Server Error!</strong> Server could not process your request, please try again.
                                        </div>
                                        <div class="alert alert-warning fadein collapse" id="errormsg">
                                            <strong>Error!</strong> Could not add customer to database <span id="errormessage"></span>.
                                        </div>

                                        <form id="entryform" method="POST" role="form" data-toggle="validator" onsubmit="return false;">

                                            <div class="form-group">
                                                <label for="cnum">Card Number*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-fw"></i></span>
                                                        <input type="text" class="form-control" pattern=".{4,}" title="Minimum of 5 Characters required" id="cnum" name="cnum"  disabled>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="name">Full Name*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-user  fa-fw"> </i></span>
                                                        <input type="text" class="form-control" pattern=".{5,}" title="Minimum of 5 Characters required"  id="name" name="name" placeholder="Enter fullname of customer" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="addr">Address</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-home fa-fw"></i></span>
                                                        <input type="text" class="form-control" pattern=".{4,}" title="Minimum of 5 Characters required" id="addr" name="addr" placeholder="Enter address of customer" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="phone">Phone Number*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-mobile-phone fa-fw"></i></span>
                                                        <input type="tel" class="form-control" title="Enter a valid Phone Number" id="phone" name="phone" pattern="(0[1-9]{1}[0-9]{9}|\+234[1-9]{1}[0-9]{9})" placeholder="+2349087654321" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="ignores" name="ignores">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="treaty" name="treaty">Submit</button>
                                            </div>

                                        </form>


                                    </div>

                                    <div class="col-sm-3"></div>


                                </div>


                            </div>



                            <div id="editEntry" class="row" style="display: none" >
                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">

                                        <div class="alert alert-success collapse" id="successmsg1">
                                            <strong>Successfull! </strong> Customer added to the database.
                                        </div>
                                        <div class="alert alert-danger collapse" id="dangermsg1">
                                            <strong>Server Error!</strong> Server could not process your request, please try again.
                                        </div>
                                        <div class="alert alert-warning fadein collapse" id="errormsg1">
                                            <strong>Error!</strong> Could not add customer to database <span id="errormessage"></span>.
                                        </div>

                                        <form id="entryform" method="POST" role="form" data-toggle="validator" onsubmit="return false;">

                                            <div class="form-group">
                                                <label for="cnum">Card Number*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-fw"></i></span>
                                                        <input type="text" class="form-control" pattern=".{4,}" title="Minimum of 5 Characters required" id="cnum1" name="cnum1"  disabled>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="name">Full Name*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-user  fa-fw"> </i></span>
                                                        <input type="text" class="form-control" pattern=".{5,}" title="Minimum of 5 Characters required"  id="name1" name="name1" placeholder="Enter fullname of customer" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="addr">Address</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-home fa-fw"></i></span>
                                                        <input type="text" class="form-control" pattern=".{4,}" title="Minimum of 5 Characters required" id="addr1" name="addr1" placeholder="Enter address of customer" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>


                                            <div class="form-group has-feedback">
                                                <label for="phone">Phone Number*</label>
                                                <div>
                                                    <div class=" input-group margin-bottom-sm">
                                                        <span class="input-group-addon"> <i class="fa fa-mobile-phone fa-fw"></i></span>
                                                        <input type="tel" class="form-control" title="Enter a valid Phone Number" id="phone1" name="phone1" pattern="(0[1-9]{1}[0-9]{9}|\+234[1-9]{1}[0-9]{9})" placeholder="+2349087654321" required>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="ignores1" name="ignores1">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="treaty1" name="treaty1">Submit</button>
                                            </div>

                                        </form>


                                    </div>

                                    <div class="col-sm-3"></div>


                                </div>


                            </div>




                            <div class="content table-responsive" >

                                <h5>Registered Customers</h5>
                                <div id="chartActivity" class="ct-chart ">
                                    <table id="myTable"  class="table table-responsive table-condensed table-striped table-bordered table-hover">
                                        <thead class="bg-primary">
                                        <tr >

                                            <th>Card Number</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        require_once 'dbconfig.php';
                                       // $query = "SELECT * FROM users WHERE ACTIVE = 1 ";

if($_SESSION['user'] =="ADMIN"){
    $query = "SELECT cnum, name, phone,addr, REGDATE FROM ad 
UNION ALL
SELECT cnum, name, phone,addr, REGDATE FROM ar
UNION ALL
SELECT cnum, name, phone,addr, REGDATE FROM ug";
}
else
{
    $query = "SELECT * FROM ".$_SESSION['brid']." ORDER BY id DESC";
}
                                        $stmt = $DBcon->prepare( $query );
                                        $stmt->execute();
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['cnum']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <!-- <td><?php // echo $row['addr']; ?></td> -->

                                             <!--   <td>
                                                    <button data-toggle="modal" data-target="#view-modal" data-id="<?php // echo $row['cnum']; ?>" id="getUser" class="btn btn-sm btn-info"> View</button>
                                                </td>  -->
                                                 <?php
                                                if ($_SESSION['user'] == "ADMIN")
                                                {
                                                    echo "<td> <button data-toggle=\"modal\" data-target=\"#view-modal\" data-id=\"".$row['cnum']."\" id=\"getUser1\" class=\"btn btn-sm btn-info\"> View</button> </td>";
                                                    echo "<td> <button data-toggle=\"modal\"  data-id=\"".$row['cnum']."\" id=\"editUser1\" class=\"btn btn-sm btn-info\"> Edit</button> </td>";
                                                }
                                                else
                                                {
                                                    echo "<td> <button data-toggle=\"modal\" data-target=\"#view-modal\" data-id=\"".$row['cnum']."\" id=\"getUser\" class=\"btn btn-sm btn-info\"> View</button> </td>";
                                                    echo "<td> <button data-toggle=\"modal\"  data-id=\"".$row['cnum']."\" id=\"editUser\" class=\"btn btn-sm btn-info\"> Edit</button> </td>";
                                                }
                                                ?>

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
        <div class="row" align="center">
            <div class="col-md-12">
                <span class="copyright" style="color: #ffffff; font-family: 'Segoe UI'">Copyright &copy; AICO Gas 2017</span>
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
                        Customer Information
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
                                            <th>Card Number</th>
                                            <td id="txt_email"></td>
                                        </tr>

                                        <tr>
                                            <th>Full Name</th>
                                            <td id="txt_fname"></td>
                                        </tr>

                                        <tr>
                                            <th>Phone Number</th>
                                            <td id="txt_category"></td>
                                        </tr>

                                        <tr>
                                            <th>Address</th>
                                            <td id="txt_position"></td>
                                        </tr>

                                        <tr>
                                            <th>Registration Date</th>
                                            <td id="txt_lname"></td>
                                        </tr>


                                    </table>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="ignore" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="treat" name="treat"   data-dismiss="modal">Delete</button>

                </div>

            </div>   </form>
    </div>
</div><!-- /.modal -->



<script src="../assets/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#ignores', function(e) {
            $('#newEnt').show();
            $('#newEntry').hide();
            $('#editEntry').hide();

            e.preventDefault();
        });
        })
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#ignores1', function(e) {
            $('#newEnt').show();
            $('#newEntry').hide();
            $('#editEntry').hide();

            e.preventDefault();
        });
    })
</script>

<script>
    $(document).ready(function(){
        //  var formdata = "" ;
        $(document).on('click', '#newEnt', function(e){
            $('#newEnt').hide();
            $('#newEntry').show();

            e.preventDefault();

            //   var uid = $(this).data('id'); // get id of clicked row
            console.log("clicked new entry button");
            var x = $.ajax({
                type: "POST",
                url: "php/custid.php",
                contentType: false,
                dataType: "text",
                cache: false
             //   processData: false
            });

            x.done(function(serverResponse){
                console.log(serverResponse);
                $('#cnum').val(serverResponse.trim());
                console.log("Completed");

            })


            x.fail(function(){
             //   $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

        });



    });

</script>





<script>
    $(document).ready(function(){
      //  var formdata = "" ;
        $(document).on('click', '#treaty', function(e) {

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


            x.fail(function () {
                $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });
        }

        });



    });

</script>


<script>
    $(document).ready(function(){
        var formdata = "" ;
        $(document).on('click', '#getUser', function(e){

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamic-content').hide(); // hide dive for loader
            $('#modal-loader').show();  // load ajax loader

            $.ajax({
                url: 'getcust.php',
                type: 'POST',
                data: 'cnum='+uid,
                dataType: 'json'
            })
                .done(function(data){
                    console.log(data);
                    $('#dynamic-content').hide(); // hide dynamic div
                    $('#dynamic-content').show(); // show dynamic div
                    $('#txt_fname').html(data.name);
                    $('#txt_lname').html(data.REGDATE);
                    $('#txt_email').html(data.cnum);
                    $('#txt_position').html(data.addr);
                    $('#txt_category').html(data.phone);
                    //$('#txt_office').html(data.FilePath);
                    $('#modal-loader').hide();    // hide ajax loader

                    console.log("Completed");
                    $(document).on('click', '#treat', function(e){
                        console.log("here") ; console.log(data) ;

                        formdata = data;

                        //   console.log("hii");
                        //   console.log(formdata);

                        $.ajax({
                            url: 'delcust.php',
                            type: 'POST',
                            data: formdata,
                            dataType: 'json'
                        })
                        // console.log("hi22i");

                            .done(function (data) {
                                swal({
                                        title: "Delete Action Performed!",
                                        text: "A registered customer has been DELETED",
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

                    });
                })
                .fail(function(){
                    $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });

        });



    });

</script>



<script>
    $(document).ready(function(){
        var formdata = "" ;
        $(document).on('click', '#getUser1', function(e){

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamic-content').hide(); // hide dive for loader
            $('#modal-loader').show();  // load ajax loader

            //$('#modalid').html("");
            $.ajax({
                url: 'getcust1.php',
                type: 'POST',
                data: 'cnum='+uid,
                dataType: 'json'
            })
                .done(function(data){
                    console.log(data);
                    //$('#modalid').html("");
                    $('#dynamic-content').hide(); // hide dynamic div
                    $('#dynamic-content').show(); // show dynamic div
                    $('#txt_fname').html(data.name);
                    $('#txt_lname').html(data.REGDATE);
                    $('#txt_email').html(data.cnum);
                    $('#txt_position').html(data.addr);
                    $('#txt_category').html(data.phone);
                    //$('#txt_office').html(data.FilePath);
                    $('#modal-loader').hide();    // hide ajax loader

                    console.log("Completed");
                    $(document).on('click', '#treat', function(e){
                        console.log("here") ; console.log(data) ;

                        formdata = data;
                        $.ajax({
                            url: 'delcustall.php',
                            type: 'POST',
                            data: formdata,
                            dataType: 'json'
                        })
                            .done(function(serverResponse) {
                                swal({
                                        title: "Delete Action Performed!",
                                        text: "A registered customer has been DELETED",
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

                    });
                })
                .fail(function(){
                    $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });

        });



    });

</script>


<script>
    $(document).ready(function(){
        var formdata = "" ;
        $(document).on('click', '#editUser', function(e){


            $('#newEnt').hide();
            $('#newEntry').hide();
            $('#editEntry').show();
            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row
            console.log(uid);
            console.log("inside script");

         //   $('#dynamic-content').hide(); // hide dive for loader
         //   $('#modal-loader').show();  // load ajax loader

            $.ajax({
                url: 'php/fillrec.php',
                type: 'POST',
                data: 'cnum='+uid,
                dataType: 'json'
            })
                .done(function(data){
                    console.log(data);

                    document.getElementById("cnum1").value = data.cnum;
                    document.getElementById("addr1").value = data.addr;
                    document.getElementById("name1").value = data.name;
                    document.getElementById("phone1").value = data.phone;

                    console.log("Completed");
                    $(document).on('click', '#treaty1', function(e){
                        console.log("here") ; console.log(data) ;

                        formdata = data;

                        //   console.log("hii");
                        //   console.log(formdata);

                        $.ajax({
                            url: 'updatecust.php',
                            type: 'POST',
                            data: formdata,
                            dataType: 'json'
                        })
                        // console.log("hi22i");

                            .done(function () {

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



                    });
                })
                .fail(function(){
                    $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });

        });



    });

</script>





<script type="text/javascript" src="css/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="css/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="css/buttons.flash.min.js"></script>
<script type="text/javascript" src="css/jszip.min.js"></script>
<script type="text/javascript" src="css/pdfmake.min.js"></script>
<script type="text/javascript" src="css/vfs_fonts.js"></script>
<script type="text/javascript" src="css/buttons.html5.min.js"></script>
<script type="text/javascript" src="css/buttons.print.min.js"></script>



<script src="js/submit.js"></script>

<script src="../js/agency.min.js"></script>
<script src="../js/js/sweetalert.min.js"></script>
<script src="../myjs/login.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>

<script src="js/qtip.js"></script>
<script src="js/validator.js"></script>



<script>
    $(document).ready(function(){
        $('#myTable').DataTable(
            {
                dom: 'lfrtip',
                lengthChange: true,
                pageLength: 10,
                lengthMenu: [ 10, 15, 20, 50, 100 ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        );

    });
</script>
</body>
</html>