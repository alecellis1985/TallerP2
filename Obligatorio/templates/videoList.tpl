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

            <div id="videosContainer">
                {include file="videoPage.tpl"}
            </div>
            <hr>

            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#" class="firstPage disableClick">&laquo;</a>
                        </li>
                        <li>
                            <a href="#" class="previousPage disableClick">&lsaquo;</a>
                        </li>
                        {for $i=1 to $videoPages}
                            <li  class="{if $i == 1}active{/if}{if $i == $videoPages}lastPageBtn{/if}{if $i == 1} firstPageBtn{/if}">
                                <a href="#" class="paginationBtn" value="{$i}">{$i}</a>
                            </li>                   
                        {/for}
                        <li>
                            <a href="#" class="nextPage {if $videoPages == 1 }disableClick{/if}">&rsaquo;</a>
                        </li>
                        <li>
                            <a href="#" class="lastPage {if $videoPages == 1 }disableClick{/if}">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" id="totalPages" value="{$videoPages}">
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
        <script src="js/videoList.js"></script>
        <script src="js/main.js"></script>

        <script>
            $(function () {
                $("#header").load("header.html");
                $(".footer").load("footer.html");
            });
        </script> 

    </body>

</html>
