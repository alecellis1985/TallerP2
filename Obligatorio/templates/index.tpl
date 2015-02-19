<!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="faviconMovie.jpg">

    </head>

    <body>
        <!-- Navigation -->
        <div id="header"></div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
        <div class="container" style="margin-top: 70px;">

            <div class="row">
                <div class="col-md-6 portfolio-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{$mainVideo.url}?rel=0" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        <a href="#">{$mainVideo.client}</a>
                    </h3>
                    <p>{$mainVideo.description}</p>
                </div>
            </div>

        </div>

        <div class="footer"></div>
        
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="css/bootstrap.css">');
        </script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            $(function () {
                $("#header").load("header.html");
                $(".footer").load("footer.html");
            });
        </script> 

    </body>
</html>
