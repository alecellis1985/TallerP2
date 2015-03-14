<!DOCTYPE html> 
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MyCompany Videos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../resources/css/normalize.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="resources/img/faviconMovie.jpg">
        <link rel="stylesheet" href="../resources/css/main.css">
        <link rel="stylesheet" href="../resources/css/common.css">
        <link rel="stylesheet" href="../resources/css/starRating.css">
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="header.tpl"}</div>
        <div class="container contentContainer" style="margin-top: 50px;">

            <div class="row bottom-buffer">
                <div class="col-md-6">
                    <h1>Site Statistics</h1>
                </div>
                <div class="col-md-2 col-md-offset-4">
                    <ul class="nav navbar-nav" style="margin:20px 0 10px 0;">
                        <li>
                            <div><button type="button" class="btn btn-danger generatePdf">PDF</button></div>
                        </li>
                        <li style="margin-left: 10px;">
                            <div>
                                <button type="button" class="btn btn-success generateXls" onclick="self.location.href = 'http://localhost:8081/TallerP2/Obligatorio/privateFunctions/excelPrinter.php';">Excel</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row bottom bottom-buffer">
                <div class="col-md-12">
                    <h2><i>Videos per Rating</i></h2>
                    <div>
                        <table id="videosPerRatingTable" class="table table-striped">
                            <thead>
                            <th >Rating</th><th>Client</th><th>Views</th><th>Url</th><th>Prominent</th><th width="110px">Release Date</th><th>Description</th><th>Available?</th>
                            </thead>
                            <tbody>
                                {foreach from=$videosPerRating item=video}
                                    <tr data-id="{$video['idVideo']}">

                                        <td align="center" valign="middle">
                                            <p>
                                                <span class="star-rating">
                                                    <input type="radio" name="ratingStatic" value="1" class="disableClick">
                                                    <i {if $video.rating >= 1} class="rated" {/if}></i>
                                                    <input type="radio" name="ratingStatic" value="2" class="disableClick">
                                                    <i {if $video.rating >= 2} class="rated" {/if}></i>
                                                    <a href="videoDetails.tpl"></a>
                                                    <input type="radio" name="ratingStatic" value="3" class="disableClick">
                                                    <i {if $video.rating >= 3} class="rated" {/if}></i>
                                                    <input type="radio" name="ratingStatic" value="4" class="disableClick">
                                                    <i {if $video.rating >= 4} class="rated" {/if}></i>
                                                    <input type="radio" name="ratingStatic" value="5" class="disableClick">
                                                    <i {if $video.rating >= 5} class="rated" {/if}></i>
                                                </span>
                                            </p>
                                        </td>
                                        <td><div data-id="client">{$video['client']}</div></td>
                                        <td><div data-id="client">{$video['views']}</div></td>
                                        <td><div data-id="url">{$video['url']}</div></td>
                                        <td><div data-id="destacado">{if $video['destacado'] == 0}<span class="glyphicon glyphicon-remove"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</div></td>
                                        <td><div data-id="releaseDate">{$video['releaseDate']}</div></td>
                                        <td><div data-id="description">{$video['description']}</div></td>
                                        <td><div data-id="deleted">{if $video['deleted']}<span class="glyphicon glyphicon-remove"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</div></td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 ">
                <h2><i>Videos per Comments</i></h2>
                <div>
                    <table id="videosPerCommentTable" class="table table-striped">
                        <thead>
                        <th>Comments count</th><th>Client</th><th>Views</th><th>Url</th><th>Prominent</th><th>Deleted</th><th width="110px">Release Date</th><th>Description</th>
                        </thead>
                        <tbody>
                            {foreach from=$videosPerComment item=video}
                                <tr data-id="{$video['idVideo']}">
                                    <td><div data-id="commentCount">{if $video['commentCount']}{$video['commentCount']}{else}0{/if}</div></td>
                                    <td><div data-id="client">{$video['client']}</div></td>
                                    <td><div data-id="views">{$video['views']}</div></td>
                                    <td><div data-id="url">{$video['url']}</div></td>
                                    <td><div data-id="destacado">{if $video['destacado'] == 0}<span class="glyphicon glyphicon-remove"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</div></td>
                                    <td><div data-id="deleted">{if $video['deleted'] == 0}<span class="glyphicon glyphicon-remove"></span>{else}<span class="glyphicon glyphicon-ok"></span>{/if}</div></td>
                                    <td><div data-id="releaseDate">{$video['releaseDate']}</div></td>
                                    <td><div data-id="description">{$video['description']}</div></td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="footer">{include file="footer.tpl"}</div>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>window.jQuery || document.write('<script src="../resources/js/libs/jquery.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>
        var bootstrap_enabled = (typeof $().modal == 'function');
        bootstrap_enabled || document.write('<link rel="stylesheet" href="../resources/css/bootstrap.css">');
    </script>
    <script src="../resources/js/libs/plugins.js"></script>
    <script src="../resources/js/helper.js"></script>
    <script src="../resources/js/main.js"></script>
    <script language="JavaScript" type="text/javascript">
        var videos = [];
        var name = '';
        {foreach from=$videos item=video}
        var vid = {$video|json_encode};
        videos.push(vid);
        {/foreach}
        var getUserPath = '../getUser.php';

    </script>
    <script type="text/javascript" src="../resources/js/statistics.js"></script>
</body>
</html>
