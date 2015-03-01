//TEMPLATE from https://github.com/codepb/jquery-template#jqueryloadtemplate
$(document).ready(start);

function start(){
	$(".previousPage").click(goToPage);
	$(".nextPage").click(goToPage);
        $(".lastPage").click(goToPage);
        $(".paginationBtn").click(goToPage);
}


function goToPage(e){
    e.preventDefault();
    var pageNumber = parseInt($(this).attr('data-page'));
    //var data = "pagina=" + pageNumber;
    
    var data = {
      'pagina':pageNumber
    };
    data = $.param(data);
    
    
    $.ajax({
        type: "POST",
        dataType: "json",
        beforeSend: inicioEnvio,
        success: llegadaDatos,
        timeout: 4000,
        error: problemas,
        url: "pagination.php",
        data: data
        //data:{pagina:pageNumber}
    });
}

function inicioEnvio()
{
//  var x=$("#resultados");
//  x.html('<img src="../cargando.gif">');
}

function llegadaDatos(datos)
{
    var vidContainer = $('#videosContainer');
    vidContainer.empty();
    for(var i=0;i<8;i+=2)
    {
        var row = $('<div class="row"></div>');
        for(var j=0;j<2;j++)
        {
            datos[i+j].url = 'https://www.youtube.com/embed/'+datos[i+j].url+'?rel=0';
            
            var tmplt= '<div class="col-md-6 portfolio-item">'+
                '<iframe width="560" height="315" src="'+datos[i+j].url+'" frameborder="0" allowfullscreen></iframe>'+
                '<h3>'+
                    '<a href="#">'+datos[i+j].client+'</a>'+
                '</h3>'+
                '<p class="starRating"></p>'+
                '<p>'+datos[i+j].description+'</p>'+
            '</div>';
            row.append(tmplt);
        }
        vidContainer.append(row);
    }
}

function problemas()
{
    $("#resultados").text('Problemas en el servidor.');
}
/*
function activeLink()
{
    $(".pagination li").removeClass("active");
    $(this).parent().addClass("active");
}
$(document).on("click", ".paginationBtn", function (e) {
    e.preventDefault();
    var pageNumber = parseInt(this.innerHTML);
    $.ajax({
        type: "POST",
        dataType: "json",
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
})

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

});;*/




