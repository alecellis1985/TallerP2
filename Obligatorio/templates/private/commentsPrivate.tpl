<!DOCTYPE html> 
<html class="no-js">
    <head>
        {include file="private/headPrivate.tpl"}
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="private/headerPrivate.tpl"}</div>
        <div class="container contentContainer" style="margin-top: 50px;">
            {include file="private/videoInfoModal.tpl"}
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
                                                <td>
                                                    <div data-id="public" data-val="{$comment['public']}" class="glyphicon {if $comment['public'] == 1}glyphicon-ok {else}glyphicon-remove{/if}"></div>
                                                </td>
                                                <td>
                                                    <div>
                                                    <button data-vidId="{$comment['idVideo']}" type="button" class="btn btn-default showVidData" data-toggle="modal" data-target="#videoInfoModal">Video Details</button>
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
        <div class="footer">{include file="private/footerPrivate.tpl"}</div>
        {include file="private/coreJsLibrariesPrivate.tpl"}
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
