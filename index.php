<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | New</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

    <link href="css/agency.css" rel="stylesheet">

    <link href="css/half-slider.css" rel="stylesheet">



    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('assets/fonts/Montserrat-Light.eot'); /* IE9 Compat Modes */
            src: url('assets/fonts/Montserrat-Light.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('assets/fonts/Montserrat-Light.woff2') format('woff2'), /* Super Modern Browsers */
            url('assets/fonts/Montserrat-Light.woff') format('woff') /* Pretty Modern Browsers */
            /*    url('../assets/fonts/Montserrat-Light.ttf')  format('truetype'), Safari, Android, iOS */
            /*  url('webfont.svg#svgFontName') format('svg'); /* Legacy iOS */
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index"  style=" font-family: Montserrat !important;">


       <section style="padding: 3px 0; text-align: center; background-color: #647174">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h3 style="color: #ffffff">AICO GAS</h3>
                </div>
            </div>
        </div>
       </section>

    <section style="padding: 3px 0; text-align: center; background-color: #0e1274">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h5 style="color: #ffffff">CUSTOMER LOYALTY CARD DATABASE SYSTEM</h5>
                </div>
            </div>
        </div>
    </section>
      
    
      <section class="bg-light-gray" style="padding: 20px 0; height: 77%">
        <div class="container">
            <div class="row">
         <!--   <div class="col-md-6">
                <a href="#">
                    <img height="50%" class="img-responsive" src="img/myimg.jpg" alt="">
                </a>
            </div>  -->
            <div class="col-sm-6 col-sm-offset-3">
                <div align="center">
                <a href="#" >
                    <img class="img-responsive"  src="img/myimg.jpg"  alt="">
                </a>    </div>

        <form  id="loginform" method="POST"  >
        <h1 align="center"> Login Here </h1>
        <div class="form-group">
        <label  for="username">Username</label>
        <input type="text" class="form-control" id="username" required>
        </div>
        <div class="form-group">
        <label  for="password">Password</label>
        <input  type="password" class="form-control" id="password" required>
        </div>
  
   <button type="button" onclick="login()"  class="btn btn-primary" id="loginbutton"> Login</button>


		 </form> 
            
            </div>
        </div>
                    
        </div>
      </section>   <!-- End Login Section -->


    
  
    <footer style="background: #546063; position: fixed; width: 100%; height: 10%">
        <div class="container" >
            <div class="row">
                <div class="col-md-4">
                    <!-- <span class="copyright" style="color: #ffffff; font-family: 'Segoe UI'">Copyright &copy;AICO Gas 2017</span>  -->
                </div>
                <div class="col-md-4">

                    <span class="copyright" style="color: #ffffff; font-family: 'Segoe UI'">Copyright &copy;AICO Gas 2017</span>


                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
     <script src="myjs/mylogin.js"></script>
      <script src="js/js/spin.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>  

    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

</body>

</html>
