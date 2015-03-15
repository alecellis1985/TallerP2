<!DOCTYPE html> 
<html class="no-js"> 
    <head>
    {include file="headPrivate.tpl"}
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="headerPrivate.tpl"}</div>
        <link rel="stylesheet" href="../resources/css/starRating.css">
        <div class="container contentContainer" style="margin-top: 50px;">
            <div>{include file="videoModal.tpl"}</div>
            <div class="row bottom bottom-buffer">
                <div class="col-md-12 ">
                    <h2>Videos</h2>
                    <div>
                        <button id="addVid" type="button" class="btn btn-success" data-toggle="modal" data-target="#videoModal">Add new video</button>
                        <table id="manageVideosTable" class="table table-striped">
                             <thead>
                             <th>Title</th><th>Client</th><th>Views</th><th>Rating</th><th>Url</th><th>Prominent</th><th>Deleted</th><th width="110px">Release Date</th><th>Description</th><th colspan="3">Actions</th>
                            </thead>
                            <tbody>
                                {foreach from=$videos item=video}
					<tr data-id="{$video['idVideo']}">
                                            <td><div data-id="title">{$video['title']}</div></td>
                                            <td><div data-id="client">{$video['client']}</div></td>
                                            <td><div data-id="client">{$video['views']}</div></td>
                                            <td><div data-id="client">{$video['rating']}</div></td>
                                            <td><div data-id="url">{$video['url']}</div></td>
                                            <td><div data-id="destacado" class="glyphicon {if $video['destacado'] == 0} glyphicon-remove {else} glyphicon-ok{/if}"></div></td>
                                            <td><div data-id="deleted" class="glyphicon {if $video['deleted'] == 0} glyphicon-remove {else} glyphicon-ok{/if}"></div></td>
                                            <td><div data-id="releaseDate">{$video['releaseDate']}</div></td>
                                            <td><div data-id="description" >{$video['description']}</div></td>
                                            <td>
                                                <div><button type="button" class="btn btn-default editVid" data-id="{$video['idVideo']}" data-toggle="modal" data-target="#videoModal">Edit</button></div>
                                            </td>
                                            <td>
                                                <div><button type="button" class="btn btn-default commentsVid" data-id="{$video['idVideo']}">Comments &#x25BC;</button></div>
                                            </td>
                                            <td>
                                                <div><button type="button" class="btn btn-danger deleteVid" data-id="{$video['idVideo']}">Delete</button></div>
                                            </td>
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
        <script type="text/javascript" src="../resources/js/managevideos.js"></script>
    </body>
</html>
