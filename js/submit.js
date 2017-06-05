
$(document).ready(function(){
    var formdata = "" ;
    $(document).on('click', '#treaty', function(e){

        e.preventDefault();

        //   var uid = $(this).data('id'); // get id of clicked row

        console.log("now here1");
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


        var target = $('#entryform').get(0);
        var spinner = new Spinner(opts).spin(target);


        $('#dynamic-content').hide(); // hide dive for loader
        $('#modal-loader').show();  // load ajax loader

        $.ajax({
            url: 'php/submit.php',
            type: 'POST',
            contentType: false,
            data: new FormData($('#entryform').get(0)),
            dataType: "text",
            processData: false
        })
            .done(function(data){
                console.log(data);
                $('#dynamic-content').hide(); // hide dynamic div
                $('#dynamic-content').show(); // show dynamic div
                //  $('#txt_fname').html(data.FIRSTNAME);
                //  $('#txt_lname').html(data.FIRSTNAME);
                //  $('#txt_email').html(data.EMAIL);
                //  $('#txt_position').html(data.ID);
                //  $('#txt_category').html(data.PHONE);
                //$('#txt_office').html(data.FilePath);
                $('#modal-loader').hide();    // hide ajax loader

                console.log("Completed");
                $(document).on('click', '#treats', function(e){
                    console.log("here") ; console.log(data) ;

                    // formdata = data;

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
