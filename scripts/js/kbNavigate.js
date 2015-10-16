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
        window.location = previousUrl;  
    });
    $(".navNext a").on("click",function(){
        window.location = nextUrl;   
    });
});
}