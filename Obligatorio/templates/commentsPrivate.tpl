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
            <div class="row bottom bottom-buffer">
                <div class="col-md-12 ">
                    <h2>Comments</h2>
                    <div>
                    {if $commentsCount < 1} 
                        <h2>There are no comments to be shown at the moment.</h2>
                    {else} 
                        <table id="manageCommentsTable" class="table table-striped">
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
                                                <td><div data-id="dateTime">{$comment['dateTime']}</div></td>
                                                <td><div data-id="public">{$comment['public']}</div></td>
                                                <td>
                                                    <div>
                                                    {if $comment['public'] == 1}
                                                    <button type="button" class="btn btn-danger widthrawComment" data-id="{$comment['idComments']}">Widthraw</button>
                                                    {else}
                                                    <button type="button" class="btn btn-success widthrawComment" data-id="{$comment['idComments']}">Activate</button>
                                                    {/if}
                                                    </div>
                                                </td>
                                            </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                    {/if}
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
