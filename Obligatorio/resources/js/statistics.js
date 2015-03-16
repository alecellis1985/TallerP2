$(document).on("click", ".generatePdf", exportToPDF);
$(document).on("click", ".generateXls", exportToXls);

function exportToPDF(e) {
    e.preventDefault();
    var newUrl = self.location.href.replace('statistics.php','generatePDF.php');
    self.location.href = newUrl;
}



function exportToXls(e) {
    e.preventDefault();
    var newUrl = self.location.href.replace('statistics.php','excelPrinter.php');
    self.location.href = newUrl;
}