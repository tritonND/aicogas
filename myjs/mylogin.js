function login(){

$(document).ready(function()
{
     //login code
 $(document).on("click", "#loginbutton", function(event)
    {    
               //starts spinner for the other form
 
var opts = {
  lines: 13 // The number of lines to draw
, length: 28 // The length of each line
, width: 4 // The line thickness
, radius: 14 // The radius of the inner circle
, scale: 0.75 // Scales overall size of the spinner
, corners: 0.2 // Corner roundness (0..1)
, color: '#000' // #rgb or #rrggbb or array of colors
, opacity: 0.45 // Opacity of the lines
, rotate: 23 // The rotation offset
, direction: 1 // 1: clockwise, -1: counterclockwise
, speed: 1.1 // Rounds per second
, trail: 60 // Afterglow percentage
, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
, zIndex: 2e9 // The z-index (defaults to 2000000000)
, className: 'spinner' // The CSS class to assign to the spinner
, top: '50%' // Top position relative to parent
, left: '50%' // Left position relative to parent
, shadow: false // Whether to render a shadow
, hwaccel: false // Whether to use hardware acceleration
, position: 'absolute' // Element positioning
}


var target = $('#loginform').get(0);
var spinner = new Spinner(opts).spin(target);

        var username=$('#username').val();        
        var password=$('#password').val();


        if (username === "" || password === ""){
            swal({
  title: "Incomplete Credentials",
  text: "Credentials cant be empty",
  timer: 3000,
  showConfirmButton: false
});
            spinner.stop();
        }


        else{ 

      var x=$.ajax({
      type: "POST",
      url: 'admin/php/login.php',
      contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
      data: "username="+encodeURIComponent(username)+"&password="+encodeURIComponent(password),
      dataType: "text"
     });
     
     x.done(function(serverResponse)
     {
      
 var servervalue=serverResponse.trim();
    if(servervalue=='successful')
        { 

swal({
  title: "Successful",
  text: "Login was successful",
  timer: 1000,
  showConfirmButton: false
},
function(){
  location.href="admin/home.php" ;
});

$('#loginform').get(0).reset();
}
 
               else
               {
                swal("Error!", "Invalid Login Credentials ", "error");  
                   
               }
               
     });   // end of done section
     
      x.fail(function(){
           spinner.stop();
        swal("Server Error!", "Server could not process this request, please try again later!", "error")
     
     });
     
     x.always(function(){
         spinner.stop();
                // $("#signupmodal").modal("hide");
});

        }
                
    });//button click closes
      
 
 });
}