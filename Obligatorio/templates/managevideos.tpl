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
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="headerPrivate.tpl"}</div>
        <div class="container contentContainer" style="margin-top: 50px;">
            <div>{include file="videoModal.tpl"}</div>
            <div class="row bottom bottom-buffer">
                <div class="col-md-12 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <button id="addVid" type="button" class="btn btn-default" data-toggle="modal" data-target="#videoModal">Add new video</button>
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
                                            <td><div data-id="destacado">{$video['destacado']}</div></td>
                                            <td><div data-id="deleted">{$video['deleted']}</div></td>
                                            <td><div data-id="releaseDate">{$video['releaseDate']}</div></td>
                                            <td><div data-id="description">{$video['description']}</div></td>
                                            <td>
                                                <div><button type="button" class="btn btn-default editVid" data-id="{$video['idVideo']}" data-toggle="modal" data-target="#videoModal">Edit</button></div>
                                            </td>
                                            <td>
                                                <div><button type="button" class="btn btn-default commentsVid" data-id="{$video['idVideo']}">Comments</button></div>
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
        <script type="text/javascript" src="../resources/js/managevideos.js"></script>
    </body>
</html>
