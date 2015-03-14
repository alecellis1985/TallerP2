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
        <div id="header">{include file="header.tpl"}</div>
        <div class="container contentContainer" style="margin-top: 50px;">
            <div class="row bottom bottom-buffer">
                <div class="col-md-12 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <table id="manageVideosTable" class="table table-striped">
                             <thead>
                             <th>Video Id</th><th>Alias</th><th>Ip</th><th width="110px">Comment</th><th>Date</th><th>Active</th><th colspan="1">Actions</th>
                            </thead>
                            <tbody>
                                {foreach from=$comments item=comment}
					<tr data-id="{$comment['idComments']}">
                                            <td><div data-id="idVideo">{$comment['idVideo']}</div></td>
                                            <td><div data-id="client">{$comment['alias']}</div></td>
                                            <td><div data-id="client">{$comment['ip']}</div></td>
                                            <td><div data-id="client">{$comment['text']}</div></td>
                                            <td><div data-id="url">{$comment['dateTime']}</div></td>
                                            <td><div data-id="url">{$comment['public']}</div></td>
                                            <td>
                                                <div><button type="button" class="btn btn-default " data-id="{$comment['idComments']}" data-toggle="modal" data-target="#videoModal">Widthraw</button></div>
                                            </td>
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
            var comments = [];
            var name = '';
            {foreach from=$comments item=comment}
                var comment = {$comment|json_encode}; 
                comments.push(comment);
            {/foreach}
            var getUserPath = '../getUser.php';
        </script>
        <script type="text/javascript" src="../resources/js/manageComments.js"></script>
    </body>
</html>
