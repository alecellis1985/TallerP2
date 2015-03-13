$(document).on("click", ".generatePdf", exportToPDF);
$(document).on("click", ".generateXls", exportToXLS);

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