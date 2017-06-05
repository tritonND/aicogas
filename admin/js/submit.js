function login(){

    $(document).ready(function()
    {
        //login code
        $(document).on("click", "#treat", function(event) {
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


            var target = $('#entryform').get(0);
            var spinner = new Spinner(opts).spin(target);

            console.log("now here");
            var x = $.ajax({
                type: "POST",
                url: "php/submit.php",
                contentType: false,
                data: new FormData($('#entryform').get(0)),
                dataType: "text",
                processData: false
            });



        });

    });
}
