{for $x=1; $x < $videosCountInPage+1; $x++ }
    {if $x%2 == 1}
        <div class="row">
        {/if}
        <div class="col-md-6 portfolio-item">
            {*                <iframe id="videoPlayer{$videos[$x-1].idVideo}" class="videoPlayer" width="560" height="315" src="https://www.youtube.com/embed/{$videos[$x-1].url}?rel=0" frameborder="0" allowfullscreen data-videoId="{$videos[$x-1].idVideo}" enablejsapi="1"></iframe>*}
            <div class="videoPlayer" id="videoPlayer{$videos[$x-1].idVideo}" data-url="{$videos[$x-1].url}"></div>
            <h3>
                <a class="videoDetails" href="">{$videos[$x-1].client}</a>
            </h3>
            <input type="hidden" class="videoId" value="{$videos[$x-1].idVideo}">
            <p class="starRating">{include file="starRating.tpl"}</p>
            <p>{$videos[$x-1].description}</p>
        </div>
        {if $x%2 == 0 || $x == $videosCountInPage}
        </div>
    {/if}
{/for} 
