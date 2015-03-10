$(document).ready(start);
function start() {
    $(".videoListPagination .firstPage").click(goToPage);
    $(".videoListPagination .previousPage").click(goToPage);
    $(".videoListPagination .nextPage").click(goToPage);
    $(".videoListPagination .lastPage").click(goToPage);
    $(".videoListPagination .paginationBtn").click(goToPage);
    $(".star-rating input").click(rateVideo);
}

function goToPage(e) {
    e.preventDefault();
    if ($(this).parent('li').attr('class') === 'active')
        return false;
    var pageNumber = parseInt($(this).attr('data-page'));
    $(this).blur();
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: inicioEnvio,
        success: function (datos) {
            llegadaDatos(datos, pageNumber);
        },
        timeout: 4000,
        error: problemas,
        url: "pagination.php",
        data: "pagenumber=" + pageNumber
    });
}

function inicioEnvio()
{
    $('.loadingOverlay').css('display', 'block');
}

function llegadaDatos(datos, page)
{
    //Borro los videos actuales y appendeo los nuevos videos
    var vidContainer = $('#videosContainer');
    vidContainer.empty();
    vidContainer.append(datos);
    $('.videoListPagination.pagination li').removeClass('active');
    $('.videoListPagination .paginationBtn').each(function (key, val) {
        element = $(val);
        if (element.data('page') === page)
        {
            element.parent('li').addClass('active');
        }
    });
    setPagingElements(page);
    loadVideos();
    $('html, body').animate({ scrollTop: 0 }, 0);
    $('.loadingOverlay').css('display', 'none');
    return false;
}

function setPagingElements(page)
{
    var totPages = parseInt($('#totalPages').val());
    if (totPages === 1)
        return;
    setPrevFirstElem(page);
    setNextLastElem(page, totPages);
    var previousPage = page < 2 ? 1 : page - 1;
    var nextPage = page < totPages ? page + 1 : totPages;
    $(".videoListPagination .previousPage").attr("data-page", previousPage);
    $(".videoListPagination .nextPage").attr("data-page", nextPage);
}

function setNextLastElem(page, totPages)
{
    if (page < totPages)
    {
        $(".videoListPagination .nextPage").removeClass("disableClick");
        $(".videoListPagination .lastPage").removeClass("disableClick");
    }
    else
    {
        $(".videoListPagination .nextPage").addClass("disableClick");
        $(".videoListPagination .lastPage").addClass("disableClick");
    }
}

function setPrevFirstElem(page)
{
    if (page > 1)
    {
        $(".videoListPagination .previousPage").removeClass("disableClick");
        $(".videoListPagination .firstPage").removeClass("disableClick");
    }
    else
    {
        $(".videoListPagination .previousPage").addClass("disableClick");
        $(".videoListPagination .firstPage").addClass("disableClick");
    }
}

function problemas()
{
    $("#resultados").text('Problemas en el servidor.');

}

var stars;
function rateVideo(e) {
    var rating = $(this).val();
    var videoId = $(this).parent().parent().prev().val();
    stars = $(this).siblings();
    $.ajax({
        type: "POST",
        dataType: "json",
        beforeSend: inicioEnvio,
        success: function (datos) {
            processRating(datos);
        },
        timeout: 4000,
        error: problemas,
        url: "rating.php",
        data: {rating: rating, videoId: videoId}
    }).done(function () {
        $('.loadingOverlay').css('display', 'none');
    });
}

function processRating(result) {
    
    if (result.success) {
        stars.addClass("disableClick");
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], 'Video successfully rated.');
    } else {
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], 'You have already rated this video.');
    }

}