<!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MyCompany Videos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="resources/css/normalize.css">
        <link rel="stylesheet" href="resources/css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="resources/img/faviconMovie.jpg">

    </head>

    <body>
        <!-- Navigation -->
        <div id="header"></div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
        <div class="container" style="margin-top: 70px;">
            <div class="row bottom bottom-buffer">
                <div class="col-md-6 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <p> We are a film producer company that offer our clients high quality custom videos for their business. Bla
                            Bla Bla Bla Bla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla Bla
                            Bla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla BlaBla Bla Bla.</p>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <img class="companyLogo"src='resources/img/companyLogo.png' alt='Blast off with Bootstrap' />
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 portfolio-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{$mainVideo[0].url}?rel=0" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        <a href="#">{$mainVideo.client}</a>
                    </h3>
                    <!-- TODO: Cambiar esto por rating con estrellas y dejar la descripcion en la siguiente columna-->
                    <p>{$mainVideo.description}</p>
                </div>
                
                <div class="col-md-5 col-md-offset-1">
                    <h3>
                        <i>MyCompany films</i> featured Video
                    </h3>
                    <p>{$mainVideo.description}</p>
                </div>

            </div>

        </div>

        <div class="footer"></div>

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="resources/js/jquery.js"><\/script>')</script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="resources/css/bootstrap.css">');
        </script>
        <script src="resources/js/plugins.js"></script>
        
        <script>
            $(function () {
                $("#header").load("header.html");
                $(".footer").load("footer.html");
            });
        </script> 
        <script src="resources/js/main.js"></script>
    </body>
</html>
