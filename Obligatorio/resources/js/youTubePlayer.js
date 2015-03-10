var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var players = new Array();
var currentPlayer;
function onYouTubeIframeAPIReady() {
    loadVideos();

}

function loadVideos() {
    $('.loadingOverlay').css('display', 'block');
    var playerDivs = $(".videoPlayer");
    playerDivs.each(function (index, div) {
        var videoId = div.id;
        var videoUrl = $(div).data("url");
        players[videoId.toString()] = false;
        var player = new YT.Player(videoId, {
            height: '315',
            width: '560',
            videoId: videoUrl,
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    });
    $('.loadingOverlay').css('display', 'none');
}


function onPlayerStateChange(event) {
    currentPlayer = event.target;
    playVideo(event.data);
}

function playVideo(state) {
    if (state === YT.PlayerState.PLAYING) {
        debugger;
        var videoId = parseInt(currentPlayer.c.id.replace("videoPlayer", ""));
        if (!players[currentPlayer.c.id.toString()]) {
            players[currentPlayer.c.id.toString()] =  true;
            $.ajax({
                type: "POST",
                dataType: "json",
                timeout: 4000,
                url: "videoView.php",
                data: {videoId: videoId}
            });
        }
    }
}