
$(document).on("change", "input:radio", function(){
    //submit 
});

$(document).on("hover",".currentRate", function(){
    debugger;
    $(this).next().removeClass("rated");
    
});

$(document).on("blur",".currentRate", function(){
    $(this).next().addClass("rated");
    
});
