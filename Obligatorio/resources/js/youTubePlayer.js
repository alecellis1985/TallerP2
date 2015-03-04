var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

//var players;
var currentPlayer;
function onYouTubeIframeAPIReady() {
    loadVideos();

}

function loadVideos() {
    $('.loadingOverlay').css('display', 'block');
    //players = [];
    var playerDivs = $(".videoPlayer");
    playerDivs.each(function (index, div) {
        var videoId = div.id;
        var videoUrl = $(div).data("url");
        var player = new YT.Player(videoId, {
            height: '315',
            width: '560',
            videoId: videoUrl,
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
        //players.push([player, videoId]);
    });
    $('.loadingOverlay').css('display', 'none');
}


function onPlayerStateChange(event) {
    currentPlayer = event.target;
    playVideo(event.data);
}

function playVideo(state) {
    if (state == YT.PlayerState.PLAYING) {
        var videoId = parseInt(currentPlayer.c.id.replace("videoPlayer", ""));
        $.ajax({
            type: "POST",
            dataType: "json",
            success: function (result) {
                debugger;
                if (!result.success) {
                    alert(result.errorMsj);
                }
            },
            timeout: 4000,
            url: "videoView.php",
            data: {videoId: videoId}
        });
    }
}