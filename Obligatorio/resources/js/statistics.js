$(document).on("click", ".generatePdf", exportToPDF);
$(document).on("click", ".generateXls", exportToXLS);

$(document).ready(startDoc);

function startDoc(e){
    $("#homeFooterLink").attr("href","../videoList.php");
    $("#videoListFooterLink").attr("href","../index.php");
    
    $("#allVideosLink").attr("href","../videoList.php");
    $("#homeLink").attr("href","../index.php");
    $("#logOut").data("url","../logout.php");
    $("#manageVideosId").attr("href","manageVideos.php");
    $("#statisticsId").attr("href","statistics.php");
    
}

function exportToPDF(e) {
    $.ajax({
        type: "POST",
        dataType: "json",
        //beforeSend: inicioEnvio,
        success: function (data) {
            if (data.success)
                window.open(data.new_pdf_url);
        },
        timeout: 4000,
        //error: problemas,
        url: "generatePDF.php"
                //data: "pagenumber=" + pageNumber
    });
}

function exportToXLS(e) {

}