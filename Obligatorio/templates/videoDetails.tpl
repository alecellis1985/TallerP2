
<div class="col-md-12 portfolio-item">
    <table>
        <tbody>
            <tr>
                <td><h4>Client</h4></td>
                <td align="center" valign="bottom"><p>{$video.client}</p></td>
            </tr>
            <tr>
                <td><h4>Release date</h4></td>
                <td align="center" valign="bottom"><p>{$video.releaseDate}</p></td>
            </tr>
            <tr>
                <td><h4>Rating</h4></td>
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

            </tr>
            <tr>
                <td><h4>Votes</h4></td>
                <td align="center" valign="bottom"><p>{$video.votes}</p></td>
            </tr>
        </tbody>
    </table>
</div>
<div id="videoCommentsContainer">
    {include file="videoComments.tpl"}
</div>
{if $commentsPages > 0}
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="" class="firstPage disableClick" data-page="1" title="First page">&laquo;</a>
                </li>
                <li>
                    <a href="" class="previousPage disableClick" title="Previous page">&lsaquo;</a>
                </li>
                {for $i=1 to $commentsPages}
                    <li {if $i == 1} class="active"{/if}>
                        <a href="" class="paginationBtn" data-page="{$i}">{$i}</a>

                    </li>                   
                {/for}
                <li>
                    <a href="" class="nextPage {if $commentsPages == 1} disableClick {/if}" data-page="2" title="Next page">&rsaquo;</a>
                </li> 
                <li>
                    <a href="" class="lastPage {if $commentsPages == 1} disableClick {/if}" data-page="{$commentsPages}" title="Last page">&raquo;</a>
                </li>
            </ul>
        </div>
        <input type="hidden" id="totalCommentPages" value="{$commentsPages}">
    </div>
{/if}
<div class="col-md-12 portfolio-item">
    <button id="closeVideoDetails" type="button" class="btn btn-default">Close details &#x25B2;</button>
</div>
<hr>
