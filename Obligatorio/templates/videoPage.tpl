{for $x=1; $x < 9; $x++ }
    {if $x%2 == 0}
    <div class="row">
    {/if}
        <div class="col-md-6 portfolio-item">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{$videos[$x-1].url}?rel=0" frameborder="0" allowfullscreen></iframe>
            <h3>
                <a href="#">{$videos[$x-1].client}</a>
            </h3>
            <p class="starRating"></p>
            <p>{$videos[$x-1].description}</p>
        </div>
    {if $x%2 == 0}
    </div>
    {/if}
{/for} 