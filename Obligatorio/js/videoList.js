$(document).on("click", ".paginationBtn", function (e) {
    e.preventDefault();
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
        setEnablePrevAndFirst(false);
        setEnableNextAndLast(true);
    } else {
        if (pageNumber === parseInt($("#totalPages").val())) {
            setEnablePrevAndFirst(true);
            setEnableNextAndLast(false);
        } else {
            setEnablePrevAndFirst(true);
            setEnableNextAndLast(true);
        }
    }

});

$(document).on("click", ".nextPage", function (e) {
    e.preventDefault();
    var nextPageButton = $(".pagination .active").next().children().first();
    nextPageButton.click();

});

$(document).on("click", ".previousPage", function (e) {
    e.preventDefault();
    var previousPageButton = $(".pagination .active").prev().children().first();
    previousPageButton.click();

});

$(document).on("click",".lastPage", function(e){
    e.preventDefault();
    var lastPageButton = $(".lastPageBtn").children().first();
    lastPageButton.click();
    
});

$(document).on("click",".firstPage", function(e){
    e.preventDefault();
    var firstPageButton = $(".firstPageBtn").children().first();
    firstPageButton.click();
    
});

$(document).on("click", "input[name='rating']", function(e){
        
});

function inicioEnvio()
{
}

function llegadaDatos(datos)
{
    $("#videosContainer").html("");
    $("#videosContainer").html(datos);
}

function problemas()
{
}

function setEnablePrevAndFirst(enabled) {
    if (enabled) {
        $(".previousPage").removeClass("disableClick");
        $(".firstPage").removeClass("disableClick");
    } else {
        $(".previousPage").addClass("disableClick");
        $(".firstPage").addClass("disableClick");
    }

}

function setEnableNextAndLast(enabled) {
    if (enabled) {
        $(".nextPage").removeClass("disableClick");
        $(".lastPage").removeClass("disableClick");
    } else {
        $(".nextPage").addClass("disableClick");
        $(".lastPage").addClass("disableClick");
    }
}




