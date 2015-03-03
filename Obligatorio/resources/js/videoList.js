$(document).ready(start);
function start() {
    $(".firstPage").click(goToPage);
    $(".previousPage").click(goToPage);
    $(".nextPage").click(goToPage);
    $(".lastPage").click(goToPage);
    $(".paginationBtn").click(goToPage);
    //$(".star-rating input").change(rateVideo);
}

$(document).on("click", ".star-rating input", rateVideo);

function goToPage(e) {
    e.preventDefault();
    if ($(this).parent('li').attr('class') === 'active')
        return false;
    var pageNumber = parseInt($(this).attr('data-page'));
    $(this).blur();
    $.ajax({
        type: "POST",
        dataType: "json",
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
    var length = datos.length;
    for (var i = 0; i < length; i += 2)
    {
        var row = $('<div class="row"></div>');
        for (var j = 0; j < 2; j++)
        {
            datos[i + j].url = 'https://www.youtube.com/embed/' + datos[i + j].url + '?rel=0';
            var tmplt = '<div class="col-md-6 portfolio-item">' +
                    '<iframe width="560" height="315" src="' + datos[i + j].url + '" frameborder="0" allowfullscreen></iframe>' +
                    '<h3>' +
                    '<a href="#">' + datos[i + j].client + '</a>' +
                    '</h3>' +
                    '<p class="starRating">' +
                    '<span class="star-rating">' +
                    ' <input type="radio" name="rating" value="1">' +
                    '<i></i>' +
                    ' <input type="radio" name="rating" value="2">' +
                    '<i></i>' +
                    ' <input type="radio" name="rating" value="3">' +
                    '<i></i>' +
                    ' <input type="radio" name="rating" value="4">' +
                    '<i></i>' +
                    ' <input type="radio" name="rating" value="5">' +
                    '<i></i>' +
                    '</p>' +
                    '<p>' + datos[i + j].description + '</p>' +
                    '</div>';
            row.append(tmplt);
        }
        vidContainer.append(row);
    }

    $('.pagination li').removeClass('active');
    $('.paginationBtn').each(function (key, val) {
        element = $(val);
        if (element.data('page') === page)
        {
            element.parent('li').addClass('active');
        }
    });
    setPagingElements(page);
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
    $(".previousPage").attr("data-page", previousPage);
    $(".nextPage").attr("data-page", nextPage);
}
function setNextLastElem(page, totPages)
{
    if (page < totPages)
    {
        $(".nextPage").removeClass("disableClick");
        $(".lastPage").removeClass("disableClick");
    }
    else
    {
        $(".nextPage").addClass("disableClick");
        $(".lastPage").addClass("disableClick");
    }
}

function setPrevFirstElem(page)
{
    if (page > 1)
    {
        $(".previousPage").removeClass("disableClick");
        $(".firstPage").removeClass("disableClick");
    }
    else
    {
        $(".previousPage").addClass("disableClick");
        $(".firstPage").addClass("disableClick");
    }
}

function problemas()
{
    $("#resultados").text('Problemas en el servidor.');

}
function rateVideo(e) {
    var rating = $(this).val();
    var videoId = $(this).parent().parent().prev().val();
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
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], 'Video successfully rated.');
    } else {
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], 'You have already rated this video.');
    }

}