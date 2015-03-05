$(document).on("submit", "#commentForm", saveComment);

function saveComment(e) {
    debugger;
    e.preventDefault();
    var comment = $("#commentText").val();
    var alias = $("#alias").val();
    var idVideo = $("#idVideo").val();
    $("#modalCommentsTitle").text("Add comment");
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

