{*<div class="col-md-12 portfolio-item">
    <div class="row">
        <div class="col-md-12"><label class="h4">Client &nbsp;</label><label class="h5">{$video.client}</label></div>
        <div class="col-md-12"><label class="h4">Release date &nbsp;</label><label class="h5">{$video.releaseDate}</label></div>
        <div class="col-md-12"><label class="h4">Rating &nbsp;</label>
            <label class="h5">
                <span class="star-rating">
                    {for $x=1; $x < 6; $x++ }
                        <i {if $video.rating >= $x}class="rated"{/if}></i>
                   {/for}
                </span>
            </label>
        </div>
        <div class="col-md-12"><label class="h4">Votes &nbsp;</label><label class="h5">{$video.votes}</label></div>
    </div>
</div>*}
<div id="videoCommentsContainer">
    {include file="private/videoCommentsPrivate.tpl"}
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
<hr>
