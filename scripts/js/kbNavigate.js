function useArrowsForNavigation(previousUrl, nextUrl){
$(document).ready(function () {
    $("body").keydown(function(e) {
      if(e.which == 37) { // left	
		if (previousUrl != ""){		
			$(".navPrevious a").trigger("click");
		}
      }
      else if(e.which == 39) { // right
         if (nextUrl != "") {
			$(".navNext a").trigger("click");
			}
		}
    });
	
    $(".navPrevious a").on("click",function(){
		alert("previous");
        // your scripts for previous click here
        window.location = previousUrl;  
    });
    $(".navNext a").on("click",function(){
		alert("next");
        // your scripts for next click here
        window.location = nextUrl;   
    });
});
}