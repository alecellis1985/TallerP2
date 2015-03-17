<!DOCTYPE html> 
<html class="no-js"> 
    <head>
        {include file="head.tpl"}
        <link href="resources/css/starRating.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <div id="header">{include file="header.tpl"}</div>

        <div class="container contentContainer" style="margin-top: 50px;">
            <div class="row bottom bottom-buffer">
                <div class="col-md-6 col-md-offset-1 ">
                    <h2><i>MyCompany films corp.</i></h2>
                    <div>
                        <p> We are a film producer company that offer our clients high quality custom videos for their business. You can 
                            check out our films produce for different clients and leave your comments and score. Your opinion and feedback is very
                            appreciated by our team.</p>
                        <p>
                            Go ahead and take a tour through our site! 
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <img class="companyLogo"src='resources/img/companyLogo.png' alt='Blast off with Bootstrap' />
                </div>

            </div>
            <div class="row">
                {if $videoExists}
                    <div class="col-md-5  col-md-offset-1 portfolio-item">
                        <div class="videoPlayer" id="videoPlayer{$mainVideo.idVideo}" data-url="{$mainVideo.url}"></div>
                        <h3>
                            <a href="#" class="disableClick">{$mainVideo.client}</a>
                        </h3>
                        <!-- TODO: Cambiar esto por rating con estrellas y dejar la descripcion en la siguiente columna-->
                        <p>
                            <span class="star-rating">
                                <input type="radio" name="ratingStatic" value="1" class="disableClick">
                                <i {if $mainVideo.rating >= 1} class="rated" {/if}></i>
                                <input type="radio" name="ratingStatic" value="2" class="disableClick">
                                <i {if $mainVideo.rating >= 2} class="rated" {/if}></i>
                                <a href="videoDetails.tpl"></a>
                                <input type="radio" name="ratingStatic" value="3" class="disableClick">
                                <i {if $mainVideo.rating >= 3} class="rated" {/if}></i>
                                <input type="radio" name="ratingStatic" value="4" class="disableClick">
                                <i {if $mainVideo.rating >= 4} class="rated" {/if}></i>
                                <input type="radio" name="ratingStatic" value="5" class="disableClick">
                                <i {if $mainVideo.rating >= 5} class="rated" {/if}></i>
                            </span>
                        </p>
                    </div>

                    <div class="col-md-4 col-md-offset-1">
                        <h3>
                            <i>MyCompany films</i> featured Video
                        </h3>
                        <p>{$mainVideo.description}</p>
                    </div>
                {else}
                    <div class="col-md-12">
                        <h2>No available videos at the moment</h2>
                    </div>
                {/if}
            </div>

        </div>

        <div class="footer">{include file="footer.tpl"}</div>

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="resources/js/libs/jquery.js"><\/script>')</script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script>
            var bootstrap_enabled = (typeof $().modal == 'function');
            bootstrap_enabled || document.write('<link rel="stylesheet" href="resources/css/bootstrap.css">');
        </script>
        <script src="resources/js/libs/plugins.js"></script>
        <script src="resources/js/helper.js"></script>
        <script src="resources/js/main.js"></script>
        <script src="resources/js/youTubePlayer.js"></script>
    </body>
</html>
