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
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="resources/css/2-col-portfolio.css" rel="stylesheet">
        <link href="resources/css/starRating.css" rel="stylesheet">
        <link href="resources/css/main.css" rel="stylesheet">
        <link href="resources/css/common.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="resources/img/faviconMovie.jpg">
    </head>

    <body>

        <div id="header">{include file="header.tpl"}</div>

        <!-- Page Content -->
        <div class="container">
            <div class="loadingOverlay"><img src="resources/img/loading.gif" alt="Loading..." height="100%" width="100%"></div>
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
                            <a href="" class="firstPage disableClick" data-page="1" title="First page">&laquo;</a>
                        </li>
                        <li>
                            <a href="" class="previousPage disableClick" title="Previous page">&lsaquo;</a>
                        </li>
                        {for $i=1 to $videoPages}
{*<<<<<<< HEAD
                            <li  class="{if $i == 1}active{/if}{if $i == $videoPages}lastPageBtn{/if}{if $i == 1} firstPageBtn{/if}">
                                <a href="#" class="paginationBtn" value="{$i}">{$i}</a>
=======*}
                            <li {if $i == 1} class="active"{/if}>
                                <a href="" class="paginationBtn" data-page="{$i}">{$i}</a>

                            </li>                   
                        {/for}
                        <li>
                            <a href="" class="nextPage" data-page="2" title="Next page">&rsaquo;</a>
                        </li> 
                        <li>
                            <a href="" class="lastPage" data-page="{$videoPages}" title="Last page">&raquo;</a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" id="totalPages" value="{$videoPages}">
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="footer">{include file="footer.tpl"}</div>
        
        <script src="resources/js/libs/jquery.js"></script>
        <script src="resources/js/libs/bootstrap.min.js"></script>
        <script src="resources/js/jquery.loadTemplate-1.4.4.min"></script>
        <!-- custom scripts -->
        <script src="resources/js/main.js"></script>
        <script src="resources/js/helper.js"></script>
        <script src="resources/js/videoList.js"></script>   
        <script src="resources/js/youTubePlayer.js"></script>        
        
    </body>
</html>
