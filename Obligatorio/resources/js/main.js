
$(document).on("change", "input:radio", function(){
    //submit 
});

$(document).on("hover",".currentRate", function(){
    $(this).next().removeClass("rated");
    
});

$(document).on("blur",".currentRate", function(){
    $(this).next().addClass("rated");
});
