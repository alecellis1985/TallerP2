<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>2 Col Portfolio - Start Bootstrap Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/2-col-portfolio.css" rel="stylesheet">
        <link href="css/starRating.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="faviconMovie.jpg">
    </head>

    <body>

        <div id="header"></div>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Video List
                        <small>All videos</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->


            <!-- Projects Row -->
            {foreach from=$videos item=pair}
                <div class="row">
                    {foreach from=$pair item=video}
                        <div class="col-md-6 portfolio-item">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{$video.url}?rel=0" frameborder="0" allowfullscreen></iframe>
                            <h3>
                                <a href="#">{$video.client}</a>
                            </h3>
                            <p class="starRating"></p>
                            <p>{$video.description}</p>
                        </div>
                    {/foreach}
                </div>
            {/foreach}
            <!-- /.row -->


            <hr>

            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#" class="firstPage">&laquo;</a>
                        </li>
                        {for $i=1 to $videoPages}
                            <li {if $i == 1} class="active"{/if}>
                                <a href="#" class="paginationBtn">{$i}</a>
                            </li>                   
                        {/for} 
                        <li>
                            <a href="#" class="lastPage">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container -->

        <div class="footer"></div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- custom scripts -->
        <script src="js/index.js"></script>
        <script src="js/main.js"></script>

        <script>
            $(function () {
                $("#header").load("header.html");
                $(".starRating").load("starRating.html");
                $(".footer").load("footer.html");
            });
        </script> 

    </body>

</html>
