<div class="col-md-12">
    <table id="videoComments" class="table table-striped">
        <thead>
        <th>Comment</th><th>Author</th><th>Date</th>
        </thead>
        <tbody>
            {foreach from=$comments item=comment}
                <tr data-id="{$comment['idComments']}">
                    <td><div>{$comment['text']}</div></td>
                    <td><div>{if $comment['alias'] eq ''} {$comment['ip']} {else} {$comment['alias']} {/if}</div></td>
                    <td><div>{$comment['dateTime']}</div></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>