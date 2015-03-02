{foreach from=$videos item=pair}
    <div class="row">
        {foreach from=$pair item=video}
            <div class="col-md-6 portfolio-item">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{$video.url}?rel=0" frameborder="0" allowfullscreen></iframe>
                <h3>
                    <a href="#">{$video.client}</a>
                </h3>
                <p class="starRating">{include file="starRating.tpl"}</p>
                <p>{$video.description}</p>
            </div>
        {/foreach}
    </div>
{/foreach}