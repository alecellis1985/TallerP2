<!DOCTYPE html>
<html lang="en">
    <head>
        {include file="head.tpl"}
        <link href="resources/css/starRating.css" rel="stylesheet">
    </head>

    <body>
        <div id="modalCommentsContainer">{include file="modalComments.tpl"}</div>
        <div id="header">{include file="header.tpl"}</div>
        <!-- Page Content -->
        <div class="container contentContainer">
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
                    <ul class="pagination videoListPagination">
                        <li>
                            <a href="" class="firstPage disableClick" data-page="1" title="First page">&laquo;</a>
                        </li>
                        <li>
                            <a href="" class="previousPage disableClick" title="Previous page">&lsaquo;</a>
                        </li>
                        {for $i=1 to $videoPages}
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
        <!-- custom scripts -->
        <script src="resources/js/main.js"></script>
        <script src="resources/js/helper.js"></script>
        <script src="resources/js/videoList.js"></script>   
        <script src="resources/js/youTubePlayer.js"></script>
        <script src="resources/js/comments.js"></script>        

    </body>
</html>
