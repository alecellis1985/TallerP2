
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

$(document).on("click", "#logInBtn", function(e){
	e.preventDefault();
});

$(document).on("submit", "#logInForm", function(e){
	e.preventDefault();	
	//TODO: handle log in submit with AJAX & ridirect to admin page.
});
