<!DOCTYPE html> 
<html class="no-js">
    <head>
    {include file="headPrivate.tpl"}
    <link rel="stylesheet" href="../resources/css/starRating.css">
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="headerPrivate.tpl"}</div>
        <div class="container contentContainer" style="margin-top: 50px;">

            <div class="row bottom-buffer">
                <div class="col-md-6">
                    <h1>Site Statistics</h1>
                </div>
                <div class="col-md-2 col-md-offset-4">
                    <ul class="nav navbar-nav" style="margin:20px 0 10px 0;">
                        <li>
                            <div><button type="button" class="btn btn-danger generatePdf" onclick="self.location.href = 'http://localhost:8081/TallerP2/Obligatorio/privateFunctions/generatePDF.php';">PDF</button></div>
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
                                            <span class="star-rating">
                                                {for $x=1; $x < 6; $x++ }
                                                     <i {if $video.rating >= $x}class="rated"{/if}></i>
                                                {/for}
                                            </span>
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
    <div class="footer">{include file="footerPrivate.tpl"}</div>
    {include file="coreJsLibrariesPrivate.tpl"}
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
