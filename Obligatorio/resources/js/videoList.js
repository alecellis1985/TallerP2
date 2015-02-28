$(document).on("click", ".paginationBtn", function (e) {
    e.preventDefault();
    debugger;
    var pageNumber = parseInt(this.innerHTML);
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: inicioEnvio,
        success: llegadaDatos,
        timeout: 4000,
        error: problemas,
        url: "pagination.php",
        data: {'pageNumber': pageNumber}
    });
    $(".pagination li").removeClass("active");
    $(this).parent().addClass("active");

    if (pageNumber === 1) {
        $(".previousPage").addClass("disableClick");
        $(".firstPage").addClass("disableClick");
        $(".nextPage").removeClass("disableClick");
        $(".lastPage").removeClass("disableClick");
    } else {
        if (pageNumber === parseInt($("#totalPages").val())) {

            $(".previousPage").removeClass("disableClick");
            $(".firstPage").removeClass("disableClick");
            $(".nextPage").addClass("disableClick");
            $(".lastPage").addClass("disableClick");
        }else{
            $(".previousPage").removeClass("disableClick");
            $(".firstPage").removeClass("disableClick");
            $(".nextPage").removeClass("disableClick");
            $(".lastPage").removeClass("disableClick");
        }
    }

});

$(document).on("click", ".nextPage", function (e) {
    e.preventDefault();
    var nextPageButton = $(".pagination .active").next().children().first();
    nextPageButton.click();

    $(".firstPage").removeClass("disableClick");
    $(".previousPage").removeClass("disableClick");
    if (nextPageButton[0].innerHTML === $("#totalPages").val()) {
        $(".nextPage").addClass("disableClick");
        $(".lastPage").addClass("disableClick");
    }

});

$(document).on("click", ".previousPage", function (e) {
    e.preventDefault();
    var previousPageButton = $(".pagination .active").prev().children().first();
    previousPageButton.click();

    $(".nextPage").removeClass("disableClick");
    $(".lastPage").removeClass("disableClick");
    if (previousPageButton[0].innerHTML === 1) {
        $(".previousPage").addClass("disableClick");
        $(".firstPage").addClass("disableClick");
    }

});

function inicioEnvio()
{
//  var x=$("#resultados");
//  x.html('<img src="../cargando.gif">');
}

function llegadaDatos(datos)
{
    $("#videosContainer").html("");
    $("#videosContainer").html(datos);
}

function problemas()
{
    $("#resultados").text('Problemas en el servidor.');
}


