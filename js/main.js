jQuery(document).ready(function($){
  //you can now use $ as your jQuery object.
  	$('#countdown').countdown({
    	schedule: { 
        	"Monday": [ "19:00:00"]
    	}
	});
  var body = $( 'body' );
});

// (function($){ jQuery(document).ready(function($){ 
// 	$('#countdown').countdown({
//     	schedule: { 
//         	"Monday": [ "19:00:00"]
//     	}
// 	});
// })})(jQuery); 



