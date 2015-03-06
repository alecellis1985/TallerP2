$(document).on("submit", "#commentForm", saveComment);
$(document).on("click", "#closeVideoDetails", closeVideoDetails);

$(document).on("click", "#videoDetails .firstPage", goToPageComment);
$(document).on("click", "#videoDetails .previousPage", goToPageComment);
$(document).on("click", "#videoDetails .nextPage", goToPageComment);
$(document).on("click", "#videoDetails .lastPage", goToPageComment);
$(document).on("click", "#videoDetails .paginationBtn", goToPageComment);
$(document).on("click", "#addComment", function(e){
    $("#modalCommentsTitle").text("Add comment");
});

$(document).ready(start);
function start() {
    $(".videoDetails").click(videoDetails);
}

function goToPageComment(e) {
    
    e.preventDefault();
    if ($(this).parent('li').attr('class') === 'active')
        return false;
    var pageNumber = parseInt($(this).attr('data-page'));
    var idVideo = $("#idVideo").val();
    $(this).blur();
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success: function (data) {
            processPaginationComment(data, pageNumber);
        },
        timeout: 4000,
        error: problemas,
        url: "paginationComments.php",
        data: {pagenumber: pageNumber, idVideo: idVideo}
    }).done(function () {
        $('.loadingOverlay').css('display', 'none');
    });
}

//TODO: Refactor this and video pagination to shared functions
function processPaginationComment(data, page){
    $("#videoCommentsContainer").empty();
    $("#videoCommentsContainer").append(data); 
    
    $('#videoDetails .pagination li').removeClass('active');
    $('#videoDetails .paginationBtn').each(function (key, val) {
        element = $(val);
        if (element.data('page') === page)
        {
            element.parent('li').addClass('active');
        }
    });
    setPagingCommentsElements(page);
}

function setPagingCommentsElements(page)
{
    var totPages = parseInt($('#totalPages').val());
    if (totPages === 1)
        return;
    setPrevFirstElemComment(page);
    setNextLastElemComment(page, totPages);
    var previousPage = page < 2 ? 1 : page - 1;
    var nextPage = page < totPages ? page + 1 : totPages;
    $("#videoDetails .previousPage").attr("data-page", previousPage);
    $("#videoDetails .nextPage").attr("data-page", nextPage);
}

function setNextLastElemComment(page, totPages)
{
    if (page < totPages)
    {
        $("#videoDetails .nextPage").removeClass("disableClick");
        $("#videoDetails .lastPage").removeClass("disableClick");
    }
    else
    {
        $("#videoDetails .nextPage").addClass("disableClick");
        $("#videoDetails .lastPage").addClass("disableClick");
    }
}

function setPrevFirstElemComment(page)
{
    if (page > 1)
    {
        $("#videoDetails .previousPage").removeClass("disableClick");
        $("#videoDetails .firstPage").removeClass("disableClick");
    }
    else
    {
        $("#videoDetails .previousPage").addClass("disableClick");
        $("#videoDetails .firstPage").addClass("disableClick");
    }
}

function saveComment(e) {
    e.preventDefault();
    var comment = $("#commentText").val();
    var alias = $("#alias").val();
    var idVideo = $("#idVideo").val();
    
    $.ajax({
        type: "POST",
        dataType: "json",
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success: function (data) {
            processSaveComment(data);
        },
        timeout: 4000,
        error: problemas,
        url: "saveComment.php",
        data: {alias: alias, comment: comment, idVideo: idVideo}
    }).done(function (e) {
        $('.loadingOverlay').css('display', 'none');
        clearCommentForm();
    });
}

function processSaveComment(data) {
    if (data.success) {
        //TODO: reload comments
        $('#commentForm .btn-default').trigger('click');
    } else {
        alert(data.errorMsj);
    }
}

function clearCommentForm(e) {
    $(':input', '#commentForm')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
}

function closeVideoDetails(e) {
    e.preventDefault();
    var container = $("#videoDetails");
    container.slideUp("slow", function () {
        container.empty();
        container.remove();
    });
    currentLink.removeClass("disableClick");
}

var videoParent;
var currentLink;
function videoDetails(e) {
    
    e.preventDefault();
    if (document.getElementById('videoDetails') != null)
        closeVideoDetails(e);
    currentLink = $(this);
    $(this).addClass("disableClick");
    var videoId = $(this).parent().parent().children(".videoId").val();
    videoParent = $(this).closest(".row");
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success: function (data) {
            processVideoDetails(data);
        },
        timeout: 4000,
        error: problemas,
        url: "videoDetails.php",
        data: {videoId: videoId}
    }).done(function (e) {
        $('.loadingOverlay').css('display', 'none');
        $("#idVideo").val(videoId);
    });
}

function processVideoDetails(data) {
    var container = $('<div id="videoDetails" class="row"></div>');
    container.hide();
    container.append(data);
    videoParent.after(container);
    container.slideDown('slow');
}